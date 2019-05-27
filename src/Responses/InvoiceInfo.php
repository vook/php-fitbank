<?php

namespace Vook\Fitbank\Responses;

use Vook\Fitbank\Abstracts\Responses;

/**
 * Class InvoiceInfo
 * @package Vook\Fitbank\Entities
 */
class InvoiceInfo extends Responses
{
    protected $barcode;
    protected $digitableLine;
    protected $dueDate;
    protected $bankCode;
    protected $bankName;
    protected $value;
    protected $concessionaireName;
    protected $concessionaireCode;

    /**
     * @return mixed
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * @return mixed
     */
    public function getDigitableLine()
    {
        return $this->digitableLine;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @return mixed
     */
    public function getBankCode()
    {
        return $this->bankCode;
    }

    /**
     * @return mixed
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return mixed
     */
    public function getConcessionaireName()
    {
        return $this->concessionaireName;
    }

    /**
     * @return mixed
     */
    public function getConcessionaireCode()
    {
        return $this->concessionaireCode;
    }
}
