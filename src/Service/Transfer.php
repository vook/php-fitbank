<?php

namespace Vook\Fitbank\Service;

use Vook\Fitbank\Abstracts\Service;
use Vook\Fitbank\Abstracts\Person;
use Vook\Fitbank\Responses\TransferIn;
use Vook\Fitbank\Responses\TransferOut;
use Vook\Fitbank\Responses\VirtualAccount;
use Vook\Fitbank\Responses\Transfer as TransferResponse;

/**
 * Class Transfer
 * @package Vook\Fitbank\Service
 */
class Transfer extends Service
{
    /**
     * @param Person $person
     * @return VirtualAccount
     * @throws \FitbankErrorException
     * @throws \FitbankInternalErrorException
     */
    public function createVirtualAccount(Person $person)
    {
        $params = [
            "Mail"              => $person->getEmail(),
            "Phone"             => $person->getPhone(),
            "Nickname"          => $person->getNickName(),
            "Name"              => $person->getPersonName(),
            "TaxNumber"         => $person->getPersonIdentity(),
        ];
        if ($person->getBank()) {
            $bank = $person->getBank();
            $params = array_merge($params, [
                "Bank" =>               $bank->getBankNumber(),
                "BankBranch" =>         $bank->getBranchNumber(),
                "BankAccount" =>        $bank->getAccountNumber(),
                "BankAccountDigit" =>   $bank->getAccountDigit()
            ]);
        }
        $response = $this->connection->doRequest("CreateAccount", $params);
        return VirtualAccount::hydrate($response);
    }

    /**
     * @param Person $person
     * @param int $value
     * @param int $rate
     * @param \DateTime $transferredAt
     * @param array $products
     * @return TransferIn
     * @throws \FitbankErrorException
     * @throws \FitbankInternalErrorException
     */
    public function TransferIn(
        Person $person,
        int $value,
        int $rate,
        \DateTime $transferredAt,
        array $products = []
    ) {
        $params = [
            "TotalValue"            => $value,
            "RateValue"             => $rate,
            "TransferDate"          => $transferredAt->format('Y/m/d'),
            /* Pessoa */
            "SupplierName"          => $person->getPersonName(),
            "SupplierTaxNumber"     => $person->getPersonIdentity(),
            "SupplierTradingName"   => $person->getPersonName(),
            "SupplierMail"          => $person->getEmail(),
            "SupplierPhone"         => $person->getPhone(),
            /* Banco */
            "BankNumber"            => $person->getBank()->getBankNumber(),
            "BankBranch"            => $person->getBank()->getBranchNumber(),
            "BankAccount"           => $person->getBank()->getAccountNumber(),
            "Products"              => [],
        ];
        foreach ($products as $product) {
            $params['Products'][] = [
                "ReceiverName"      => $product->getReceiver()->getPersonName(),
                "ReceiverTaxNumber" => $product->getReceiver()->getPersonIdentity(),
                "Bank"              => $product->getReceiver()->getBank()->getBankNumber(),
                "BankBranch"        => $product->getReceiver()->getBank()->getBranchNumber(),
                "BankAccount"       => $product->getReceiver()->getBank()->getAccountNumber(),
                "BankAccountDigit"  => $product->getReceiver()->getBank()->getAccountDigit(),
                "AccountType"       => $product->getReceiver()->getBank()->getAccountType()->getTypeCode(),
                "ProductCode"       => $product->getCode(),
                "ProductName"       => $product->getName(),
                "ProductValue"      => $product->getValue(),
                "RateValue"         => $product->getRate(),
                "IsAutomatic"       => $product->isAutomatic()
            ];
        }
        $response = $this->connection->doRequest("MoneyTransferIn", $params, true);
        return TransferIn::hydrate($response);
    }

    /**
     * @param int $documentNumber
     * @return TransferIn
     * @throws \FitbankErrorException
     * @throws \FitbankInternalErrorException
     */
    public function verifyTransferIn(int $documentNumber)
    {
        $response = $this->connection->doRequest([
            "DocumentNumber"    => $documentNumber
        ]);
        return TransferIn::hydrate("GetMoneyTransferInById", $response);
    }

    /**
     * @param Person $from
     * @param Person $to
     * @param Person $feePayer
     * @param int $value
     * @param int $rate
     * @param int $rateType
     * @param string $description
     * @param \DateTime $payedAt
     * @param array|null $tags
     * @return TransferResponse
     * @throws \FitbankErrorException
     * @throws \FitbankInternalErrorException
     */
    public function transfer(
        Person $from,
        Person $to,
        Person $feePayer,
        int $value,
        int $rate,
        int $rateType,
        string $description,
        \DateTime $payedAt,
        ?array $tags = []
    ) {
        $response = $this->connection->doRequest("MoneyTransfer", [
            "FromTaxNumber"             => $from->getPersonIdentity(),
            "FromBank"                  => $from->getBank()->getBankNumber(),
            "FromBankBranch"            => $from->getBank()->getBranchNumber(),
            "FromBankAccount"           => $from->getBank()->getAccountNumber(),
            "FromBankAccountDigit"      => $from->getBank()->getAccountDigit(),
            "ToTaxNumber"               => $to->getPersonIdentity(),
            "ToName"                    => $to->getPersonName(),
            "Bank"                      => $to->getBank()->getBankNumber(),
            "BankBranch"                => $to->getBank()->getBranchNumber(),
            "BankAccount"               => $to->getBank()->getAccountNumber(),
            "BankAccountDigit"          => $to->getBank()->getAccountDigit(),
            "AccountType"               => $to->getBank()->getAccountType()->getTypeCode(),
            "Value"                     => $value,
            "RateValue"                 => $rate,
            "Identifier"                => $to->getIdentifier(),
            "RateValueType"             => $rateType,
            "Tags"                      => $tags,
            "Description"               => $description,
            "PaymentDate"               => $payedAt->format('Y/m/d'),
            "FeePayerTaxNumber"         => $feePayer->getPersonIdentity(),
            "FeePayerFullName"          => $feePayer->getPersonName(),
            "FeePayerMail"              => $feePayer->getEmail(),
            "FeePayerPhone"             => $feePayer->getPhone(),
            "FeePayerBank"              => $feePayer->getBank()->getBankNumber(),
            "FeePayerBankBranch"        => $feePayer->getBank()->getBranchNumber(),
            "FeePayerBankAccount"       => $feePayer->getBank()->getAccountNumber(),
            "FeePayerBankAccountDigit"  => $feePayer->getBank()->getAccountDigit()
        ]);
        return TransferResponse::hydrate($response);
    }

    /**
     * @param int $documentNumber
     * @throws \FitbankErrorException
     * @throws \FitbankInternalErrorException
     */
    public function cancelTransfer(int $documentNumber)
    {
        $this->connection->doRequest("CancelMoneyTransfer", [
            "PartnerId"         => $this->partnerId,
            "BusinessUnitId"    => $this->businessUnitId,
            "DocumentNumber"    => $documentNumber
        ]);
    }

    /**
     * @param int $documentNumber
     * @return TransferOut
     * @throws \FitbankErrorException
     * @throws \FitbankInternalErrorException
     */
    public function verifyTransferOut(int $documentNumber)
    {
        $response = $this->connection->doRequest("GetMoneyTransferOutById", [
            "DocumentNumber"    => $documentNumber
        ]);
        return TransferOut::hydrate($response['Transferencia']);
    }
}
