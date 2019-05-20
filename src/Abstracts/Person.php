<?php

namespace Vook\Fitbank\Abstracts;

use Vook\Fitbank\Contracts\EntityContract;
use Vook\Fitbank\Entities\Bank;
use Vook\Fitbank\Entities\Address;

/**
 * Class Person
 * @package Vook\Fitbank\Entities\Pessoa
 */
abstract class Person implements EntityContract
{
    /**
     * @var int
     */
    private $identifier;

    /**
     * @var string
     */
    private $nickName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var Bank|null
     */
    private $bank;

    /**
     * @var Address
     */
    private $address;

    /**
     * @return int
     */
    public function getIdentifier(): int
    {
        return $this->identifier;
    }

    /**
     * @param int $identifier
     * @return Person
     */
    public function setIdentifier(int $identifier): Person
    {
        $this->identifier = $identifier;
        return $this;
    }

    /**
     * @return string
     */
    public function getNickName(): string
    {
        return $this->nickName;
    }

    /**
     * @param string $nickName
     * @return Person
     */
    public function setNickName(string $nickName): Person
    {
        $this->nickName = $nickName;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Person
     */
    public function setEmail(string $email): Person
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Person
     */
    public function setPhone(string $phone): Person
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return Bank|null
     */
    public function getBank(): ?Bank
    {
        return $this->bank;
    }

    /**
     * @param Bank|null $bank
     * @return Person
     */
    public function setBank(?Bank $bank): Person
    {
        $this->bank = $bank;
        return $this;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return Person
     */
    public function setAddress(Address $address): Person
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string|null
     */
    abstract public function getPersonName(): ?string;

    /**
     * @return string|null
     */
    abstract public function getPersonIdentity(): ?string;
}
