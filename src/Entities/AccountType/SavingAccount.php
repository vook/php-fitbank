<?php

namespace Vook\Fitbank\Entities\AccountType;

use Vook\Fitbank\Contracts\AccountType;

class SavingAccount implements AccountType
{
    /**
     * @return int
     */
    public function getTypeCode(): int
    {
        return 1;
    }
}
