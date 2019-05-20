<?php

namespace Vook\Fitbank\Responses;

use Vook\Fitbank\Abstracts\Responses;

class Cip extends Responses
{
    protected $drawer;
    protected $taxNumberDrawee;
    protected $draweeName;
    protected $beneficiaryName;
    protected $taxNumberBeneficiary;
    protected $paymentDate;
    protected $dateDueRegistration;
    protected $dueDate;
    protected $settlementDate;
    protected $digitableLine;
    protected $discountValue;
    protected $interestValue;
    protected $maxPaymentValue;
    protected $minPaymentValue;
    protected $fineValue;
    protected $nominalValue;
    protected $updatedValue;
    protected $totalRebateValue;
    protected $totalAddedValue;
    protected $value;
    protected $maxValue;
    protected $minValue;
    protected $nextSettlement;
    protected $paymentWasMade;

    /**
     * @return mixed
     */
    public function getDrawer()
    {
        return $this->drawer;
    }

    /**
     * @return mixed
     */
    public function getTaxNumberDrawee()
    {
        return $this->taxNumberDrawee;
    }

    /**
     * @return mixed
     */
    public function getDraweeName()
    {
        return $this->draweeName;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryName()
    {
        return $this->beneficiaryName;
    }

    /**
     * @return mixed
     */
    public function getTaxNumberBeneficiary()
    {
        return $this->taxNumberBeneficiary;
    }

    /**
     * @return mixed
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * @return mixed
     */
    public function getDateDueRegistration()
    {
        return $this->dateDueRegistration;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @return mixed
     */
    public function getSettlementDate()
    {
        return $this->settlementDate;
    }

    /**
     * @return mixed
     */
    public function getDigitableLine()
    {
        return $this->digitableLine;
    }

    /**
     * @return mixed
     */
    public function getDiscountValue()
    {
        return $this->discountValue;
    }

    /**
     * @return mixed
     */
    public function getInterestValue()
    {
        return $this->interestValue;
    }

    /**
     * @return mixed
     */
    public function getMaxPaymentValue()
    {
        return $this->maxPaymentValue;
    }

    /**
     * @return mixed
     */
    public function getMinPaymentValue()
    {
        return $this->minPaymentValue;
    }

    /**
     * @return mixed
     */
    public function getFineValue()
    {
        return $this->fineValue;
    }

    /**
     * @return mixed
     */
    public function getNominalValue()
    {
        return $this->nominalValue;
    }

    /**
     * @return mixed
     */
    public function getUpdatedValue()
    {
        return $this->updatedValue;
    }

    /**
     * @return mixed
     */
    public function getTotalRebateValue()
    {
        return $this->totalRebateValue;
    }

    /**
     * @return mixed
     */
    public function getTotalAddedValue()
    {
        return $this->totalAddedValue;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return mixed
     */
    public function getMaxValue()
    {
        return $this->maxValue;
    }

    /**
     * @return mixed
     */
    public function getMinValue()
    {
        return $this->minValue;
    }

    /**
     * @return mixed
     */
    public function getNextSettlement()
    {
        return $this->nextSettlement;
    }

    /**
     * @return mixed
     */
    public function getPaymentWasMade()
    {
        return $this->paymentWasMade;
    }
}
