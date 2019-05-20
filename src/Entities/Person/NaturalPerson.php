<?php

namespace Vook\Fitbank\Entities\Person;

use Vook\Fitbank\Abstracts\Person;

/**
 * Class NaturalPerson
 * @package Vook\Fitbank\Entities\Person
 */
class NaturalPerson extends Person
{
    /**
     * @var string
     */
    private $cpf;

    /**
     * @var string
     */
    private $name;

    /**
     * @return string
     */
    public function getCpf(): string
    {
        return $this->cpf;
    }

    /**
     * @param string $cpf
     * @return NaturalPerson
     */
    public function setCpf(string $cpf): NaturalPerson
    {
        $this->cpf = $cpf;
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
     * @return NaturalPerson
     */
    public function setName(string $name): NaturalPerson
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPersonName(): ?string
    {
        return $this->getName();
    }

    /**
     * @return string|null
     */
    public function getPersonIdentity(): ?string
    {
        return $this->getCpf();
    }
}
