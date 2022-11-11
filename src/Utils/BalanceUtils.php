<?php

namespace Chipdeals\MomoApi\Utils;

use Chipdeals\MomoApi\Balance\BalanceData;

class BalanceUtils
{
    static public function getBalances(BalanceData $balance)
    {
        $url = "https://apis.chipdeals.me/momo/balance?apikey=";
        $url .= $balance->getApiKey();
        $response = Network::sendGetRequest($url);
        $balances = BalanceUtils::buildBalances($response);
        return $balances;
    }


    static private function buildBalances($response)
    {
        $balancesFound = isset($response["data"]->balances[0]);
        if (!$balancesFound) return [];

        $balances = [];
        foreach ($response["data"]->balances as $key => $balanceInfo) {
            $balance = new BalanceData();
            $balance->setCountryCode($balanceInfo->countryCode);
            $balance->setCurrency($balanceInfo->currency);
            $balance->setOperator($balanceInfo->operator);
            $balance->setAmount($balanceInfo->amount);
            $balances[$key] = $balance;
        }
        return $balances;
    }
}
