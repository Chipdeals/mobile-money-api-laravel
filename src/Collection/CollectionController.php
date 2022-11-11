<?php

namespace Chipdeals\MomoApi\Collection;

use Chipdeals\MomoApi\Collection\UseCases\Collect;
use Chipdeals\MomoApi\Transaction\TransactionData;

class CollectionController
{

    public static function collect(TransactionData $collection, $collectionUtils)
    {
        Collect::exec($collection, $collectionUtils);
    }
}
