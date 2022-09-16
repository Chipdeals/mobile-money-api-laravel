<?php

namespace Chipdeals\MomoApi\Deposit\UseCases;

use Chipdeals\MomoApi\Transaction\TransactionData;

class SendDeposit
{
    public static function exec(TransactionData $deposit, $DepositUtils)
    {
        $DepositUtils::sendDepositRequest($deposit);
    }
}
