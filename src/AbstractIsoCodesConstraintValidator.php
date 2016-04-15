<?php

namespace SLLH\IsoCodesValidator;

use SLLH\IsoCodesValidator\Constraints\IsoCodesGeneric;
use SLLH\IsoCodesValidator\Constraints\IsoCodesGenericValidator;
use SLLH\IsoCodesValidator\Exception\ValidatorNotExistsException;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Context\ExecutionContext;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
abstract class AbstractIsoCodesConstraintValidator extends ConstraintValidator
{
    /**
     * Override PHP doc block to get IDE completion.
     * Can be removed when `buildViolation` would be added on ExecutionContextInterface.
     * Should probably done in Symfony 3.0.
     *
     * @var ExecutionContextInterface|ExecutionContext
     */
    protected $context;

    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        $validatorClass = get_class($this);
        if (IsoCodesGenericValidator::class === $validatorClass
            && !($constraint instanceof AbstractIsoCodesGenericConstraint || $constraint instanceof IsoCodesGeneric)
        ) {
            throw new UnexpectedTypeException($constraint, AbstractIsoCodesGenericConstraint::class);
        } elseif (IsoCodesGenericValidator::class !== $validatorClass) {
            $constraintClass = preg_replace('/Validator$/', '', $validatorClass);

            if (!$constraint instanceof $constraintClass) {
                throw new UnexpectedTypeException($constraint, $constraintClass);
            }
        }

        if (!class_exists($constraint->getIsoCodesClass())) {
            throw new ValidatorNotExistsException($constraint);
        }
    }

    /**
     * Makes and adds a Constraint violation.
     *
     * @param string $message
     */
    protected function createViolation($message)
    {
        $this->context->buildViolation($message)
            ->addViolation();
    }
}
