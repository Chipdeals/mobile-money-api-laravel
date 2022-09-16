<?php

namespace Chipdeals\MomoApi\Deposit;

use Chipdeals\MomoApi\Transaction\TransactionData;

class DepositRequest
{

    private $deposit;
    private $depositUtils;

    function __construct($apiKey, $depositUtils)
    {
        $this->deposit = new TransactionData();
        $this->deposit->setApiKey($apiKey);
        $this->deposit->setIsCollection(false);
        $this->depositUtils = $depositUtils;
    }


    public function amount($amount)
    {
        $this->deposit->setOriginalAmount($amount);
        return $this;
    }
    public function currency($currency)
    {
        $this->deposit->setOriginalCurrency($currency);
        return $this;
    }
    public function to($phoneNumber)
    {
        $this->deposit->setPhoneNumber($phoneNumber);
        return $this;
    }
    public function webhook($webhook)
    {
        $this->deposit->setWebhookUrl($webhook);
        return $this;
    }
    public function create()
    {
        $depositExecution = new DepositExecution($this->deposit,  $this->depositUtils);
        return $depositExecution->start();
    }
};
