<?php

namespace Chipdeals\MomoApi\Collection;

use Chipdeals\MomoApi\Transaction\TransactionData;

class CollectionRequest
{

    private $collection;
    private $collectionUtils;

    function __construct($apiKey, $collectionUtils)
    {
        $this->collection = new TransactionData();
        $this->collection->setApiKey($apiKey);
        $this->collection->setIsCollection(true);
        $this->collectionUtils = $collectionUtils;
    }


    public function amount($amount)
    {
        $this->collection->setOriginalAmount($amount);
        return $this;
    }
    public function currency($currency)
    {
        $this->collection->setOriginalCurrency($currency);
        return $this;
    }
    public function from($phoneNumber)
    {
        $this->collection->setPhoneNumber($phoneNumber);
        return $this;
    }
    public function isWaveAccount($isWaveAccount = true)
    {
        $this->collection->setIsWaveAccount($isWaveAccount);
        return $this;
    }
    public function useOtp($otp)
    {
        $this->collection->setOtp($otp);
        return $this;
    }
    public function setFee($fee, $userSupportAllFees = false)
    {
        $this->collection->setFee($fee);
        $this->collection->setMerchantSupportFee(!$userSupportAllFees);
        return $this;
    }
    public function firstName($firstName)
    {
        $this->collection->setFirstName($firstName);
        return $this;
    }
    public function lastName($lastName)
    {
        $this->collection->setLastName($lastName);
        return $this;
    }
    public function webhook($webhook)
    {
        $this->collection->setWebhookUrl($webhook);
        return $this;
    }
    public function create()
    {
        $collectionExecution = new CollectionExecution($this->collection,  $this->collectionUtils);
        return $collectionExecution->start();
    }
};
