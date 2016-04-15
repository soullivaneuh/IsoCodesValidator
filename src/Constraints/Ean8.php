<?php

namespace SLLH\IsoCodesValidator\Constraints;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class Ean8 extends IsoCodesGeneric
{
    public $message = 'This EAN 8 code is not valid.';
}
