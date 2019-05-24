<?php

namespace Vook\Fitbank\Request;

use Vook\Fitbank\Contracts\RequestContract;

/**
 * Class TransferRequest
 * @package Vook\Fitbank\Request
 */
class TransferRequest implements RequestContract
{

    /**
     * @var string
     */
    private $fromTaxNumber;

    /**
     * @var string
     */
    private $toTaxNumber;

    /**
     * @var string
     */
    private $toName;

    /**
     * @var string
     */
    private $bank;

    /**
     * @var string
     */
    private $bankBranch;

    /**
     * @var string
     */
    private $bankAccount;

    /**
     * @var string
     */
    private $bankAccountDigit;

    /**
     * @var float
     */
    private $value;

    /**
     * @var float
     */
    private $rateValue;

    /**
     * @var string
     */
    private $identifier;

    /**
     * @var int
     */
    private $rateValueType;

    /**
     * @var \DateTime
     */
    private $paymentDate;

    /**
     * @var string|null
     */
    private $fromBank;

    /**
     * @var string|null
     */
    private $fromBankBranch;

    /**
     * @var string|null
     */
    private $fromBankAccount;

    /**
     * @var string|null
     */
    private $fromBankAccountDigit;

    /**
     * @var int|null
     */
    private $accountType;

    /**
     * @var array
     */
    private $tags = [];

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var string|null
     */
    private $feePayerTaxNumber;

    /**
     * @var string|null
     */
    private $feePayerFullName;

    /**
     * @var string|null
     */
    private $feePayerMail;

    /**
     * @var string|null
     */
    private $feePayerPhone;

    /**
     * @var string|null
     */
    private $feePayerBank;

    /**
     * @var string|null
     */
    private $feePayerBankBranch;

    /**
     * @var string|null
     */
    private $feePayerBankAccount;

    /**
     * @var string|null
     */
    private $feePayerBankAccountDigit;
    
    /**
     * TransferRequest constructor.
     * @param string $fromTaxNumber
     * @param string $toTaxNumber
     * @param string $toName
     * @param string $bank
     * @param string $bankBranch
     * @param string $bankAccount
     * @param string $bankAccountDigit
     * @param float $value
     * @param float $rateValue
     * @param string $identifier
     * @param int $rateValueType
     * @param \DateTime $paymentDate
     */
    public function __construct(
        string $fromTaxNumber,
        string $toTaxNumber,
        string $toName,
        string $bank,
        string $bankBranch,
        string $bankAccount,
        string $bankAccountDigit,
        float $value,
        float $rateValue,
        string $identifier,
        int $rateValueType,
        \DateTime $paymentDate
    ) {
        $this->fromTaxNumber = $fromTaxNumber;
        $this->toTaxNumber = $toTaxNumber;
        $this->toName = $toName;
        $this->bank = $bank;
        $this->bankBranch = $bankBranch;
        $this->bankAccount = $bankAccount;
        $this->bankAccountDigit = $bankAccountDigit;
        $this->value = $value;
        $this->rateValue = $rateValue;
        $this->identifier = $identifier;
        $this->rateValueType = $rateValueType;
        $this->paymentDate = $paymentDate;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $request = [
            'FromTaxNumber'     => $this->fromTaxNumber,
            'ToTaxNumber'       => $this->toTaxNumber,
            'ToName'            => $this->toName,
            'Bank'              => $this->bank,
            'BankBranch'        => $this->bankBranch,
            'BankAccount'       => $this->bankAccount,
            'BankAccountDigit'  => $this->bankAccountDigit,
            'Value'             => $this->value,
            'RateValue'         => $this->rateValue,
            'Identifier'        => $this->identifier,
            'RateValueType'     => $this->rateValueType,
            'PaymentDate'       => $this->paymentDate->format('Y/m/d'),
        ];
        if (!empty($this->fromBank)) {
            $request['FromBank'] = $this->fromBank;
        }

        if (!empty($this->fromBankBranch)) {
            $request['FromBankBranch'] = $this->fromBankBranch;
        }

        if (!empty($this->fromBankAccount)) {
            $request['FromBankAccount'] = $this->fromBankAccount;
        }

        if (!empty($this->fromBankAccountDigit)) {
            $request['FromBankAccountDigit'] = $this->fromBankAccountDigit;
        }

        if (!empty($this->accountType)) {
            $request['AccountType'] = $this->accountType;
        }

        if (!empty($this->tags)) {
            $request['Tags'] = $this->tags;
        }

        if (!empty($this->description)) {
            $request['Description'] = $this->description;
        }

        if (!empty($this->feePayerTaxNumber)) {
            $request['FeePayerTaxNumber'] = $this->feePayerTaxNumber;
        }

        if (!empty($this->feePayerFullName)) {
            $request['FeePayerFullName'] = $this->feePayerFullName;
        }

        if (!empty($this->feePayerMail)) {
            $request['FeePayerMail'] = $this->feePayerMail;
        }

        if (!empty($this->feePayerPhone)) {
            $request['FeePayerPhone'] = $this->feePayerPhone;
        }

        if (!empty($this->feePayerBank)) {
            $request['FeePayerBank'] = $this->feePayerBank;
        }

        if (!empty($this->feePayerBankBranch)) {
            $request['FeePayerBankBranch'] = $this->feePayerBankBranch;
        }

        if (!empty($this->feePayerBankAccount)) {
            $request['FeePayerBankAccount'] = $this->feePayerBankAccount;
        }

        if (!empty($this->feePayerBankAccountDigit)) {
            $request['FeePayerBankAccountDigit'] = $this->feePayerBankAccountDigit;
        }
        return $request;
    }

