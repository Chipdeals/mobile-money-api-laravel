<?php

namespace Chipdeals\MomoApi\Balance;

class BalanceData
{
    private $countryCode = "";
    private $operator = "";
    private $currency = "";
    private $amount = "";
    private $apiKey = "";

    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    public function getCountryCode()
    {
        return $this->countryCode;
    }

    public function setOperator($operator)
    {
        $this->operator = $operator;
        return $this;
    }

    public function getOperator()
    {
        return $this->operator;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }


    public function getArray()
    {
        return [
            "countryCode" => $this->countryCode,
            "operator" => $this->operator,
            "currency" => $this->currency,
            "amount" => $this->amount,
            "apiKey" => $this->apiKey,
        ];
    }
};
