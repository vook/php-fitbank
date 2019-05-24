<?php

namespace Vook\Fitbank\Responses;

use Vook\Fitbank\Abstracts\Responses;

/**
 * Class InvoiceInfo
 * @package Vook\Fitbank\Entities
 */
class InvoiceInfo extends Responses
{
    private $barcode;
    private $digitableLine;
    private $maturedAt;
    private $bankCode;
    private $bankName;
    private $value;
    private $concessionaireName;
    private $concessionaireCode;

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
    public function getMaturedAt()
    {
        return $this->maturedAt;
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
