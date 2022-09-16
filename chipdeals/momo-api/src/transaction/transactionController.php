<?php

namespace Chipdeals\MomoApi\Transaction;

use Chipdeals\MomoApi\Transaction\TransactionData;
use Chipdeals\MomoApi\Transaction\UseCases\GetStatus;

class TransactionController
{

    public static function getStatus($transactionReference, $apiKey, $transactionUtils)
    {
        $transaction = new TransactionData();
        $transaction->setReference($transactionReference);
        $transaction->setApiKey($apiKey);
        return GetStatus::exec($transaction, $transactionUtils);
    }
}
