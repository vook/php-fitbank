<?php

namespace Vook\Fitbank\Entities\Person;

use Vook\Fitbank\Abstracts\Person;

/**
 * Class LegalPerson
 * @package Vook\Fitbank\Entities\Person
 */
class LegalPerson extends Person
{
    /**
     * @var string
     */
    private $cnpj;

    /**
     * @var string
     */
    private $companyName;

    /**
     * @var string
     */
    private $tradingName;

    /**
     * @var NaturalPerson|null
     */
    private $responsible;

    /**
     * @return string
     */
    public function getCnpj(): string
    {
        return $this->cnpj;
    }

    /**
     * @param string $cnpj
     * @return LegalPerson
     */
    public function setCnpj(string $cnpj): LegalPerson
    {
        $this->cnpj = $cnpj;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     * @return LegalPerson
     */
    public function setCompanyName(string $companyName): LegalPerson
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * @return string
     */
    public function getTradingName(): string
    {
        return $this->tradingName;
    }

    /**
     * @param string $tradingName
     * @return LegalPerson
     */
    public function setTradingName(string $tradingName): LegalPerson
    {
        $this->tradingName = $tradingName;
        return $this;
    }

    /**
     * @return NaturalPerson|null
     */
    public function getResponsible(): ?NaturalPerson
    {
        return $this->responsible;
    }

    /**
     * @param NaturalPerson|null $responsible
     * @return LegalPerson
     */
    public function setResponsible(?NaturalPerson $responsible): LegalPerson
    {
        $this->responsible = $responsible;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPersonName(): ?string
    {
        return $this->getTradingName() ?: $this->getCompanyName();
    }

    /**
     * @return string|null
     */
    public function getPersonIdentity(): ?string
    {
        return $this->getCnpj();
    }
}
