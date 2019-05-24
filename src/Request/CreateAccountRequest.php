<?php

namespace Vook\Fitbank\Request;

use Vook\Fitbank\Contracts\RequestContract;

/**
 * Class CreateAccountRequest
 * @package Vook\Fitbank\Request
 */
class CreateAccountRequest implements RequestContract
{
    /**
     * @var string
     */
    private $mail;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $nickname;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $taxNumber;

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
     * CreateAccountRequest constructor.
     * @param string $mail
     * @param string $phone
     * @param string $nickname
     * @param string $name
     * @param string $taxNumber
     */
    public function __construct(string $mail, string $phone, string $nickname, string $name, string $taxNumber)
    {
        $this->mail = $mail;
        $this->phone = $phone;
        $this->nickname = $nickname;
        $this->name = $name;
        $this->taxNumber = $taxNumber;
    }

    public function toArray()
    {
        $request = [
            "Mail"      => $this->mail,
            "Phone"     => $this->phone,
            "Nickname"  => $this->nickname,
            "Name"      => $this->name,
            "TaxNumber" => $this->taxNumber,
        ];

        if (!empty($this->bank)){
            $request['Bank'] = $this->bank;
        }

        if (!empty($this->bankBranch)){
            $request['BankBranch'] = $this->bankBranch;
        }

        if (!empty($this->bankAccount)){
            $request['BankAccount'] = $this->bankAccount;
        }

        if (!empty($this->bankAccountDigit)){
            $request['BankAccountDigit'] = $this->bankAccountDigit;
        }
        return $request;
    }

    /**
     * @param string $mail
     * @return CreateAccountRequest
     */
    public function setMail(string $mail): CreateAccountRequest
    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * @param string $phone
     * @return CreateAccountRequest
     */
    public function setPhone(string $phone): CreateAccountRequest
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @param string $nickname
     * @return CreateAccountRequest
     */
    public function setNickname(string $nickname): CreateAccountRequest
    {
        $this->nickname = $nickname;
        return $this;
    }

    /**
     * @param string $name
     * @return CreateAccountRequest
     */
    public function setName(string $name): CreateAccountRequest
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $taxNumber
     * @return CreateAccountRequest
     */
    public function setTaxNumber(string $taxNumber): CreateAccountRequest
    {
        $this->taxNumber = $taxNumber;
        return $this;
    }

    /**
     * @param string|null $bank
     * @return CreateAccountRequest
     */
    public function setBank(?string $bank): CreateAccountRequest
    {
        $this->bank = $bank;
        return $this;
    }

    /**
     * @param string|null $bankBranch
     * @return CreateAccountRequest
     */
    public function setBankBranch(?string $bankBranch): CreateAccountRequest
    {
        $this->bankBranch = $bankBranch;
        return $this;
    }

    /**
     * @param string|null $bankAccount
     * @return CreateAccountRequest
     */
    public function setBankAccount(?string $bankAccount): CreateAccountRequest
    {
        $this->bankAccount = $bankAccount;
        return $this;
    }

    /**
     * @param string|null $bankAccountDigit
     * @return CreateAccountRequest
     */
    public function setBankAccountDigit(?string $bankAccountDigit): CreateAccountRequest
    {
        $this->bankAccountDigit = $bankAccountDigit;
        return $this;
    }
}
