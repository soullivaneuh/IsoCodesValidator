<?php

namespace SLLH\IsoCodesValidator\Exception;

use SLLH\IsoCodesValidator\ConstraintInterface;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class ValidatorNotExistsException extends \Exception
{
    /**
     * @param ConstraintInterface $constraint
     * @param \Exception|null     $previous
     */
    public function __construct(ConstraintInterface $constraint, \Exception $previous = null)
    {
        $message = 'The '.$constraint->getIsoCodesClass().' class does not exist.'
            .' This class is available since version '.$constraint->getIsoCodesVersion().' of IsoCodes library.'
            .' Please consider upgrading.';

        parent::__construct($message, 0, $previous);
    }
}
