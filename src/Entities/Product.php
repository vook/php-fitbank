<?php

namespace Vook\Fitbank\Entities;

use Vook\Fitbank\Contracts\EntityContract;
use Vook\Fitbank\Abstracts\Person;

/**
 * Class Produto
 * @package Vook\Fitbank\Entities
 */
class Product implements EntityContract
{
    /**
     * @var Person
     */
    private $receiver;

    /**
     * @var Person
     */
    private $seller;

    /**
     * @var bool
     */
    private $isAutomatic;

    /**
     * @var int
     */
    private $value;

    /**
     * @var int
     */
    private $rate;

    /**
     * @var int
     */
    private $code;

    /**
     * @var string
     */
    private $name;

    /**
     * @return Person
     */
    public function getReceiver(): Person
    {
        return $this->receiver;
    }

    /**
     * @param Person $receiver
     * @return Product
     */
    public function setReceiver(Person $receiver): Product
    {
        $this->receiver = $receiver;
        return $this;
    }

    /**
     * @return Person
     */
    public function getSeller(): Person
    {
        return $this->seller;
    }

    /**
     * @param Person $seller
     * @return Product
     */
    public function setSeller(Person $seller): Product
    {
        $this->seller = $seller;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAutomatic(): bool
    {
        return $this->isAutomatic;
    }

    /**
     * @param bool $isAutomatic
     * @return Product
     */
    public function setIsAutomatic(bool $isAutomatic): Product
    {
        $this->isAutomatic = $isAutomatic;
        return $this;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     * @return Product
     */
    public function setValue(int $value): Product
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getRate(): int
    {
        return $this->rate;
    }

    /**
     * @param int $rate
     * @return Product
     */
    public function setRate(int $rate): Product
    {
        $this->rate = $rate;
        return $this;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @param int $code
     * @return Product
     */
    public function setCode(int $code): Product
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Product
     */
    public function setName(string $name): Product
    {
        $this->name = $name;
        return $this;
    }
}
