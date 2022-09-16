<?php

namespace Chipdeals\MomoApi;

use Chipdeals\MomoApi\Balance\BalanceController;
use Chipdeals\MomoApi\Collection\CollectionRequest;
use Chipdeals\MomoApi\Deposit\DepositRequest;
use Chipdeals\MomoApi\Transaction\TransactionController;
use Chipdeals\MomoApi\Utils\BalanceUtils;
use Chipdeals\MomoApi\Utils\CollectionUtils;
use Chipdeals\MomoApi\Utils\DepositUtils;
use Chipdeals\MomoApi\Utils\TransactionUtils;

class Momo
{
    private $apiKey = "";

    function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function collect()
    {
        return new CollectionRequest($this->apiKey, CollectionUtils::class);
    }

    public function deposit()
    {
        return new DepositRequest($this->apiKey, DepositUtils::class);
    }

    public function getStatus($reference)
    {
        return TransactionController::getStatus($reference, $this->apiKey, TransactionUtils::class);
    }

    public function getBalances()
    {
        return BalanceController::getBalances($this->apiKey, BalanceUtils::class);
    }

    public function parseWebhookData($requestBody)
    {
        return TransactionUtils::parseWebhookData($requestBody);
    }
}

// invio
// <meta>
// 20k lib : php jas nodejs fmPhp woo word sshopi 