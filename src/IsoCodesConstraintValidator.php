<?php

namespace SLLH\IsoCodesValidator;

use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class IsoCodesConstraintValidator
 */
abstract class IsoCodesConstraintValidator extends ConstraintValidator
{
    /**
     * Makes and adds a Constraint violation
     * This method permits to keep Symfony BC from 2.3+
     *
     * @param string $message
     */
    public function createViolation($message)
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
