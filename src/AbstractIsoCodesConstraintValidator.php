<?php

namespace SLLH\IsoCodesValidator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Context\ExecutionContext;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

/**
 * Class AbstractIsoCodesConstraintValidator.
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
abstract class AbstractIsoCodesConstraintValidator extends ConstraintValidator
{
    /**
     * Override PHP doc block to get IDE completion.
     * Can be removed when `buildViolation` would be added on ExecutionContextInterface.
     * Should probably done in Symfony 3.0
     *
     * @var ExecutionContextInterface|ExecutionContext
     */
    protected $context;

    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        $constraintClass = preg_replace('/Validator$/', '', get_class($this));

        if (!$constraint instanceof $constraintClass) {
            throw new UnexpectedTypeException($constraint, $constraintClass);
        }
    }

    /**
     * Makes and adds a Constraint violation
     *
     * @param string $message
     */
    protected function createViolation($message)
    {
        $this->context->buildViolation($message)
            ->addViolation();
    }
}
