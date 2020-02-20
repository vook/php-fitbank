<?php

namespace Vook\Fitbank\Request;

use Vook\Fitbank\Contracts\RequestContract;

/**
 * Class InvoiceRequest
 * @package Vook\Fitbank\Request
 */
class InvoiceRequest implements RequestContract
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $taxNumber;

    /**
     * @var string
     */
    private $barcode;

    /**
     * @var float
     */
    private $principalValue;

    /**
     * @var float
     */
    private $discountValue;

    /**
     * @var float
     */
    private $extraValue;

    /**
     * @var \DateTime
     */
    private $paymentDate;

    /**
     * @var \DateTime
     */
    private $dueDate;

    /**
     * @var string
     */
    private $identifier;

    /**
     * @var int
     */
    private $rateValueType;

    /**
     * @var int
     */
    private $rateValue;


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
    private $mailToSend;

    /**
     * @var string|null
     */
    private $phoneToSend;

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
     * @var string|null
     */
    private $beneficiaryTaxNumber;

    /**
     * @var string|null
     */
    private $beneficiaryName;

    /**
     * @var string|null
     */
    private $guarantorTaxNumber;

    /**
     * @var string|null
     */
    private $guarantorName;

    /**
     * InvoiceRequest constructor.
     * @param $name
     * @param $taxNumber
     * @param $barcode
     * @param $principalValue
     * @param $discountValue
     * @param $extraValue
     * @param $paymentDate
     * @param $dueDate
     * @param $identifier
     * @param $rateValueType
     * @param $rateValue
     */
    public function __construct(
        $name,
        $taxNumber,
        $barcode,
        $principalValue,
        $discountValue,
        $extraValue,
        $paymentDate,
        $dueDate,
        $identifier,
        $rateValueType,
        $rateValue
    ) {
        $this->name = $name;
        $this->taxNumber = $taxNumber;
        $this->barcode = $barcode;
        $this->principalValue = $principalValue;
        $this->discountValue = $discountValue;
        $this->extraValue = $extraValue;
        $this->paymentDate = $paymentDate;
        $this->dueDate = $dueDate;
        $this->identifier = $identifier;
        $this->rateValueType = $rateValueType;
        $this->rateValue = $rateValue;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $request = [
            "Name"              => $this->name,
            "TaxNumber"         => $this->taxNumber,
            "Barcode"           => $this->barcode,
            "PrincipalValue"    => $this->principalValue,
            "DiscountValue"     => $this->discountValue,
            "ExtraValue"        => $this->extraValue,
            "PaymentDate"       => $this->paymentDate->format('Y/m/d'),
            "DueDate"           => $this->dueDate->format('Y/m/d'),
            "Identifier"        => $this->identifier,
            "RateValueType"     => $this->rateValueType,
            "RateValue"         => $this->rateValue,
        ];
        $this->addIfNotEmpty($request, 'Tags',  $this->tags)
            ->addIfNotEmpty($request, 'Description', $this->description)
            ->addIfNotEmpty($request, 'MailToSend', $this->mailToSend)
            ->addIfNotEmpty($request, 'PhoneToSend', $this->phoneToSend)
            ->addIfNotEmpty($request, 'FeePayerTaxNumber', $this->feePayerTaxNumber)
            ->addIfNotEmpty($request, 'FeePayerFullName', $this->feePayerFullName)
            ->addIfNotEmpty($request, 'FeePayerMail', $this->feePayerMail)
            ->addIfNotEmpty($request, 'FeePayerPhone', $this->feePayerPhone)
            ->addIfNotEmpty($request, 'FeePayerBank', $this->feePayerBank)
            ->addIfNotEmpty($request, 'FeePayerBankBranch', $this->feePayerBankBranch)
            ->addIfNotEmpty($request, 'FeePayerBankAccount', $this->feePayerBankAccount)
            ->addIfNotEmpty($request, 'FeePayerBankAccountDigit', $this->feePayerBankAccountDigit)
            ->addIfNotEmpty($request, 'BeneficiaryTaxNumber', $this->beneficiaryTaxNumber)
            ->addIfNotEmpty($request, 'BeneficiaryName', $this->beneficiaryName)
            ->addIfNotEmpty($request, 'GuarantorTaxNumber', $this->guarantorTaxNumber)
            ->addIfNotEmpty($request, 'GuarantorName', $this->guarantorName);
        return $request;
    }

    /**
     * @param $request
     * @param $name
     * @param $value
     * @return $this
     */
    private function addIfNotEmpty(&$request, $name, $value)
    {
        if (!empty($value)) {
            $request[$name] = $value;
        }
        return $this;
    }

    /**
     * @param string $name
     * @return InvoiceRequest
     */
    public function setName(string $name): InvoiceRequest
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $taxNumber
     * @return InvoiceRequest
     */
    public function setTaxNumber(string $taxNumber): InvoiceRequest
    {
        $this->taxNumber = $taxNumber;
        return $this;
    }

    /**
     * @param string $barcode
     * @return InvoiceRequest
     */
    public function setBarcode(string $barcode): InvoiceRequest
    {
        $this->barcode = $barcode;
        return $this;
    }

    /**
     * @param float $principalValue
     * @return InvoiceRequest
     */
    public function setPrincipalValue(float $principalValue): InvoiceRequest
    {
        $this->principalValue = $principalValue;
        return $this;
    }

    /**
     * @param float $discountValue
     * @return InvoiceRequest
     */
    public function setDiscountValue(float $discountValue): InvoiceRequest
    {
        $this->discountValue = $discountValue;
        return $this;
    }

    /**
     * @param float $extraValue
     * @return InvoiceRequest
     */
    public function setExtraValue(float $extraValue): InvoiceRequest
    {
        $this->extraValue = $extraValue;
        return $this;
    }

    /**
     * @param \DateTime $paymentDate
     * @return InvoiceRequest
     */
    public function setPaymentDate(\DateTime $paymentDate): InvoiceRequest
    {
        $this->paymentDate = $paymentDate;
        return $this;
    }

    /**
     * @param \DateTime $dueDate
     * @return InvoiceRequest
     */
    public function setDueDate(\DateTime $dueDate): InvoiceRequest
    {
        $this->dueDate = $dueDate;
        return $this;
    }

    /**
     * @param string $identifier
     * @return InvoiceRequest
     */
    public function setIdentifier(string $identifier): InvoiceRequest
    {
        $this->identifier = $identifier;
        return $this;
    }

    /**
     * @param int $rateValueType
     * @return InvoiceRequest
     */
    public function setRateValueType(int $rateValueType): InvoiceRequest
    {
        $this->rateValueType = $rateValueType;
        return $this;
    }

    /**
     * @param int $rateValue
     * @return InvoiceRequest
     */
    public function setRateValue(int $rateValue): InvoiceRequest
    {
        $this->rateValue = $rateValue;
        return $this;
    }

    /**
     * @param array $tags
     * @return InvoiceRequest
     */
    public function setTags(array $tags): InvoiceRequest
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @param string|null $description
     * @return InvoiceRequest
     */
    public function setDescription(?string $description): InvoiceRequest
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param string|null $mailToSend
     * @return InvoiceRequest
     */
    public function setMailToSend(?string $mailToSend): InvoiceRequest
    {
        $this->mailToSend = $mailToSend;
        return $this;
    }

    /**
     * @param string|null $phoneToSend
     * @return InvoiceRequest
     */
    public function setPhoneToSend(?string $phoneToSend): InvoiceRequest
    {
        $this->phoneToSend = $phoneToSend;
        return $this;
    }

    /**
     * @param string|null $feePayerTaxNumber
     * @return InvoiceRequest
     */
    public function setFeePayerTaxNumber(?string $feePayerTaxNumber): InvoiceRequest
    {
        $this->feePayerTaxNumber = $feePayerTaxNumber;
        return $this;
    }

    /**
     * @param string|null $feePayerFullName
     * @return InvoiceRequest
     */
    public function setFeePayerFullName(?string $feePayerFullName): InvoiceRequest
    {
        $this->feePayerFullName = $feePayerFullName;
        return $this;
    }

    /**
     * @param string|null $feePayerMail
     * @return InvoiceRequest
     */
    public function setFeePayerMail(?string $feePayerMail): InvoiceRequest
    {
        $this->feePayerMail = $feePayerMail;
        return $this;
    }

    /**
     * @param string|null $feePayerPhone
     * @return InvoiceRequest
     */
    public function setFeePayerPhone(?string $feePayerPhone): InvoiceRequest
    {
        $this->feePayerPhone = $feePayerPhone;
        return $this;
    }

    /**
     * @param string|null $feePayerBank
     * @return InvoiceRequest
     */
    public function setFeePayerBank(?string $feePayerBank): InvoiceRequest
    {
        $this->feePayerBank = $feePayerBank;
        return $this;
    }

    /**
     * @param string|null $feePayerBankBranch
     * @return InvoiceRequest
     */
    public function setFeePayerBankBranch(?string $feePayerBankBranch): InvoiceRequest
    {
        $this->feePayerBankBranch = $feePayerBankBranch;
        return $this;
    }

    /**
     * @param string|null $feePayerBankAccount
     * @return InvoiceRequest
     */
    public function setFeePayerBankAccount(?string $feePayerBankAccount): InvoiceRequest
    {
        $this->feePayerBankAccount = $feePayerBankAccount;
        return $this;
    }

    /**
     * @param string|null $feePayerBankAccountDigit
     * @return InvoiceRequest
     */
    public function setFeePayerBankAccountDigit(?string $feePayerBankAccountDigit): InvoiceRequest
    {
        $this->feePayerBankAccountDigit = $feePayerBankAccountDigit;
        return $this;
    }

    /**
     * @param string|null $beneficiaryTaxNumber
     * @return InvoiceRequest
     */
    public function setBeneficiaryTaxNumber(?string $beneficiaryTaxNumber): InvoiceRequest
    {
        $this->beneficiaryTaxNumber = $beneficiaryTaxNumber;
        return $this;
    }

    /**
     * @param string|null $beneficiaryName
     * @return InvoiceRequest
     */
    public function setBeneficiaryName(?string $beneficiaryName): InvoiceRequest
    {
        $this->beneficiaryName = $beneficiaryName;
        return $this;
    }

    /**
     * @param string|null $guarantorTaxNumber
     * @return InvoiceRequest
     */
    public function setGuarantorTaxNumber(?string $guarantorTaxNumber): InvoiceRequest
    {
        $this->guarantorTaxNumber = $guarantorTaxNumber;
        return $this;
    }

    /**
     * @param string|null $guarantorName
     * @return InvoiceRequest
     */
    public function setGuarantorName(?string $guarantorName): InvoiceRequest
    {
        $this->guarantorName = $guarantorName;
        return $this;
    }
}
