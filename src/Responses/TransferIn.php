<?php

namespace Vook\Fitbank\Responses;

use Vook\Fitbank\Abstracts\Responses;

/**
 * Class TransferIn
 * @package Vook\Fitbank\Responses
 */
class TransferIn extends Responses
{
    protected $documentNumber;
    protected $principalValue;
    protected $bankNumber;
    protected $bankAgency;
    protected $bankAccount;
    protected $transferDate;
    protected $status;

    /**
     * @return mixed
     */
    public function getDocumentNumber()
    {
        return $this->documentNumber;
    }

    /**
     * @return mixed
     */
    public function getPrincipalValue()
    {
        return $this->principalValue;
    }

    /**
     * @return mixed
     */
    public function getBankNumber()
    {
        return $this->bankNumber;
    }

    /**
     * @return mixed
     */
    public function getBankAgency()
    {
        return $this->bankAgency;
    }

    /**
     * @return mixed
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * @return mixed
     */
    public function getTransferDate()
    {
        return $this->transferDate;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }
}
