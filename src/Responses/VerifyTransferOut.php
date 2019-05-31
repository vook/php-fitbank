<?php

namespace Vook\Fitbank\Responses;

use Vook\Fitbank\Abstracts\Responses;

/**
 * Class Transfer
 * @package Vook\Fitbank\Responses
 */
class VerifyTransferOut extends Responses
{
    protected $principalValue;
    protected $bankNumber;
    protected $bankAgency;
    protected $bankAccount;
    protected $bankAccountDigit;
    protected $transferDate;
    protected $status;
    protected $paymentDate;
    protected $rateValue;
    protected $paymentAuthentication;
    protected $receiptUrl;
    protected $returnErrorMessage;
    protected $returnErrorCode;
    protected $returnMessage;
    protected $returnCode;
    protected $returns;
    protected $protocolId;

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
    public function getBankAccountDigit()
    {
        return $this->bankAccountDigit;
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

    /**
     * @return mixed
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * @return mixed
     */
    public function getRateValue()
    {
        return $this->rateValue;
    }

    /**
     * @return mixed
     */
    public function getPaymentAuthentication()
    {
        return $this->paymentAuthentication;
    }

    /**
     * @return mixed
     */
    public function getReceiptUrl()
    {
        return $this->receiptUrl;
    }

    /**
     * @return mixed
     */
    public function getReturnErrorMessage()
    {
        return $this->returnErrorMessage;
    }

    /**
     * @return mixed
     */
    public function getReturnErrorCode()
    {
        return $this->returnErrorCode;
    }

    /**
     * @return mixed
     */
    public function getReturnMessage()
    {
        return $this->returnMessage;
    }

    /**
     * @return mixed
     */
    public function getReturnCode()
    {
        return $this->returnCode;
    }

    /**
     * @return mixed
     */
    public function getReturns()
    {
        return $this->returns;
    }

    /**
     * @return mixed
     */
    public function getProtocolId()
    {
        return $this->protocolId;
    }
}