<?php

namespace Vook\Fitbank\Entities;

use Vook\Fitbank\Contracts\EntityContract;

/**
 * Class Endereco
 * @package Vook\Fitbank\Entities
 */
class Address implements EntityContract
{
    /**
     * @var string
     */
    private $estado;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $neighborhood;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $secondaryAddress;

    /**
     * @var string
     */
    private $postCode;

    /**
     * @return string
     */
    public function getEstado(): string
    {
        return $this->estado;
    }

    /**
     * @param string $estado
     * @return Address
     */
    public function setEstado(string $estado): Address
    {
        $this->estado = $estado;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Address
     */
    public function setCity(string $city): Address
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getNeighborhood(): string
    {
        return $this->neighborhood;
    }

    /**
     * @param string $neighborhood
     * @return Address
     */
    public function setNeighborhood(string $neighborhood): Address
    {
        $this->neighborhood = $neighborhood;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return Address
     */
    public function setAddress(string $address): Address
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string
     */
    public function getSecondaryAddress(): string
    {
        return $this->secondaryAddress;
    }

    /**
     * @param string $secondaryAddress
     * @return Address
     */
    public function setSecondaryAddress(string $secondaryAddress): Address
    {
        $this->secondaryAddress = $secondaryAddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostCode(): string
    {
        return $this->postCode;
    }

    /**
     * @param string $postCode
     * @return Address
     */
    public function setPostCode(string $postCode): Address
    {
        $this->postCode = $postCode;
        return $this;
    }
}
