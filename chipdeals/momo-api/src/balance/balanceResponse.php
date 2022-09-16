<?php

namespace Chipdeals\MomoApi\Balance;

class BalanceResponse
{
    private $balance;

    function __construct(BalanceData $balance)
    {
        $this->balance = $balance;
    }

    public function getCountryCode()
    {
        return $this->balance->getCountryCode();
    }

    public function getOperator()
    {
        return $this->balance->getOperator();
    }

    public function getCurrency()
    {
        return $this->balance->getCurrency();
    }

    public function getAmount()
    {
        return $this->balance->getAmount();
    }

    public function getArray()
    {
        return [
            "currency" => $this->balance->getCurrency(),
            "operator" => $this->balance->getOperator(),
            "currency" => $this->balance->getCurrency(),
            "amount" => $this->balance->getAmount(),
        ];
    }
};