    /**
     * @param string $fromTaxNumber
     * @return TransferRequest
     */
    public function setFromTaxNumber(string $fromTaxNumber): TransferRequest
    {
        $this->fromTaxNumber = $fromTaxNumber;
        return $this;
    }

    /**
     * @param string $toTaxNumber
     * @return TransferRequest
     */
    public function setToTaxNumber(string $toTaxNumber): TransferRequest
    {
        $this->toTaxNumber = $toTaxNumber;
        return $this;
    }

    /**
     * @param string $toName
     * @return TransferRequest
     */
    public function setToName(string $toName): TransferRequest
    {
        $this->toName = $toName;
        return $this;
    }

    /**
     * @param string $bank
     * @return TransferRequest
     */
    public function setBank(string $bank): TransferRequest
    {
        $this->bank = $bank;
        return $this;
    }

    /**
     * @param string $bankBranch
     * @return TransferRequest
     */
    public function setBankBranch(string $bankBranch): TransferRequest
    {
        $this->bankBranch = $bankBranch;
        return $this;
    }

    /**
     * @param string $bankAccount
     * @return TransferRequest
     */
    public function setBankAccount(string $bankAccount): TransferRequest
    {
        $this->bankAccount = $bankAccount;
        return $this;
    }

    /**
     * @param string $bankAccountDigit
     * @return TransferRequest
     */
    public function setBankAccountDigit(string $bankAccountDigit): TransferRequest
    {
        $this->bankAccountDigit = $bankAccountDigit;
        return $this;
    }

    /**
     * @param float $value
     * @return TransferRequest
     */
    public function setValue(float $value): TransferRequest
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @param float $rateValue
     * @return TransferRequest
     */
    public function setRateValue(float $rateValue): TransferRequest
    {
        $this->rateValue = $rateValue;
        return $this;
    }

    /**
     * @param string $identifier
     * @return TransferRequest
     */
    public function setIdentifier(string $identifier): TransferRequest
    {
        $this->identifier = $identifier;
        return $this;
    }

