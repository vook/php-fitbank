<?php

namespace Vook\Fitbank\Service;

use Vook\Fitbank\Abstracts\Service;
use Vook\Fitbank\Exceptions\FitbankErrorException;
use Vook\Fitbank\Exceptions\FitbankInternalErrorException;
use Vook\Fitbank\Request\CreateAccountRequest;
use Vook\Fitbank\Request\TransferInRequest;
use Vook\Fitbank\Request\TransferRequest;
use Vook\Fitbank\Responses\VerifyTransferIn;
use Vook\Fitbank\Responses\TransferOut;
use Vook\Fitbank\Responses\VerifyTransferOut;
use Vook\Fitbank\Responses\VirtualAccount;

/**
 * Class Transfer
 * @package Vook\Fitbank\Service
 */
class TransferService extends Service
{
    /**
     * @param CreateAccountRequest $request
     * @return integer
     * @throws FitbankErrorException
     * @throws FitbankInternalErrorException
     */
    public function createVirtualAccount(CreateAccountRequest $request)
    {
        return $this->connection->doRequest("CreateAccount", $request->toArray())["Identifier"];
    }

    /**
     * @param TransferInRequest $request
     * @return string
     * @throws FitbankErrorException
     * @throws FitbankInternalErrorException
     */
    public function TransferIn(TransferInRequest $request) {
        return $this->connection
            ->doRequest("MoneyTransferIn", $request->toArray(), true)['DocumentNumber'];
    }

    /**
     * @param int $documentNumber
     * @return VerifyTransferIn
     * @throws FitbankErrorException
     * @throws FitbankInternalErrorException
     */
    public function verifyTransferIn(int $documentNumber)
    {
        $response = $this->connection->doRequest("GetMoneyTransferInById", [
            "DocumentNumber"    => $documentNumber
        ]);
        return VerifyTransferIn::hydrate($response);
    }

    /**
     * @param TransferRequest $request
     * @return TransferOut
     * @throws FitbankErrorException
     * @throws FitbankInternalErrorException
     */
    public function transferOut(TransferRequest $request) {
        $response = $this->connection->doRequest("MoneyTransfer", $request->toArray());
        return TransferOut::hydrate($response);
    }

    /**
     * @param int $documentNumber
     * @throws FitbankErrorException
     * @throws FitbankInternalErrorException
     */
    public function cancelTransfer(int $documentNumber)
    {
        $this->connection->doRequest("CancelMoneyTransfer", [
            "DocumentNumber"    => $documentNumber
        ]);
    }

    /**
     * @param int $documentNumber
     * @return VerifyTransferOut
     * @throws FitbankErrorException
     * @throws FitbankInternalErrorException
     */
    public function verifyTransferOut(int $documentNumber)
    {
        $response = $this->connection->doRequest("GetMoneyTransferOutById", [
            "DocumentNumber"    => $documentNumber
        ]);
        return VerifyTransferOut::hydrate($response['Transferencia']);
    }
}
