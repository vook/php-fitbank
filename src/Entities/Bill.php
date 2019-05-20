<?php

namespace Vook\Fitbank\Entities;

use Vook\Fitbank\Abstracts\Person;
use Vook\Fitbank\Contracts\EntityContract;

class Bill implements EntityContract
{
    /**
     * @var int
     */
    private $template;

    /**
     * @var int
     */
    private $documentNumber;

    /**
     * @var string
     */
    private $barCode;

    /**
     * @var string
     */
    private $digitableLine;

    /**
     * @var int
     */
    private $value;

    /**
     * @var float|null
     */
    private $rate;

    /**
     * @var int|null
     */
    private $discount;

    /**
     * @var int|null
     */
    private $extra;

    /**
     * @var \DateTime
     */
    private $maturedAt;

    /**
     * @var \DateTime|null
     */
    private $payedAt;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $identifier;

    /**
     * @var string
     */
    private $code;

    /**
     * @var array
     */
    private $tags = [];

    /**
     * @var Product[]
     */
    private $products = [];

    /**
     * @var Person
     */
    private $payer;

    /**
     * @var Person|null
     */
    private $beneficiary;

    /**
     * @var Person|null
     */
    private $supplier;

    /**
     * @var Person|null
     */
    private $feePayer;

    /**
     * @var Person|null
     */
    private $guarantor;

    /**
     * @var string
     */
    private $url;

    /**
     * @var int
     */
    private $entryId;

    /**
     * @var bool
     */
    private $alreadyExists;

    /**
     * @return int
     */
    public function getTemplate(): int
    {
        return $this->template;
    }

    /**
     * @param int $template
     * @return Bill
     */
    public function setTemplate(int $template): Bill
    {
        $this->template = $template;
        return $this;
    }

    /**
     * @return int
     */
    public function getDocumentNumber(): int
    {
        return $this->documentNumber;
    }

    /**
     * @param int $documentNumber
     * @return Bill
     */
    public function setDocumentNumber(int $documentNumber): Bill
    {
        $this->documentNumber = $documentNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getBarCode(): string
    {
        return $this->barCode;
    }

    /**
     * @param string $barCode
     * @return Bill
     */
    public function setBarCode(string $barCode): Bill
    {
        $this->barCode = $barCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getDigitableLine(): string
    {
        return $this->digitableLine;
    }

    /**
     * @param string $digitableLine
     * @return Bill
     */
    public function setDigitableLine(string $digitableLine): Bill
    {
        $this->digitableLine = $digitableLine;
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
     * @return Bill
     */
    public function setValue(int $value): Bill
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getRate(): ?float
    {
        return $this->rate;
    }

    /**
     * @param float|null $rate
     * @return Bill
     */
    public function setRate(?float $rate): Bill
    {
        $this->rate = $rate;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDiscount(): ?int
    {
        return $this->discount;
    }

    /**
     * @param int|null $discount
     * @return Bill
     */
    public function setDiscount(?int $discount): Bill
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getExtra(): ?int
    {
        return $this->extra;
    }

    /**
     * @param int|null $extra
     * @return Bill
     */
    public function setExtra(?int $extra): Bill
    {
        $this->extra = $extra;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getMaturedAt(): \DateTime
    {
        return $this->maturedAt;
    }

    /**
     * @param \DateTime $maturedAt
     * @return Bill
     */
    public function setMaturedAt(\DateTime $maturedAt): Bill
    {
        $this->maturedAt = $maturedAt;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getPayedAt(): ?\DateTime
    {
        return $this->payedAt;
    }

    /**
     * @param \DateTime|null $payedAt
     * @return Bill
     */
    public function setPayedAt(?\DateTime $payedAt): Bill
    {
        $this->payedAt = $payedAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Bill
     */
    public function setDescription(string $description): Bill
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * @param string $identifier
     * @return Bill
     */
    public function setIdentifier(string $identifier): Bill
    {
        $this->identifier = $identifier;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Bill
     */
    public function setCode(string $code): Bill
    {
        $this->code = $code;
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
     * @return Bill
     */
    public function setTags(array $tags): Bill
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return Product[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param Product[] $products
     * @return Bill
     */
    public function setProducts(array $products): Bill
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @return Person
     */
    public function getPayer(): Person
    {
        return $this->payer;
    }

    /**
     * @param Person $payer
     * @return Bill
     */
    public function setPayer(Person $payer): Bill
    {
        $this->payer = $payer;
        return $this;
    }

    /**
     * @return Person|null
     */
    public function getBeneficiary(): ?Person
    {
        return $this->beneficiary;
    }

    /**
     * @param Person|null $beneficiary
     * @return Bill
     */
    public function setBeneficiary(?Person $beneficiary): Bill
    {
        $this->beneficiary = $beneficiary;
        return $this;
    }

    /**
     * @return Person|null
     */
    public function getSupplier(): ?Person
    {
        return $this->supplier;
    }

    /**
     * @param Person|null $supplier
     * @return Bill
     */
    public function setSupplier(?Person $supplier): Bill
    {
        $this->supplier = $supplier;
        return $this;
    }

    /**
     * @return Person|null
     */
    public function getFeePayer(): ?Person
    {
        return $this->feePayer;
    }

    /**
     * @param Person|null $feePayer
     * @return Bill
     */
    public function setFeePayer(?Person $feePayer): Bill
    {
        $this->feePayer = $feePayer;
        return $this;
    }

    /**
     * @return Person|null
     */
    public function getGuarantor(): ?Person
    {
        return $this->guarantor;
    }

    /**
     * @param Person|null $guarantor
     * @return Bill
     */
    public function setGuarantor(?Person $guarantor): Bill
    {
        $this->guarantor = $guarantor;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Bill
     */
    public function setUrl(string $url): Bill
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return int
     */
    public function getEntryId(): int
    {
        return $this->entryId;
    }

    /**
     * @param int $entryId
     * @return Bill
     */
    public function setEntryId(int $entryId): Bill
    {
        $this->entryId = $entryId;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAlreadyExists(): bool
    {
        return $this->alreadyExists;
    }

    /**
     * @param bool $alreadyExists
     * @return Bill
     */
    public function setAlreadyExists(bool $alreadyExists): Bill
    {
        $this->alreadyExists = $alreadyExists;
        return $this;
    }
}
