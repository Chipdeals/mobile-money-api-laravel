<?php

namespace Chipdeals\MomoApi\Utils;

use GuzzleHttp;
use Throwable;

class Network
{
    static public function sendPostRequest($url, $body)
    {
        return Network::execRequest(function ($url, $body) {
            $jsonBody = json_encode($body);
            $client = new GuzzleHttp\Client();
            $res = $client->request('POST', $url, [
                'verify' => false,
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json'
                ],
                'body' => $jsonBody
            ]);
            return $res;
        }, $url, $body);
    }

    static public function sendGetRequest($url)
    {
        return Network::execRequest(function ($url) {
            $client = new GuzzleHttp\Client();
            $res = $client->request('GET', $url, [
                'verify' => false,
                'headers' => ['Accept' => 'application/json']
            ]);
            return $res;
        }, $url);
    }

    static private function execRequest($networkRequestMethod, $url, $body = "{}")
    {
        try {
            $res = $networkRequestMethod($url, $body);
            return Network::parseResponse($res);
        } catch (GuzzleHttp\Exception\ConnectException  $e) {
            return Network::parseResponse($e, true);
        } catch (GuzzleHttp\Exception\RequestException $e) {
            return Network::parseResponse($e->getResponse());
        } catch (GuzzleHttp\Exception\TransferException  $e) {
            return Network::parseResponse($e, true);
        } catch (Throwable $e) {
            return Network::parseResponse($e, true);
        }
    }

    static private function parseResponse($networkResponse, $isError = false)
    {
        $errorCode = 520;
        $response = [
            "statusCode" => $errorCode,
            "message" => "",
            "data" => []
        ];

        if ($isError) {
            if ($networkResponse->getCode() !== 0) {
                $response["statusCode"] = $networkResponse->getCode();
            }
            $response["message"] = $networkResponse->getMessage();
            return $response;
        };

        $responseData = json_decode($networkResponse->getBody());
        $response["statusCode"] = $networkResponse->getStatusCode();
        $response["data"] = $responseData;
        return $response;
    }
}
