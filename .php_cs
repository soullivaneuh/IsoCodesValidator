<?php

// Harmonize php-cs-fixer config with StyleCI
$styleCIConfig = Symfony\Component\Yaml\Yaml::parse(file_get_contents(__DIR__.'/.styleci.yml'));

$fixers = array_merge(
    isset($styleCIConfig['enabled']) ? $styleCIConfig['enabled'] : [],
    isset($styleCIConfig['disabled']) ? array_map(function ($disabledFixer) {
        return '-'.$disabledFixer;
    }, $styleCIConfig['disabled']) : []
);

$levels = [
    'psr1'    => \Symfony\CS\FixerInterface::PSR1_LEVEL,
    'psr2'    => \Symfony\CS\FixerInterface::PSR1_LEVEL,
    'symfony' => \Symfony\CS\FixerInterface::SYMFONY_LEVEL,
];
$level = isset($styleCIConfig['preset']) && isset($levels[$styleCIConfig['preset']])
    ? $levels[$styleCIConfig['preset']] : \Symfony\CS\FixerInterface::SYMFONY_LEVEL;

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->in([__DIR__])
;

return Symfony\CS\Config\Config::create()
    ->level($level)
    ->fixers($fixers)
    ->setUsingCache(true)
    ->finder($finder)
;
