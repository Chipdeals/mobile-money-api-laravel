<?php

namespace Chipdeals\MomoApi\Transaction;

class TransactionResponse
{
    private $transaction;

    function __construct(TransactionData $transaction)
    {
        $this->transaction = $transaction;
    }

    public function getReference()
    {
        return $this->transaction->getReference();
    }

    public function getPhoneNumber()
    {
        return $this->transaction->getPhoneNumber();
    }

    public function getCountryCode()
    {
        return $this->transaction->getCountryCode();
    }

    public function getOperator()
    {
        return $this->transaction->getOperator();
    }

    public function getFirstName()
    {
        return $this->transaction->getFirstName();
    }

    public function getLastName()
    {
        return $this->transaction->getLastName();
    }

    public function getOriginalCurrency()
    {
        return $this->transaction->getOriginalCurrency();
    }

    public function getOriginalAmount()
    {
        return $this->transaction->getOriginalAmount();
    }

    public function getCurrency()
    {
        return $this->transaction->getCurrency();
    }

    public function getAmount()
    {
        return $this->transaction->getAmount();
    }

    public function getStatus()
    {
        return $this->transaction->getStatus();
    }

    public function getStatusMessage()
    {
        return $this->transaction->getStatusMessage();
    }

    public function getStatusCode()
    {
        return $this->transaction->getStatusCode();
    }

    public function getStartTimestampInSecond()
    {
        return $this->transaction->getStartTimestampInSecond();
    }

    public function getEndTimestampInSecond()
    {
        return $this->transaction->getEndTimestampInSecond();
    }

    public function checkIsCollection()
    {
        return $this->transaction->getIsCollection();
    }

    public function getOperatorReference()
    {
        return $this->transaction->getOperatorReference();
    }

    public function getArray()
    {
        return [
            "reference" => $this->transaction->getReference(),
            "phoneNumber" => $this->transaction->getPhoneNumber(),
            "currency" => $this->transaction->getCurrency(),
            "operator" => $this->transaction->getOperator(),
            "firstName" => $this->transaction->getFirstName(),
            "lastName" => $this->transaction->getLastName(),
            "originalCurrency" => $this->transaction->getOriginalCurrency(),
            "originalAmount" => $this->transaction->getOriginalAmount(),
            "currency" => $this->transaction->getCurrency(),
            "amount" => $this->transaction->getAmount(),
            "status" => $this->transaction->getStatus(),
            "statusMessage" => $this->transaction->getStatusMessage(),
            "statusCode" => $this->transaction->getStatusCode(),
            "startTimestampInSecond" => $this->transaction->getStartTimestampInSecond(),
            "endTimestampInSecond" => $this->transaction->getEndTimestampInSecond(),
            "operatorReference" => $this->transaction->getOperatorReference(),
            "isCollection" => $this->transaction->getIsCollection(),
        ];
    }
};
