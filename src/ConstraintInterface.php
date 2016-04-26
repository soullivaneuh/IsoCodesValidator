<?php

namespace SLLH\IsoCodesValidator;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
interface ConstraintInterface
{
    /**
     * Since which IsoCodes version the class is available?
     *
     * @return string
     */
    public function getIsoCodesVersion();

    /**
     * Returns IsoCodes class needed for validation.
     *
     * @return string
     */
    public function getIsoCodesClass();
}
