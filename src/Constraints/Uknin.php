<?php

namespace SLLH\IsoCodesValidator\Constraints;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class Uknin extends IsoCodesGeneric
{
    public $message = 'This value is not a valid NINO.';
}
