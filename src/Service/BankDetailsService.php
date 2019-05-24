<?php

namespace Vook\Fitbank\Service;

use Vook\Fitbank\Abstracts\Service;
use Vook\Fitbank\Exceptions\FitbankErrorException;
use Vook\Fitbank\Exceptions\FitbankInternalErrorException;
use Vook\Fitbank\Request\StatementRequest;
use Vook\Fitbank\Responses\Transaction;

/**
 * Class DataBank
 * @package Vook\Fitbank\Service
 */
class BankDetailsService extends Service
{
    /**
     * @param StatementRequest $request
     * @return array
     * @throws FitbankErrorException
     * @throws FitbankInternalErrorException
     */
    public function statement(StatementRequest $request) {
        $entries = $this->connection->doRequest("GetAccountEntry", $request->toArray())['Entry'];
        $return = [];
        foreach ($entries as $entry) {
            $return[] = Transaction::hydrate($entry);
        }
        return $return;
    }

}
