<?php

namespace Chipdeals\MomoApi\Transaction;

class TransactionData
{
    private $reference = "";
    private $merchantOrderId = "";
    private $phoneNumber = "";
    private $countryCode = "";
    private $operator = "";
    private $firstName = "";
    private $lastName = "";
    private $originalCurrency = "";
    private $originalAmount = "";
    private $currency = "";
    private $amount = "";
    private $status = "";
    private $statusMessage = "";
    private $statusCode = "";
    private $startTimestampInSecond = "";
    private $endTimestampInSecond = "";
    private $webhookUrl = "";
    private $apiKey = "";
    private $operatorReference = "";
    private $isCollection = false;
    private $isWaveAccount = false;
    private $otp = "";
    private $fee = false;
    private $merchantSupportFee = true;
    private $paymentLink = "";

    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function setMerchantOrderId($merchantOrderId)
    {
        $this->merchantOrderId = $merchantOrderId;
        return $this;
    }

    public function getMerchantOrderId()
    {
        return $this->merchantOrderId;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

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

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setOriginalCurrency($originalCurrency)
    {
        $this->originalCurrency = $originalCurrency;
        return $this;
    }

    public function getOriginalCurrency()
    {
        return $this->originalCurrency;
    }

    public function setOriginalAmount($originalAmount)
    {
        $this->originalAmount = $originalAmount;
        return $this;
    }

    public function getOriginalAmount()
    {
        return $this->originalAmount;
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

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatusMessage($statusMessage)
    {
        $this->statusMessage = $statusMessage;
        return $this;
    }

    public function getStatusMessage()
    {
        return $this->statusMessage;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStartTimestampInSecond($startTimestampInSecond)
    {
        $this->startTimestampInSecond = $startTimestampInSecond;
        return $this;
    }

    public function getStartTimestampInSecond()
    {
        return $this->startTimestampInSecond;
    }

    public function setEndTimestampInSecond($endTimestampInSecond)
    {
        $this->endTimestampInSecond = $endTimestampInSecond;
        return $this;
    }

    public function getEndTimestampInSecond()
    {
        return $this->endTimestampInSecond;
    }

    public function setWebhookUrl($webhookUrl)
    {
        $this->webhookUrl = $webhookUrl;
        return $this;
    }

    public function getWebhookUrl()
    {
        return $this->webhookUrl;
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

    public function setOperatorReference($operatorReference)
    {
        $this->operatorReference = $operatorReference;
        return $this;
    }

    public function getOperatorReference()
    {
        return $this->operatorReference;
    }

    public function setIsCollection($isCollection)
    {
        $this->isCollection = $isCollection;
        return $this;
    }

    public function getIsCollection()
    {
        return $this->isCollection;
    }

    public function setIsWaveAccount($isWaveAccount)
    {
        $this->isWaveAccount = $isWaveAccount;
        return $this;
    }

    public function getIsWaveAccount()
    {
        return $this->isWaveAccount;
    }

    public function setOtp($otp)
    {
        $this->otp = $otp;
        return $this;
    }

    public function getOtp()
    {
        return $this->otp;
    }

    public function setFee($fee)
    {
        $this->fee = $fee;
        return $this;
    }

    public function getFee()
    {
        return $this->fee;
    }

    public function setMerchantSupportFee($merchantSupportFee)
    {
        $this->merchantSupportFee = $merchantSupportFee;
        return $this;
    }

    public function getMerchantSupportFee()
    {
        return $this->merchantSupportFee;
    }

    public function setPaymentLink($paymentLink)
    {
        $this->paymentLink = $paymentLink;
        return $this;
    }

    public function getPaymentLink()
    {
        return $this->paymentLink;
    }

    public function getArray()
    {
        return [
            "reference" => $this->reference,
            "merchantOrderId" => $this->merchantOrderId,
            "phoneNumber" => $this->phoneNumber,
            "countryCode" => $this->countryCode,
            "operator" => $this->operator,
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "originalCurrency" => $this->originalCurrency,
            "originalAmount" => $this->originalAmount,
            "currency" => $this->currency,
            "amount" => $this->amount,
            "status" => $this->status,
            "statusMessage" => $this->statusMessage,
            "statusCode" => $this->statusCode,
            "startTimestampInSecond" => $this->startTimestampInSecond,
            "endTimestampInSecond" => $this->endTimestampInSecond,
            "webhookUrl" => $this->webhookUrl,
            "apiKey" => $this->apiKey,
            "isCollection" => $this->isCollection,
            "isWaveAccount" => $this->isWaveAccount,
            "fee" => $this->fee,
            "operatorReference" => $this->operatorReference,
            "merchantSupportFee" => $this->merchantSupportFee,
            "paymentLink" => $this->paymentLink,
        ];
    }
};
