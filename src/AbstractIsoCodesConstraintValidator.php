<?php

namespace SLLH\IsoCodesValidator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
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
     * This method permits to keep Symfony BC from 2.3+.
     *
     * @param string $message
     */
    protected function createViolation($message)
    {
        if ($this->context instanceof ExecutionContextInterface) {
            $this->context->buildViolation($message)
                ->addViolation();
        } elseif (method_exists($this, 'buildViolation')) {
            $this->buildViolation($message)
                ->addViolation();
        } else {
            $this->context->addViolation($message);
        }
    }
}
