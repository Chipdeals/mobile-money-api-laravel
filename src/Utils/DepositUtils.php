<?php

namespace Chipdeals\MomoApi\Utils;

use Chipdeals\MomoApi\Transaction\TransactionData;

class DepositUtils
{
    static public function sendDepositRequest(TransactionData $deposit)
    {
        $url = "https://apis.chipdeals.me/momo/deposit?apikey=";
        $url .= $deposit->getApiKey();
        $requestData = [
            "requestSource" => "laravelLib",
            "merchantOrderId" => $deposit->getMerchantOrderId(),
            "recipientPhoneNumber" => $deposit->getPhoneNumber(),
            "currency" => $deposit->getOriginalCurrency(),
            "amount" => $deposit->getOriginalAmount(),
            "webhookUrl" => $deposit->getWebhookUrl(),
            "isWave" => $deposit->getIsWaveAccount(),
        ];
        $response = Network::sendPostRequest($url, $requestData);
        DepositUtils::setDepositValues($response, $deposit);
    }

    static private function setDepositValues($response, TransactionData $deposit)
    {
        // print_r($response);
        $deposit->setStatusCode($response["statusCode"]);
        $deposit->setStatus("error");
        $deposit->setStatusMessage($response["message"]);
        $depositResponseFound = isset($response["data"]->deposit->status);

        if (isset($response["data"]->errorCode)) {
            $deposit->setStatusCode($response["data"]->errorCode);
            $deposit->setStatusMessage($response["data"]->message);
        }
        if ($depositResponseFound) {
            $depositResponse = $response["data"]->deposit;
            $deposit->setReference($depositResponse->reference);
            $deposit->setMerchantOrderId($depositResponse->merchantOrderId);
            $deposit->setPhoneNumber($depositResponse->recipientPhoneNumber);
            $deposit->setCountryCode($depositResponse->recipientCountryCode);
            $deposit->setOperator($depositResponse->recipientOperator);
            $deposit->setOriginalCurrency($depositResponse->originalCurrency);
            $deposit->setCurrency($depositResponse->currency);
            $deposit->setOriginalAmount($depositResponse->originalAmount);
            $deposit->setAmount($depositResponse->amount);
            $deposit->setStatus($depositResponse->status);
            $deposit->setStatusMessage($depositResponse->statusMessage);
            $deposit->setStatusCode($depositResponse->statusMessageCode);
            $deposit->setStartTimestampInSecond($depositResponse->startTimestampInSecond);
            $deposit->setEndTimestampInSecond($depositResponse->endTimestampInSecond);
            if (isset($depositResponse->operatorReference)) {
                $deposit->setOperatorReference($depositResponse->operatorReference);
            }
        }
    }
}
