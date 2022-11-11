<?php

namespace Chipdeals\MomoApi\Collection\UseCases;

use Chipdeals\MomoApi\Transaction\TransactionData;

class Collect
{
    public static function exec(TransactionData $collection, $CollectionUtils)
    {
        $CollectionUtils::sendCollectionRequest($collection);
    }
}
