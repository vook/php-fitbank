<?php

namespace Vook\Fitbank\Service;

use Vook\Fitbank\Abstracts\Service;
use Vook\Fitbank\Entities\Bill;
use Vook\Fitbank\Exceptions\FitbankErrorException;
use Vook\Fitbank\Exceptions\FitbankInternalErrorException;
use Vook\Fitbank\Responses\BillInfo;
use Vook\Fitbank\Responses\BillPayed;
use Vook\Fitbank\Responses\Cip;

/**
 * Class Payment
 * @package Vook\Fitbank\Service
 */
class Payment extends Service
{
    /**
     * @param Bill $bill
     * @return BillInfo
     * @throws FitbankErrorException
     * @throws FitbankInternalErrorException
     */
    public function readBarcode(Bill $bill)
    {
        $info = $this->connection->doRequest( "GetInfosByBarcode", [
            "Barcode"           => $bill->getBarCode(),
        ])['Infos'];
        return BillInfo::hydrate($info);
    }

    /**
     * @param Bill $bill
     * @return BillPayed
     * @throws FitbankErrorException
     * @throws FitbankInternalErrorException
     */
    public function payBill(Bill $bill)
    {
        $request = [
            "Name"              => $bill->getPayer()->getPersonName(),
            "TaxNumber"         => $bill->getPayer()->getPersonIdentity(),
            "Barcode"           => $bill->getBarCode(),
            "PrincipalValue"    => $bill->getValue(),
            "DiscountValue"     => $bill->getDiscount(),
            "ExtraValue"        => $bill->getExtra(),
            "PaymentDate"       => $bill->getPayedAt(),
            "DueDate"           => $bill->getMaturedAt(),
            "Tags"              => $bill->getTags(),
            "Description"       => $bill->getDescription(),
            "Identifier"        => $bill->getIdentifier(),
            "RateValueType"     => is_null($bill->getRate()) ? '0' : '1',
            "RateValue"         => $bill->getRate(),
            "MailToSend"        => $bill->getPayer()->getEmail(),
            "PhoneToSend"       => $bill->getPayer()->getPhone(),
        ];
        if ($bill->getFeePayer()) {
            $feePayer = $bill->getFeePayer();
            $request = array_merge($request, [
                "FeePayerTaxNumber"         => $feePayer->getPersonIdentity(),
                "FeePayerFullName"          => $feePayer->getPersonName(),
                "FeePayerMail"              => $feePayer->getEmail(),
                "FeePayerPhone"             => $feePayer->getPhone(),
                "FeePayerBank"              => $feePayer->getBank()->getBankNumber(),
                "FeePayerBankBranch"        => $feePayer->getBank()->getBranchNumber(),
                "FeePayerBankAccount"       => $feePayer->getBank()->getAccountNumber(),
                "FeePayerBankAccountDigit"  => $feePayer->getBank()->getAccountDigit(),
            ]);
        }
        if ($bill->getBeneficiary()) {
            $beneficiary = $bill->getBeneficiary();
            $request = array_merge($request, [
                "BeneficiaryTaxNumber"      => $beneficiary->getPersonIdentity(),
                "BeneficiaryName"           => $beneficiary->getPersonName(),
            ]);
        }

        if ($bill->getGuarantor()) {
            $guarantor = $bill->getGuarantor();
            $request = array_merge($request, [
                "GuarantorTaxNumber"        => $guarantor->getPersonIdentity(),
                "GuarantorName"             => $guarantor->getPersonName(),
            ]);
        }
        $response = $this->connection->doRequest("GenerateBoletoOut", $request);
        return BillPayed::hydrate($response);
    }

    /**
     * @param Bill $bill
     * @return Cip
     * @throws FitbankErrorException
     * @throws FitbankInternalErrorException
     */
    public function getInfoCIP(Bill $bill)
    {
        $response = $this->connection->doRequest("GetInfosCIPByBarcode", [
            "TaxNumber"         => $bill->getPayer()->getPersonIdentity(),
            "Barcode"           => $bill->getBarCode()
        ]);
        return Cip::hydrate($response['Infos']);
    }

    /**
     * @param Bill $bill
     * @throws FitbankErrorException
     * @throws FitbankInternalErrorException
     */
    public function cancelBillPayment(Bill $bill)
    {
        $this->connection->doRequest("CancelBoletoOut", [
            "DocumentNumber"    => $bill->getDocumentNumber(),
        ]);
    }
}
