<?php

namespace Vook\Fitbank\Request;

use Vook\Fitbank\Contracts\RequestContract;

/**
 * Class TransferInRequest
 * @package Vook\Fitbank\Request
 */
class TransferInRequest implements RequestContract
{

    /**
     * @var float
     */
    private $totalValue;

    /**
     * @var float
     */
    private $rateValue;

    /**
     * @var \DateTime
     */
    private $transferDate;

    /**
     * @var string
     */
    private $supplierName;

    /**
     * @var string
     */
    private $supplierTaxNumber;

    /**
     * @var string
     */
    private $supplierTradingName;

    /**
     * @var string
     */
    private $supplierMail;

    /**
     * @var string
     */
    private $supplierPhone;

    /**
     * @var string
     */
    private $bankNumber;

    /**
     * @var string
     */
    private $bankBranch;

    /**
     * @var string
     */
    private $bankAccount;

    /**
     * @var array
     */
    private $products = []; //TODO fazer entidade de produtos

    /**
     * TransferInRequest constructor.
     * @param float $totalValue
     * @param float $rateValue
     * @param \DateTime $transferDate
     * @param string $supplierName
     * @param string $supplierTaxNumber
     * @param string $supplierTradingName
     * @param string $supplierMail
     * @param string $supplierPhone
     * @param string $bankNumber
     * @param string $bankBranch
     * @param string $bankAccount
     */
    public function __construct(
        float $totalValue,
        float $rateValue,
        \DateTime $transferDate,
        string $supplierName,
        string $supplierTaxNumber,
        string $supplierTradingName,
        string $supplierMail,
        string $supplierPhone,
        string $bankNumber,
        string $bankBranch,
        string $bankAccount
    ) {
        $this->totalValue = $totalValue;
        $this->rateValue = $rateValue;
        $this->transferDate = $transferDate;
        $this->supplierName = $supplierName;
        $this->supplierTaxNumber = $supplierTaxNumber;
        $this->supplierTradingName = $supplierTradingName;
        $this->supplierMail = $supplierMail;
        $this->supplierPhone = $supplierPhone;
        $this->bankNumber = $bankNumber;
        $this->bankBranch = $bankBranch;
        $this->bankAccount = $bankAccount;
    }

    /**
     *
     */
    public function toArray()
    {
        $request = [
            'TotalValue'            => $this->totalValue,
            'RateValue'             => $this->rateValue,
            'TransferDate'          => $this->transferDate->format('Y/m/d'),
            'SupplierName'          => $this->supplierName,
            'SupplierTaxNumber'     => $this->supplierTaxNumber,
            'SupplierTradingName'   => $this->supplierTradingName,
            'SupplierMail'          => $this->supplierMail,
            'SupplierPhone'         => $this->supplierPhone,
            'BankNumber'            => $this->bankNumber,
            'BankBranch'            => $this->bankBranch,
            'BankAccount'           => $this->bankAccount,
        ];

        if (!empty($this->products)) {
            $request['Products'] = $this->products;
        }
        return $request;
    }

    /**
     * @param float $totalValue
     * @return TransferInRequest
     */
    public function setTotalValue(float $totalValue): TransferInRequest
    {
        $this->totalValue = $totalValue;
        return $this;
    }

    /**
     * @param float $rateValue
     * @return TransferInRequest
     */
    public function setRateValue(float $rateValue): TransferInRequest
    {
        $this->rateValue = $rateValue;
        return $this;
    }

    /**
     * @param \DateTime $transferDate
     * @return TransferInRequest
     */
    public function setTransferDate(\DateTime $transferDate): TransferInRequest
    {
        $this->transferDate = $transferDate;
        return $this;
    }

    /**
     * @param string $supplierName
     * @return TransferInRequest
     */
    public function setSupplierName(string $supplierName): TransferInRequest
    {
        $this->supplierName = $supplierName;
        return $this;
    }

    /**
     * @param string $supplierTaxNumber
     * @return TransferInRequest
     */
    public function setSupplierTaxNumber(string $supplierTaxNumber): TransferInRequest
    {
        $this->supplierTaxNumber = $supplierTaxNumber;
        return $this;
    }

    /**
     * @param string $supplierTradingName
     * @return TransferInRequest
     */
    public function setSupplierTradingName(string $supplierTradingName): TransferInRequest
    {
        $this->supplierTradingName = $supplierTradingName;
        return $this;
    }

    /**
     * @param string $supplierMail
     * @return TransferInRequest
     */
    public function setSupplierMail(string $supplierMail): TransferInRequest
    {
        $this->supplierMail = $supplierMail;
        return $this;
    }

    /**
     * @param string $supplierPhone
     * @return TransferInRequest
     */
    public function setSupplierPhone(string $supplierPhone): TransferInRequest
    {
        $this->supplierPhone = $supplierPhone;
        return $this;
    }

    /**
     * @param string $bankNumber
     * @return TransferInRequest
     */
    public function setBankNumber(string $bankNumber): TransferInRequest
    {
        $this->bankNumber = $bankNumber;
        return $this;
    }

    /**
     * @param string $bankBranch
     * @return TransferInRequest
     */
    public function setBankBranch(string $bankBranch): TransferInRequest
    {
        $this->bankBranch = $bankBranch;
        return $this;
    }

    /**
     * @param string $bankAccount
     * @return TransferInRequest
     */
    public function setBankAccount(string $bankAccount): TransferInRequest
    {
        $this->bankAccount = $bankAccount;
        return $this;
    }

    /**
     * @param array $products
     * @return TransferInRequest
     */
    public function setProducts(array $products): TransferInRequest
    {
        $this->products = $products;
        return $this;
    }
}
