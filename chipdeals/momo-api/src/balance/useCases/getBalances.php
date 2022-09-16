<?php

namespace Chipdeals\MomoApi\Balance\UseCases;

use Chipdeals\MomoApi\Balance\BalanceData;

class GetBalances
{
    public static function exec(BalanceData $balance, $BalanceUtils)
    {
        return  $BalanceUtils::getBalances($balance);
    }
}
