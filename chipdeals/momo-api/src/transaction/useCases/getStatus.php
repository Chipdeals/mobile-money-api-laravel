<?php

namespace Chipdeals\MomoApi\Transaction\UseCases;

use Chipdeals\MomoApi\Transaction\TransactionData;
use Chipdeals\MomoApi\Transaction\TransactionResponse;

class GetStatus
{
    public static function exec(TransactionData $transaction, $TransactionUtils)
    {
        $TransactionUtils::checkTransactionStatus($transaction);
        return new TransactionResponse($transaction);
    }
}
