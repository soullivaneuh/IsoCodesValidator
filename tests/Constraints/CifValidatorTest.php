<?php

namespace SLLH\IsoCodesValidator\Constraints;

class CifValidatorTest extends AbstractConstraintValidatorTest
{
    protected function getApiVersion()
    {
        return Validation::API_VERSION_2_5_BC;
    }

    protected function createValidator()
    {
        return new CifValidator();
    }

    protected function createConstraint()
    {
        return new Cif();
    }

    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($value)
    {
        $this->validator->validate($value, new Cif());
        $this->assertNoViolation();
    }

    public function getValidValues()
    {
        return array(
            array('N0032484H'),
            array('A09212275'),
            array('A59032557'),
            array('A17031246'),
            array('B85358596'),
            array('E61685095'),
            array('V27236942'),
            array('G61685095'),
        );
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($value)
    {
        $this->validator->validate($value, new Cif());

        $this->buildViolation('This Cif code is not valid.')
            ->assertRaised();
    }

    public function getInvalidValues()
    {
        return array(
            array('K11111111'), // Spanish children under the age of 14 who need a fiscal number
            array('L61685095'), // Spanish citizens resident outside Spain who do not have a Spanish Identity Card
            array('X61685095'), // Foreign individuals with financial interests in Spain < 15/07/2008
            array('Y61685095'), // Foreign individuals with financial interests in Spain > 15/07/2008
            array('N0032484'),      // no end control
            array('N0032484I'),     // NIF: first digit OK, end control digit KO
            array('M0032484I'),     // NIF: first digit KO, end control digit KO
            array('M0032484H'),     // NIF: first digit KO, end control digit OK
            array(' '),
        );
    }
}
