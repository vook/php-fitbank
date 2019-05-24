<?php

namespace Vook\Fitbank\Service;

use Vook\Fitbank\Abstracts\Service;
use Vook\Fitbank\Exceptions\FitbankErrorException;
use Vook\Fitbank\Exceptions\FitbankInternalErrorException;
use Vook\Fitbank\Request\InvoiceRequest;
use Vook\Fitbank\Responses\InvoiceInfo;
use Vook\Fitbank\Responses\InvoicePayed;
use Vook\Fitbank\Responses\Cip;

/**
 * Class Payment
 * @package Vook\Fitbank\Service
 */
class PaymentService extends Service
{
    /**
     * @param string $barcode
     * @return mixed
     * @throws FitbankErrorException
     * @throws FitbankInternalErrorException
     */
    public function readBarcode(string $barcode)
    {
        $info = $this->connection->doRequest( "GetInfosByBarcode", [
            "Barcode" => $barcode,
        ])['Infos'];
        return InvoiceInfo::hydrate($info);
    }

    /**
     * @param InvoiceRequest $request
     * @return mixed
     * @throws FitbankErrorException
     * @throws FitbankInternalErrorException
     */
    public function payInvoice(InvoiceRequest $request)
    {
        $response = $this->connection->doRequest("GenerateBoletoOut", $request->toArray());
        return InvoicePayed::hydrate($response);
    }

    /**
     * @param string $taxNumber
     * @param string $barcode
     * @return mixed
     * @throws FitbankErrorException
     * @throws FitbankInternalErrorException
     */
    public function getInfoCIP(string $taxNumber, string $barcode)
    {
        $response = $this->connection->doRequest("GetInfosCIPByBarcode", [
            "TaxNumber" => $taxNumber,
            "Barcode"   => $barcode
        ]);
        return Cip::hydrate($response['Infos']);
    }

    /**
     * @param int $documentNumber
     * @throws FitbankErrorException
     * @throws FitbankInternalErrorException
     */
    public function cancelInvoicePayment(int $documentNumber)
    {
        $this->connection->doRequest("CancelBoletoOut", [
            "DocumentNumber"    => $documentNumber,
        ]);
    }
}
