<?php

namespace Vook\Fitbank\Responses;

use Vook\Fitbank\Abstracts\Responses;

/**
 * Class InvoicePayed
 * @package Vook\Fitbank\Responses
 */
class InvoicePayed extends Responses
{
    protected $entryId;
    protected $documentNumber;
    protected $url;
    protected $alreadyExists;

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
    public function getDocumentNumber()
    {
        return $this->documentNumber;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getAlreadyExists()
    {
        return $this->alreadyExists;
    }
    
}
