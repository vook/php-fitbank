<?php

namespace Vook\Fitbank\Request;

use Vook\Fitbank\Contracts\RequestContract;

/**
 * Class StatementRequest
 * @package Vook\Fitbank\Request
 */
class StatementRequest implements RequestContract
{
    /**
     * @var string
     */
    private $taxNumber;

    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * @var array
     */
    private $tags = [];

    /**
     * @var string|null
     */
    private $bank;

    /**
     * @var string|null
     */
    private $bankBranch;

    /**
     * @var string|null
     */
    private $bankAccount;

    /**
     * @var string|null
     */
    private $bankAccountDigit;

    /**
     * StatementRequest constructor.
     * @param string $taxNumber
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     */
    public function __construct(string $taxNumber, \DateTime $startDate, \DateTime $endDate)
    {
        $this->taxNumber = $taxNumber;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function toArray()
    {
        $request = [
            "TaxNumber" => $this->taxNumber,
            "StartDate" => $this->startDate->format('Y/m/d'),
            "EndDate"   => $this->endDate->format('Y/m/d'),
        ];

        if (!empty($this->tags)) {
            $request['Tags'] = $this->tags;    
        }

        if (!empty($this->bank)) {
            $request['Bank'] = $this->bank;    
        }

        if (!empty($this->bankBranch)) {
            $request['BankBranch'] = $this->bankBranch;    
        }

        if (!empty($this->bankAccount)) {
            $request['BankAccount'] = $this->bankAccount;    
        }
        
        if (!empty($this->bankAccountDigit)) {
            $request['BankAccountDigit'] = $this->bankAccountDigit;    
        }
        
        return $request;
    }

    /**
     * @return string
     */
    public function getTaxNumber(): string
    {
        return $this->taxNumber;
    }

    /**
     * @param string $taxNumber
     * @return StatementRequest
     */
    public function setTaxNumber(string $taxNumber): StatementRequest
    {
        $this->taxNumber = $taxNumber;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate(): \DateTime
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime $startDate
     * @return StatementRequest
     */
    public function setStartDate(\DateTime $startDate): StatementRequest
    {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate(): \DateTime
    {
        return $this->endDate;
    }

    /**
     * @param \DateTime $endDate
     * @return StatementRequest
     */
    public function setEndDate(\DateTime $endDate): StatementRequest
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     * @return StatementRequest
     */
    public function setTags(array $tags): StatementRequest
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBank(): ?string
    {
        return $this->bank;
    }

    /**
     * @param string|null $bank
     * @return StatementRequest
     */
    public function setBank(?string $bank): StatementRequest
    {
        $this->bank = $bank;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBankBranch(): ?string
    {
        return $this->bankBranch;
    }

    /**
     * @param string|null $bankBranch
     * @return StatementRequest
     */
    public function setBankBranch(?string $bankBranch): StatementRequest
    {
        $this->bankBranch = $bankBranch;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBankAccount(): ?string
    {
        return $this->bankAccount;
    }

    /**
     * @param string|null $bankAccount
     * @return StatementRequest
     */
    public function setBankAccount(?string $bankAccount): StatementRequest
    {
        $this->bankAccount = $bankAccount;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBankAccountDigit(): ?string
    {
        return $this->bankAccountDigit;
    }

    /**
     * @param string|null $bankAccountDigit
     * @return StatementRequest
     */
    public function setBankAccountDigit(?string $bankAccountDigit): StatementRequest
    {
        $this->bankAccountDigit = $bankAccountDigit;
        return $this;
    }
}
