<?php

namespace Vook\Fitbank\Entities;

use Vook\Fitbank\Contracts\AccountType;
use Vook\Fitbank\Contracts\EntityContract;

/**
 * Class Bank
 * @package Vook\Fitbank\Entities
 */
class Bank implements EntityContract
{
    /**
     * @var string
     */
    private $bankNumber;

    /**
     * @var string
     */
    private $branchNumber;

    /**
     * @var int
     */
    private $branchDigit;

    /**
     * @var string
     */
    private $accountNumber;

    /**
     * @var string
     */
    private $accountDigit;

    /**
     * @var AccountType
     */
    private $AccountType;

    /**
     * @return string
     */
    public function getBankNumber(): string
    {
        return $this->bankNumber;
    }

    /**
     * @param string $bankNumber
     * @return Bank
     */
    public function setBankNumber(string $bankNumber): Bank
    {
        $this->bankNumber = $bankNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getBranchNumber(): string
    {
        return $this->branchNumber;
    }

    /**
     * @param string $branchNumber
     * @return Bank
     */
    public function setBranchNumber(string $branchNumber): Bank
    {
        $this->branchNumber = $branchNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getBranchDigit(): int
    {
        return $this->branchDigit;
    }

    /**
     * @param int $branchDigit
     * @return Bank
     */
    public function setBranchDigit(int $branchDigit): Bank
    {
        $this->branchDigit = $branchDigit;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

    /**
     * @param string $accountNumber
     * @return Bank
     */
    public function setAccountNumber(string $accountNumber): Bank
    {
        $this->accountNumber = $accountNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountDigit(): string
    {
        return $this->accountDigit;
    }

    /**
     * @param string $accountDigit
     * @return Bank
     */
    public function setAccountDigit(string $accountDigit): Bank
    {
        $this->accountDigit = $accountDigit;
        return $this;
    }

    /**
     * @return AccountType
     */
    public function getAccountType(): AccountType
    {
        return $this->AccountType;
    }

    /**
     * @param AccountType $AccountType
     * @return Bank
     */
    public function setAccountType(AccountType $AccountType): Bank
    {
        $this->AccountType = $AccountType;
        return $this;
    }
}
