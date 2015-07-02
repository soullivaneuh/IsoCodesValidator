<?php

namespace SLLH\IsoCodesValidator\Constraints;

use IsoCodes\IsoCodeInterface;
use SLLH\IsoCodesValidator\AbstractIsoCodesConstraintValidator;
use Symfony\Component\Validator\Constraint;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class IsoCodesGenericValidator extends AbstractIsoCodesConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        parent::validate($value, $constraint);

        $constraintClass = str_replace('SLLH\\IsoCodesValidator\\Constraints\\', '', get_class($constraint));
        /** @var IsoCodeInterface $isoCodesClass */
        $isoCodesClass = 'IsoCodes\\'.$constraintClass;

        if ($value && !$isoCodesClass::validate($value)) {
            $this->createViolation($constraint->message);
        }
    }
}
