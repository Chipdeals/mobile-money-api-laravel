<?php

namespace Chipdeals\MomoApi\Collection;

use Chipdeals\MomoApi\Transaction\TransactionData;
use Chipdeals\MomoApi\Transaction\TransactionResponse;

class CollectionExecution
{

    private $collection;
    private $collectionUtils;

    function __construct(TransactionData $collection, $collectionUtils)
    {
        $this->collection = $collection;
        $this->collectionUtils = $collectionUtils;
    }

    public function start()
    {
        CollectionController::collect($this->collection, $this->collectionUtils);
        return $this->onCollectionResponse();
    }

    private function onCollectionResponse()
    {
        $collectionResponse = new TransactionResponse($this->collection);
        return $collectionResponse;
    }
};
