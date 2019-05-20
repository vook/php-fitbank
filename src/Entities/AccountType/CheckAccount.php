<?php

namespace Vook\Fitbank\Entities\AccountType;

use Vook\Fitbank\Contracts\AccountType;

class CheckAccount implements AccountType
{
    /**
     * @return int
     */
    public function getTypeCode(): int
    {
        return 0;
    }
}
