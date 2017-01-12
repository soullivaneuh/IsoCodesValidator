<?php

namespace SLLH\IsoCodesValidator\Dev\Console\Command;

use Doctrine\Common\Inflector\Inflector;
use Gnugat\NomoSpaco\File\FileRepository;
use Gnugat\NomoSpaco\FqcnRepository;
use Gnugat\NomoSpaco\Token\ParserFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Translation\Dumper\XliffFileDumper;
use Symfony\Component\Translation\Loader\XliffFileLoader;
use Symfony\Component\Translation\MessageCatalogue;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class GenerateCommand extends Command
{
    /**
     * IsoCodes classes to not generate as validator.
     *
     * Generally abstract classes, interfaces or deprecations.
     *
     * @var string[]
     */
    private $excludedClasses = [
        'Luhn',
        'Gtin',
        'Dun14',
        'Itf14',
        'Upca',
    ];

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('generate')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $isoCodePath = __DIR__.'/../../../vendor/ronanguilloux/isocodes';
        if (!file_exists($isoCodePath.'/.git')) {
            $output->writeln(
                '<error>No .git directory found on ronanguilloux/isocodes package. Please run rm -r vendor/ronanguilloux/isocodes && composer update ronanguilloux/isocodes --prefer-source command.</error>'
            );

            return 1;
        }

        $fqcnRepository = new FqcnRepository(new FileRepository(), new ParserFactory());

        $isoCodesClasses = array_diff(
            array_map(function ($fqcn) {
                return str_replace('IsoCodes\\', '', $fqcn);
            }, $fqcnRepository->findIn(__DIR__.'/../../../vendor/ronanguilloux/isocodes/src/IsoCodes')),
            $this->excludedClasses
        );

        $constraintClasses = array_filter(array_map(function ($fqcn) {
            return str_replace('SLLH\\IsoCodesValidator\\Constraints\\', '', $fqcn);
        }, $fqcnRepository->findIn(__DIR__.'/../../../src/Constraints')), function ($className) {
            return !empty(trim($className));
        });

        $twig = new \Twig_Environment(new \Twig_Loader_Filesystem(__DIR__.'/../..'));

        $xliffLoader = new XliffFileLoader();
        $xliffDumper = new XliffFileDumper();

        /** @var MessageCatalogue[] $catalogues */
        $catalogues = [];
        foreach (Finder::create()->in(__DIR__.'/../../../src/translations') as $fileInfo) {
            $locale = explode('.', $fileInfo->getBasename())[1];
            $catalogues[$locale] = $xliffLoader->load($fileInfo->getRealPath(), $locale, 'validators');
        }

        foreach (array_udiff($isoCodesClasses, $constraintClasses, 'strcasecmp') as $className) {
            $classVersion = str_replace(
                'v',
                '',
                exec("git -C ${isoCodePath} tag --list --contains $(git -C ${isoCodePath} log --pretty=format:\"%h\" --diff-filter=A src/IsoCodes/${className}.php) | head -n 1")
            );
            $classMessage = 'This value is not a valid '.strtoupper($className).'.';

            $output->writeln("Generate <comment>${className}</comment> constraint (<info>v${classVersion}</info>).");

            file_put_contents(
                __DIR__."/../../../src/Constraints/${className}.php",
                $twig->render('templates/Constraint.php.twig', [
                    'class_name' => $className,
                    'class_message' => $classMessage,
                    'class_version' => $classVersion,
                ])
            );

            file_put_contents(
                __DIR__."/../../../tests/Constraints/${className}ValidatorTest.php",
                $twig->render('templates/ConstraintValidatorTest.php.twig', [
                    'class_name' => $className,
                ])
            );

            foreach ($catalogues as $locale => $catalogue) {
                $catalogue->set(
                    $classMessage,
                    'en' === $locale
                        ? $classMessage
                        : Inflector::tableize($className)
                    ,
                    'validators'
                );
            }
        }

        foreach ($catalogues as $locale => $catalogue) {
            $fileContents = $xliffDumper->formatCatalogue($catalogue, 'validators', [
                'default_locale' => 'en',
            ]);
            file_put_contents(
                __DIR__."/../../../src/translations/validators.${locale}.xlf",
                str_replace('  ', '    ', $fileContents)
            );
        }

        return 0;
    }
}
