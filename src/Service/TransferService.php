<?php

namespace Vook\Fitbank\Service;

use Vook\Fitbank\Abstracts\Service;
use Vook\Fitbank\Exceptions\FitbankErrorException;
use Vook\Fitbank\Exceptions\FitbankInternalErrorException;
use Vook\Fitbank\Request\CreateAccountRequest;
use Vook\Fitbank\Request\TransferInRequest;
use Vook\Fitbank\Request\TransferRequest;
use Vook\Fitbank\Responses\TransferIn;
use Vook\Fitbank\Responses\TransferOut;
use Vook\Fitbank\Responses\VirtualAccount;
use Vook\Fitbank\Responses\Transfer as TransferResponse;

/**
 * Class Transfer
 * @package Vook\Fitbank\Service
 */
class TransferService extends Service
{
    /**
     * @param CreateAccountRequest $request
     * @return mixed
     * @throws FitbankErrorException
     * @throws FitbankInternalErrorException
     */
    public function createVirtualAccount(CreateAccountRequest $request)
    {
        $response = $this->connection->doRequest("CreateAccount", $request->toArray());
        return VirtualAccount::hydrate($response);
    }

    /**
     * @param TransferInRequest $request
     * @return mixed
     * @throws FitbankErrorException
     * @throws FitbankInternalErrorException
     */
    public function TransferIn(TransferInRequest $request) {
        $response = $this->connection->doRequest("MoneyTransferIn", $request->toArray(), true);
        return TransferIn::hydrate($response);
    }

    /**
     * @param int $documentNumber
     * @return TransferIn
     * @throws FitbankErrorException
     * @throws FitbankInternalErrorException
     */
    public function verifyTransferIn(int $documentNumber)
    {
        $response = $this->connection->doRequest("GetMoneyTransferInById", [
            "DocumentNumber"    => $documentNumber
        ]);
        return TransferIn::hydrate($response);
    }

    /**
     * @param TransferRequest $request
     * @return mixed
     * @throws FitbankErrorException
     * @throws FitbankInternalErrorException
     */
    public function transfer(TransferRequest $request) {
        $response = $this->connection->doRequest("MoneyTransfer", $request->toArray());
        return TransferResponse::hydrate($response);
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
     * @return TransferOut
     * @throws FitbankErrorException
     * @throws FitbankInternalErrorException
     */
    public function verifyTransferOut(int $documentNumber)
    {
        $response = $this->connection->doRequest("GetMoneyTransferOutById", [
            "DocumentNumber"    => $documentNumber
        ]);
        return TransferOut::hydrate($response['Transferencia']);
    }
}
