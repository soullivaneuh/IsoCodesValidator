<?php

namespace SLLH\IsoCodesValidator\Constraints;

use IsoCodes;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

/**
 * Class BbanValidator
 */
class BbanValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof Bban) {
            throw new UnexpectedTypeException($constraint, __NAMESPACE__.'\Bban');
        }

        if ($value && !IsoCodes\Bban::validate($value)) {
            if ($this->context instanceof ExecutionContextInterface) {
                $this->context->buildViolation($constraint->message)
                    ->addViolation();
            } elseif (method_exists($this, 'buildViolation')) {
                $this->buildViolation($constraint->message)
                    ->addViolation();
            } else {
                $this->context->addViolation($constraint->message);
            }
        }
    }
}
