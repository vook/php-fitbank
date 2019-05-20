<?php

namespace Vook\Fitbank\Responses;

use Vook\Fitbank\Abstracts\Responses;

/**
 * Class Transaction
 * @package Vook\Fitbank\Entities
 */
class Transaction extends Responses
{
    protected $internalIdentifier;
    protected $entryId;
    protected $description;
    protected $subType;
    protected $entryDate;
    protected $entryValue;
    protected $type;
    protected $usedGuaranteed;
    protected $details;
    protected $receiptUrl;
    protected $bankDetails;
    protected $documentNumber;
    protected $transactionId;
    protected $bank;
    protected $bankBranch;
    protected $bankAccount;
    protected $bankAccountDigital;
    protected $operationId;
    protected $noteId;
    protected $noteEntry;
    protected $operationType;
    protected $manualEntryCategory;
    protected $receiptFileName;
    protected $tags;

    /**
     * @return mixed
     */
    public function getInternalIdentifier()
    {
        return $this->internalIdentifier;
    }

    /**
     * @return mixed
     */
    public function getEntryId()
    {
        return $this->entryId;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getSubType()
    {
        return $this->subType;
    }

    /**
     * @return mixed
     */
    public function getEntryDate()
    {
        return $this->entryDate;
    }

    /**
     * @return mixed
     */
    public function getEntryValue()
    {
        return $this->entryValue;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getUsedGuaranteed()
    {
        return $this->usedGuaranteed;
    }

    /**
     * @return mixed
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @return mixed
     */
    public function getReceiptUrl()
    {
        return $this->receiptUrl;
    }

    /**
     * @return mixed
     */
    public function getBankDetails()
    {
        return $this->bankDetails;
    }

    /**
     * @return mixed
     */
    public function getDocumentNumber()
    {
        return $this->documentNumber;
    }

    /**
     * @return mixed
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @return mixed
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * @return mixed
     */
    public function getBankBranch()
    {
        return $this->bankBranch;
    }

    /**
     * @return mixed
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * @return mixed
     */
    public function getBankAccountDigital()
    {
        return $this->bankAccountDigital;
    }

    /**
     * @return mixed
     */
    public function getOperationId()
    {
        return $this->operationId;
    }

    /**
     * @return mixed
     */
    public function getNoteId()
    {
        return $this->noteId;
    }

    /**
     * @return mixed
     */
    public function getNoteEntry()
    {
        return $this->noteEntry;
    }

    /**
     * @return mixed
     */
    public function getOperationType()
    {
        return $this->operationType;
    }

    /**
     * @return mixed
     */
    public function getManualEntryCategory()
    {
        return $this->manualEntryCategory;
    }

    /**
     * @return mixed
     */
    public function getReceiptFileName()
    {
        return $this->receiptFileName;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }
}
