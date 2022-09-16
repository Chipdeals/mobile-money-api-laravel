<?php

namespace Chipdeals\MomoApi\Deposit;

use Chipdeals\MomoApi\Deposit\UseCases\SendDeposit;
use Chipdeals\MomoApi\Transaction\TransactionData;

class DepositController
{

    public static function sendDeposit(TransactionData $deposit, $depositUtils)
    {
        SendDeposit::exec($deposit, $depositUtils);
    }
}
