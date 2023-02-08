<?php

namespace Chipdeals\MomoApi\Utils;

use Chipdeals\MomoApi\Transaction\TransactionData;

class CollectionUtils
{
    static public function sendCollectionRequest(TransactionData $collection)
    {
        $url = "https://apis.chipdeals.me/momo/requestPayment?apikey=";
        $url .= $collection->getApiKey();
        $requestData = [
            "senderFirstName" => $collection->getFirstName(),
            "senderLastName" => $collection->getLastName(),
            "senderPhoneNumber" => $collection->getPhoneNumber(),
            "currency" => $collection->getOriginalCurrency(),
            "amount" => $collection->getOriginalAmount(),
            "webhookUrl" => $collection->getWebhookUrl(),
            "fee" => $collection->getFee(),
            "merchantSupportFee" => $collection->getMerchantSupportFee(),
            "isWave" => $collection->getIsWave(),
        ];
        $response = Network::sendPostRequest($url, $requestData);
        CollectionUtils::setCollectionValues($response, $collection);
    }

    static private function setCollectionValues($response, TransactionData $collection)
    {
        $collection->setStatusCode($response["statusCode"]);
        $collection->setStatus("error");
        $collection->setStatusMessage($response["message"]);
        $collectionResponseFound = isset($response["data"]->payment->status);

        if (isset($response["data"]->errorCode)) {
            $collection->setStatusCode($response["data"]->errorCode);
            $collection->setStatusMessage($response["data"]->message);
        }
        if ($collectionResponseFound) {
            $collectionResponse = $response["data"]->payment;
            $collection->setReference($collectionResponse->reference);
            $collection->setPhoneNumber($collectionResponse->senderPhoneNumber);
            $collection->setCountryCode($collectionResponse->senderCountryCode);
            $collection->setOperator($collectionResponse->senderOperator);
            $collection->setFirstName($collectionResponse->senderFirstName);
            $collection->setLastName($collectionResponse->senderLastName);
            $collection->setOriginalCurrency($collectionResponse->originalCurrency);
            $collection->setCurrency($collectionResponse->currency);
            $collection->setOriginalAmount($collectionResponse->originalAmount);
            $collection->setAmount($collectionResponse->amount);
            $collection->setStatus($collectionResponse->status);
            $collection->setStatusMessage($collectionResponse->statusMessage);
            $collection->setStatusCode($collectionResponse->statusMessageCode);
            $collection->setStartTimestampInSecond($collectionResponse->startTimestampInSecond);
            $collection->setEndTimestampInSecond($collectionResponse->endTimestampInSecond);
            if (isset($collectionResponse->operatorReference)) {
                $collection->setOperatorReference($collectionResponse->operatorReference);
            }
        }
    }
}
