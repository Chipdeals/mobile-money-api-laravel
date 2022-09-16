<?php

namespace Chipdeals\MomoApi\Utils;

use Chipdeals\MomoApi\Transaction\TransactionData;
use Chipdeals\MomoApi\Transaction\TransactionResponse;

class TransactionUtils
{
    static public function checkTransactionStatus(TransactionData $transaction)
    {
        $url = "https://apis.chipdeals.me/momo/status/";
        $url .= $transaction->getReference();
        $url .= "?apikey=";
        $url .= $transaction->getApiKey();
        $response = Network::sendGetRequest($url);
        TransactionUtils::setTransactionValues($response, $transaction);
    }

    static private function setTransactionValues($response, TransactionData $transaction)
    {
        $transaction->setStatusCode($response["statusCode"]);
        $transaction->setStatus("error");
        $transaction->setStatusMessage($response["message"]);
        $transactionResponseFound = isset($response["data"]->transaction->status);

        if (isset($response["data"]->errorCode)) {
            $transaction->setStatusCode($response["data"]->errorCode);
            $transaction->setStatusMessage($response["data"]->message);
        }
        if ($transactionResponseFound) {
            $transactionResponse = $response["data"]->transaction;
            $transaction->setReference($transactionResponse->reference);
            $transaction->setOriginalCurrency($transactionResponse->originalCurrency);
            $transaction->setCurrency($transactionResponse->currency);
            $transaction->setOriginalAmount($transactionResponse->originalAmount);
            $transaction->setAmount($transactionResponse->amount);
            $transaction->setStatus($transactionResponse->status);
            $transaction->setStatusMessage($transactionResponse->statusMessage);
            $transaction->setStatusCode($transactionResponse->statusMessageCode);
            $transaction->setStartTimestampInSecond($transactionResponse->startTimestampInSecond);
            $transaction->setEndTimestampInSecond($transactionResponse->endTimestampInSecond);
            if ($transactionResponse->transactionType === "payment") {
                $transaction->setIsCollection(true);
                $transaction->setPhoneNumber($transactionResponse->senderPhoneNumber);
                $transaction->setCountryCode($transactionResponse->senderCountryCode);
                $transaction->setOperator($transactionResponse->senderOperator);
                $transaction->setFirstName($transactionResponse->senderFirstName);
                $transaction->setLastName($transactionResponse->senderLastName);
            } else {
                $transaction->setIsCollection(false);
                $transaction->setPhoneNumber($transactionResponse->recipientPhoneNumber);
                $transaction->setCountryCode($transactionResponse->recipientCountryCode);
                $transaction->setOperator($transactionResponse->recipientOperator);
            }
        }
    }

    static public function parseWebhookData($requestBody)
    {
        $transactionInfo = json_decode($requestBody["transaction"]);

        $transaction = new TransactionData();
        $transaction->setReference($transactionInfo->reference);
        $transaction->setOriginalCurrency($transactionInfo->originalCurrency);
        $transaction->setCurrency($transactionInfo->currency);
        $transaction->setOriginalAmount($transactionInfo->originalAmount);
        $transaction->setAmount($transactionInfo->amount);
        $transaction->setStatus($transactionInfo->status);
        $transaction->setStatusMessage($transactionInfo->statusMessage);
        $transaction->setStatusCode($transactionInfo->statusMessageCode);
        $transaction->setStartTimestampInSecond($transactionInfo->startTimestampInSecond);
        $transaction->setEndTimestampInSecond($transactionInfo->endTimestampInSecond);
        if ($transactionInfo->transactionType === "payment") {
            $transaction->setIsCollection(true);
            $transaction->setPhoneNumber($transactionInfo->senderPhoneNumber);
            $transaction->setCountryCode($transactionInfo->senderCountryCode);
            $transaction->setOperator($transactionInfo->senderOperator);
            $transaction->setFirstName($transactionInfo->senderFirstName);
            $transaction->setLastName($transactionInfo->senderLastName);
        } else {
            $transaction->setIsCollection(false);
            $transaction->setPhoneNumber($transactionInfo->recipientPhoneNumber);
            $transaction->setCountryCode($transactionInfo->recipientCountryCode);
            $transaction->setOperator($transactionInfo->recipientOperator);
        }

        return new TransactionResponse($transaction);
    }
}
