<?php

namespace Vook\Fitbank\Responses;

use Vook\Fitbank\Abstracts\Responses;

class Transfer extends Responses
{
    protected $documentNumber;
    protected $url;
    protected $alreadyExists;

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
