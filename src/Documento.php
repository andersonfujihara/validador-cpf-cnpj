<?php

namespace Bissolli\ValidadorCpfCnpj;

class Documento
{
    /**
     * Value to be validated
     *
     * @var string
     */
    public $obj;

    /**
     * Create a new Documento instance
     *
     * @param string $value
     */
    public function __construct($value = null)
    {
        $value = (string) preg_replace('/[^0-9]/', '', $value);

        if (strlen($value) === 11)
            $this->obj = new CPF($value);
        else
            $this->obj = new CNPJ($value);
    }

    /**
     * Get document type
     *
     * @return bool|string
     */
    public function getType()
    {
        if ($this->isValid())
            return $this->obj->getClassName();

        return false;
    }

    /**
     * Check if it is a valid number
     *
     * @return bool|string
     */
    public function isValid()
    {
        return $this->obj->isValid();
    }

    /**
     * Format number
     *
     * @return string
     */
    public function format()
    {
        return $this->obj->format();
    }

    /**
     * Get the raw value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->obj->getValue();
    }
}