    /**
     * @param int $rateValueType
     * @return TransferRequest
     */
    public function setRateValueType(int $rateValueType): TransferRequest
    {
        $this->rateValueType = $rateValueType;
        return $this;
    }

    /**
     * @param \DateTime $paymentDate
     * @return TransferRequest
     */
    public function setPaymentDate(\DateTime $paymentDate): TransferRequest
    {
        $this->paymentDate = $paymentDate;
        return $this;
    }

    /**
     * @param string|null $fromBank
     * @return TransferRequest
     */
    public function setFromBank(?string $fromBank): TransferRequest
    {
        $this->fromBank = $fromBank;
        return $this;
    }

    /**
     * @param string|null $fromBankBranch
     * @return TransferRequest
     */
    public function setFromBankBranch(?string $fromBankBranch): TransferRequest
    {
        $this->fromBankBranch = $fromBankBranch;
        return $this;
    }

    /**
     * @param string|null $fromBankAccount
     * @return TransferRequest
     */
    public function setFromBankAccount(?string $fromBankAccount): TransferRequest
    {
        $this->fromBankAccount = $fromBankAccount;
        return $this;
    }

    /**
     * @param string|null $fromBankAccountDigit
     * @return TransferRequest
     */
    public function setFromBankAccountDigit(?string $fromBankAccountDigit): TransferRequest
    {
        $this->fromBankAccountDigit = $fromBankAccountDigit;
        return $this;
    }

    /**
     * @param int|null $accountType
     * @return TransferRequest
     */
    public function setAccountType(?int $accountType): TransferRequest
    {
        $this->accountType = $accountType;
        return $this;
    }

    /**
     * @param array $tags
     * @return TransferRequest
     */
    public function setTags(array $tags): TransferRequest
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @param string|null $description
     * @return TransferRequest
     */
    public function setDescription(?string $description): TransferRequest
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param string|null $feePayerTaxNumber
     * @return TransferRequest
     */
    public function setFeePayerTaxNumber(?string $feePayerTaxNumber): TransferRequest
    {
        $this->feePayerTaxNumber = $feePayerTaxNumber;
        return $this;
    }

    /**
     * @param string|null $feePayerFullName
     * @return TransferRequest
     */
    public function setFeePayerFullName(?string $feePayerFullName): TransferRequest
    {
        $this->feePayerFullName = $feePayerFullName;
        return $this;
    }

    /**
     * @param string|null $feePayerMail
     * @return TransferRequest
     */
    public function setFeePayerMail(?string $feePayerMail): TransferRequest
    {
        $this->feePayerMail = $feePayerMail;
        return $this;
    }

    /**
     * @param string|null $feePayerPhone
     * @return TransferRequest
     */
    public function setFeePayerPhone(?string $feePayerPhone): TransferRequest
    {
        $this->feePayerPhone = $feePayerPhone;
        return $this;
    }

    /**
     * @param string|null $feePayerBank
     * @return TransferRequest
     */
    public function setFeePayerBank(?string $feePayerBank): TransferRequest
    {
        $this->feePayerBank = $feePayerBank;
        return $this;
    }

    /**
     * @param string|null $feePayerBankBranch
     * @return TransferRequest
     */
    public function setFeePayerBankBranch(?string $feePayerBankBranch): TransferRequest
    {
        $this->feePayerBankBranch = $feePayerBankBranch;
        return $this;
    }

    /**
     * @param string|null $feePayerBankAccount
     * @return TransferRequest
     */
    public function setFeePayerBankAccount(?string $feePayerBankAccount): TransferRequest
    {
        $this->feePayerBankAccount = $feePayerBankAccount;
        return $this;
    }

    /**
     * @param string|null $feePayerBankAccountDigit
     * @return TransferRequest
     */
    public function setFeePayerBankAccountDigit(?string $feePayerBankAccountDigit): TransferRequest
    {
        $this->feePayerBankAccountDigit = $feePayerBankAccountDigit;
        return $this;
    }
}
