<?php

namespace Vook\Fitbank\Service;

use Vook\Fitbank\Abstracts\Service;
use Vook\Fitbank\Abstracts\Person;
use Vook\Fitbank\Exceptions\FitbankErrorException;
use Vook\Fitbank\Exceptions\FitbankInternalErrorException;
use Vook\Fitbank\Responses\Transaction;

/**
 * Class DataBank
 * @package Vook\Fitbank\Service
 */
class DataBank extends Service
{
    /**
     * @param Person $person
     * @param \DateTime $startedAt
     * @param \DateTime $finishedAt
     * @param array $tags
     * @param bool $withBank
     * @return array
     * @throws FitbankErrorException
     * @throws FitbankInternalErrorException
     */
    public function statement(
        Person $person,
        \DateTime $startedAt,
        \DateTime $finishedAt,
        array $tags = [],
        bool $withBank = false
    ) {
        $request = [
            "TaxNumber"         => $person->getPersonIdentity(),
            "StartDate"         => $startedAt,
            "EndDate"           => $finishedAt,
            "Tags"              => $tags
        ];

        if ($withBank) {
            $request = array_merge($request, [
                "Bank"              => $person->getBank()->getBankNumber(),
                "BankBranch"        => $person->getBank()->getBankNumber(),
                "BankAccount"       => $person->getBank()->getAccountNumber(),
                "BankAccountDigit"  => $person->getBank()->getAccountDigit(),
            ]);
        }
        $entries = $this->connection->doRequest("GetAccountEntry", $request)['Entry'];
        $return = [];
        foreach ($entries as $entry) {
            $return[] = Transaction::hydrate($entry);
        }
        return $return;
    }

}
