<?php

namespace SLLH\IsoCodesValidator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class StructuredCommunication
 *
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 */
class StructuredCommunication extends Constraint
{
    public $message = 'This value is not a valid structured communication code.';
}
