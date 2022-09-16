<?php

namespace Chipdeals\MomoApi\Deposit;

use Chipdeals\MomoApi\Transaction\TransactionData;
use Chipdeals\MomoApi\Transaction\TransactionResponse;

class DepositExecution
{

    private $deposit;
    private $depositUtils;

    function __construct(TransactionData $deposit, $depositUtils)
    {
        $this->deposit = $deposit;
        $this->depositUtils = $depositUtils;
    }

    public function start()
    {
        DepositController::sendDeposit($this->deposit, $this->depositUtils);
        return $this->onDepositResponse();
    }

    private function onDepositResponse()
    {
        $depositResponse = new TransactionResponse($this->deposit);
        return $depositResponse;
    }
};
