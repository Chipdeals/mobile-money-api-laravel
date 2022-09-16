<?php

namespace Chipdeals\MomoApi\Balance;

use Chipdeals\MomoApi\Balance\BalanceData;
use Chipdeals\MomoApi\Balance\UseCases\GetBalances;

class BalanceController
{

    public static function getBalances($apiKey, $balanceUtils)
    {
        $balanceSample = new BalanceData();
        $balanceSample->setApiKey($apiKey);
        $balances = GetBalances::exec($balanceSample, $balanceUtils);
        $balancesResponse = [];
        foreach ($balances as $key => $balance) {
            $balancesResponse[$key] = new BalanceResponse($balance);
        }
        return $balancesResponse;
    }
}
