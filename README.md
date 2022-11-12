# Mobile Money [Mobile Money Php Laravel](https://github.com/Chipdeals/mobile-money-api-laravel) documentation

![PHP](https://img.shields.io/badge/PHP-43853D?style=for-the-badge&logo=php&logoColor=white) ![LARAVEL](https://img.shields.io/badge/laravel-43853D?style=for-the-badge&logo=laravel&logoColor=white) ![COMPOSER](https://img.shields.io/badge/composer-43853D?style=for-the-badge&logo=composer&logoColor=white)



#### Other libraries documentations
- [**Mobile Money API REST**](https://github.com/Chipdeals/Momo-Api)
- [**Mobile Money Nodejs**](https://www.npmjs.com/package/@chipdeals/momo-api)
- [**Mobile Money Php Laravel**](https://github.com/Chipdeals/mobile-money-api-laravel)
- [**Mobile Money HTML Widget**](https://github.com/Chipdeals/mobile-money-api-Javascript)


**Chipdeals-momo-api** is a Mobile Money API that allows you to build a quick, simple and excellent payment experience in your web and native app.This the official **Php laravel library**



You can **[request payment](#Collect-Money)** and **[send money](#Disburse-Money)** to any **mobile money wallet**

# Requirements

*Laravel 8 or higher*

<br/>

# Installation
```bash
composer require chipdeals/momo-api
```

<br/>

# Quick Start

**Initialize Chipdeals Momo API with your API Key ([*Get apikey here*](#Contact-us)) and start**

```php=
use \Chipdeals\MomoApi\Momo;
// ...

$momo = new Momo();
$momo->setApiKey("test_FOdigzgSopV8GZggZa89");

//Collect 500 XOF from the +22951010200 Mobile Money wallet.
$collection = $momo
  ->collect()
  ->amount(500)
  ->currency("XOF")
  ->from('22951010200')
  ->create();
print_r($collection->getArray());

//Send 2000 XOF to the +22951010200 Mobile Money wallet.
$deposit = $momo
  ->deposit()
  ->amount(2000)
  ->currency("XOF")
  ->to('22951010200')
  ->create();
print_r($deposit->getArray());

```

###### Quick check possible responses with [sandbox tests](#Sandbox-tests)

<br/>

# Usage
The package needs to be configured with your **account's API key**, which is available in the when you get access to Chipdeals Sandbox.

[***You can get your apiKey here***](#Contact-us)

<br/>

## Collect Money
[Collect limitation](#collect-limitation)

### Simple collection
For example to request 2000 XOF from the ***+22951010200*** Mobile Money wallet, the following code can be used

```php=
use \Chipdeals\MomoApi\Momo;
// ...

$momo = new Momo();
$momo->setApiKey("test_FOdigzgSopV8GZggZa89");

$collection = $momo
  ->collect()
  ->amount(2000) //Amount of the transaction
  ->currency("XOF") // Any valid currency
  ->from("22951010200") // Sender phone number with country code préfix
  ->firstName("Iyam") // First name of the sender
  ->lastName("EVERICH") // Last name of the sender
  ->create();

print_r($collection->getArray());
echo "<br/>" . $collection->getReference();
```

### Collect with a [webhook](#Webhook) to get response as soon as the payment is processed. 

```php=7
$collection = $momo
  ->collect()
  ->amount(2000) //Amount of the transaction
  ->currency("XOF") // Any valid currency
  ->from("22951010200") // Sender phone number with country code préfix
  ->firstName("Iyam") // First name of the sender
  ->lastName("EVERICH") // Last name of the sender
  ->webhook("https:// mydomain/payment-status") // Url where we will send you transaction data on progress
  ->create();

print_r($collection->getArray());
echo "<br/>" . $collection->getReference();
```

[*See webhook you get*](#Collectiton-state-changed-webhook-payload-sample)
<br/>

## Disburse Money

### Simple Disbursement

You can also send 2000 XOF to the ***+22951010200*** Mobile Money wallet, with the following code

```php=
use \Chipdeals\MomoApi\Momo;
// ...

$momo = new Momo();
$momo->setApiKey("test_FOdigzgSopV8GZggZa89");

$deposit = $momo
  ->deposit()
  ->amount(2000) //Amount of the transaction
  ->currency("XOF") // Any valid currency
  ->to('22951010200') // Recipient phone number with country code préfix
  ->create();

print_r($deposit->getArray());
echo "<br/>" . $deposit->getReference();
```

### Disburse with a [webhook](#Webhook) to get response as soon as the deposit is processed. 


```php=7
$deposit = $momo
  ->deposit()
  ->amount(2000) //Amount of the transaction
  ->currency("XOF") // Any valid currency
  ->to('22951010200') // Recipient phone number with country code préfix
  ->webhook("https:// mydomain/payment-status") // Url where we will send you transaction data on progress
  ->create();

print_r($deposit->getArray());
echo "<br/>" . $deposit->getReference();
```
[*See webhook you get*](#Disbursement-state-changed-webhook-payload-sample)

<br/>

## Get transaction status

Get status of a transaction of reference `dd1e2d17-5c21-4964-b58d-198fd2aac150`


```php=
use \Chipdeals\MomoApi\Momo;
// ...

$momo = new Momo();
$momo->setApiKey("test_FOdigzgSopV8GZggZa89");

$reference = "ba32a171-cbea-45fd-8848-ac5b77580be3"
$transaction = $momo->getStatus($reference);

echo $transaction->getReference() . "<br/>";
echo $transaction->getPhoneNumber() . "<br/>";
echo $transaction->getCountryCode() . "<br/>";
echo $transaction->getOperator() . "<br/>";
echo $transaction->getFirstName() . "<br/>";
echo $transaction->getLastName() . "<br/>";
echo $transaction->getOriginalCurrency() . "<br/>";
echo $transaction->getOriginalAmount() . "<br/>";
echo $transaction->getCurrency() . "<br/>";
echo $transaction->getAmount() . "<br/>";
echo $transaction->getStatus() . "<br/>";
echo $transaction->getStatusMessage() . "<br/>";
echo $transaction->getStatusCode() . "<br/>";
echo $transaction->getStartTimestampInSecond() . "<br/>";
echo $transaction->getEndTimestampInSecond() . "<br/>";
echo $transaction->checkIsCollection() . "<br/>";


echo "<pre>";
print_r($transaction->getArray());
echo "</pre>";
``` 

<details>
  <summary>Collection transactionData Sample </summary>
  
  ```
Array
(
    [reference] => ba32a171-cbea-45fd-8848-ac5b77580be3
    [phoneNumber] => 22990630401
    [currency] => XOF
    [operator] => MTN
    [firstName] => Iyam
    [lastName] => EVERICH
    [originalCurrency] => USD
    [originalAmount] => 2000
    [amount] => 1251002
    [status] => success
    [statusMessage] => Successfully processed transaction
    [statusCode] => 200
    [startTimestampInSecond] => 1668184816
    [endTimestampInSecond] => 0
    [isCollection] => true
)
  ```
</details>

<details>
  <summary>Disbursement transactionData Sample </summary>
  
  ```
  Array
(
    [reference] => a0903015-a86d-46c3-98ce-bb36639d6d09
    [phoneNumber] => 22990630401
    [currency] => XOF
    [operator] => MTN
    [firstName] => 
    [lastName] => 
    [originalCurrency] => XOF
    [originalAmount] => 2000
    [amount] => 2000
    [status] => success
    [statusMessage] => Successfully processed transaction
    [statusCode] => 200
    [startTimestampInSecond] => 1668229766
    [endTimestampInSecond] => 0
    [isCollection] => false
)
  ```
</details>


<br/>

## Get Your balance

Get your Chipdeals account's balance

```php=
use \Chipdeals\MomoApi\Momo;
// ...

$momo = new Momo();
$momo->setApiKey("test_FOdigzgSopV8GZggZa89");

$balances =  $momo->getBalances();

foreach ($balances as $balanceKey => $balance) {
  echo $balance->getCountryCode() . "<br/>";
  echo $balance->getOperator() . "<br/>";
  echo $balance->getCurrency() . "<br/>";
  echo $balance->getAmount() . "<br/>";

  echo "<pre>";
  print_r($balance->getArray());
  echo "</pre>pre><br/>";
}
```

Balance sample:

```
Array
(
    [countryCode] => BJ
    [operator] => MTN
    [currency] => XOF
    [amount] => 19000
)
```

<br/>
<br/>

# Webhook

Webhooks are an important part of your payment integration. They allow Chipdeals notify you about events that happen on your account, such as a successful payment or a failed transaction.

A ***webhook URL*** is an endpoint on your server where you can receive notifications about such events. When an event occurs, we'll make a ***POST*** request to that endpoint, with a ***JSON body*** containing the details about the event, including the type of event and the data associated with it.

<br/>

## Structure of a webhook payload
All webhook payloads follow the same basic structure:

* an `event` field describing the type of event
* a `data` object. The contents of this object will vary depending on the event, but typically it will contain details of the event, including:
    * a `reference` containing the ID of the transaction
    * a `status` describing the status of the transaction. possible values are `success`, `pending` or `error`
    * a `statusMessageCode`, containing a specific code that identify an exact state of the transaction. [See all `statusMessageCode`](#Status-Message-Code) 
    * a `statusMessage`, cantaining an human undertandable descrption of the exact state of the transaction
    * transaction details
    
[Here are some sample webhook payloads for transfers and payments](#Webhook-sample)

<br/>

## Implementing a webhook

Creating a webhook endpoint on your server is the same as writing any other API endpoint, but there are a few important details to note:

**Verifying webhook signatures**
When enabling webhooks, you have the option to set a ***secret hash***. Since webhook URLs are publicly accessible, the secret hash allows you to verify that incoming requests are from Chipdeals. You can specify any value as your secret hash, but we recommend something random. We also recommend to store it as an environment variable on your server.

If you specify a secret hash, we'll include it in our request to your webhook URL, in a header called `verif-hash`. In the webhook endpoint, check if the `verif-hash` header is present and that it matches the secret hash you set. If the header is missing, or the value doesn't match, you can discard the request, as it isn't from Chipdeals.

**Responding to webhook requests**
To acknowledge receipt of a webhook, your endpoint **must** return a `200` HTTP status code. Any other response codes, including `3xx` codes, will be treated as a failure. **We don't care about the response body or headers.**

Be sure to enable webhook retries on your dashboard. If we don't get a 200 status code (for example, if your server is unreachable), we'll retry the webhook call every 90 minutes for the next 36 hours.
<br/>


# More Info

## Collection and disburssement parametters

### - ``phoneNumber`` parameter

You specify the ``phoneNumber`` of a collection with method `from(phoneNumber: sting)`

And for a disbursement you specify ``phoneNumber`` with method `to(phoneNumber: sting)`

Those methode are locking for a string containing the phone number of the money sender for collection and the money recipient for disbursement.

The PhoneNumber should respect this format:

``XXXOOOOOOOO``

where the three ``X`` represent the country phone préfix (``229`` | ``237`` for example), and the ``O`` are the phone number in the country. The number of `O` can change with the country but the prefix should be 3.

### - ``currency`` parameter 
You specify the currenct of a transaction with the method `currency(currency: string)`

The currency should be a string of 3 character.

If you add a currency that is not the currency localy used in the country of the phone number of the transaction, we will convert the amount of the transaction into local currency.

Our conversion rate evoluate like the market.

### - ``amount`` parameter 
You specify the amount of a transaction with the method `amount(transactionAmount: number)`

It is a number. 

We will check if the currency that you specify for the transaction is the local currency of the phone number's country and then we will convert the amount into local currency before perform the transaction with the customer


### - ``firstName`` and ``lastName`` parameters 

You respectively specify ``firstName`` and ``lastName`` with methods ``firstName(senderFirstName: string)`` and ``lastName(senderLastName: string)``

Those parametters are required to perform secured collection request.

Disbursement doesn't need them.

If you make 3 request per day with unspesified ``firstName`` and | or ``lastName`` we will block the 4th and the other. We recommand you to specify ``fisrtName`` and ``lastName`` for all your collection request.

In sandbox test, you have no probleme with ``firstName`` and ``lastName`` specification, you can do as you like **But be careful for Live**

<br/>

## Status Message Code

| Code | Relative Status | Meaning                                                            |
|:----:| --------------- | ------------------------------------------------------------------ |
| 200  | ✔️ -- success   | Transaction successful                                             |
| 201  | 🕟 -- pending   | Data in validation                                                 |
| 202  | 🕟 -- pending   | Transaction pending                                                |
| 203  | 🕟 -- pending   | Data are validated, server is working                              |
| 204  | 🕟 -- pending   | Waiting for ussd push validation                                   |
| 400  | ❌ -- error     | Incorrect data enter in the request                                |
| 401  | ❌ -- error     | Parameters not complete                                            |
| 402  | ❌ -- error     | Payment PhoneNumber is not correct                                 |
| 403  | ❌ -- error     | Deposit PhoneNumber is not correct                                 |
| 404  | ❌ -- error     | Timeout in USSD PUSH/ Cancel in USSD PUSH                          |
| 406  | ❌ -- error     | Payment phoneNumber got is not for mobile money wallet             |
| 460  | ❌ -- error     | Payer’s payment account balance is low                             |
| 461  | ❌ -- error     | An error occured while paying                                      |
| 462  | ❌ -- error     | This kind of transaction is not supported yet, processor not found |
| 5XX  | ⛔️ -- error    | An unknow error occured on the api                                 |

<br/>

## Sandbox tests

You can use your `test apikey` or all users test apikey : `test_FOdigzgSopV8GZggZa89` to make sandbox requsts.

All valid phone number you used in sandbox will send you valid responses as it was the live mode.

For exemple, if you use the phone number `22951010581` you will get a response with status message code `201` (what means `pending` see more [here](#Status-Message-Code)). Some seconds laters, you will get status messages codes `202`, `203` and `200` (`200` means success).

It is the same thing for others phone number with a small exception to allow errors case handling by implementor.



| Sandbox Phone number | -> final status message code |
| -------------------- | ----------------------------:|
| 22951010402          |                          402 |
| 22951010403          |                          403 |
| 22951010404          |                          404 |
| 22951010460          |                          460 |
| 22951010461          |                          461 |
| 22951010462          |                          462 |
| 22951010200          |                          200 |

For **Live `apiKey`** and **Live Responses** requests **[Contact us](#Contact-us)**

<br/>

## Limitation
### Unsecured collect limitation

When you are making a collection request, you have posibility to specify or not the payer's firstName and lastname.
By not specifying `firstName` and `lastName`, you can make quick test.

But when `firstName` and `lastName` are not specified your collection request is not secured. 
And you are alowed to perform at most 3 unsecured collection resquest per day. More request will be just blocked.

You cannot perform unsecured collection request for more than 500 XOF.


<br/>

# Contact us

### Call us or write us to [get your apikey](#Contact-us) and start getting payment

<br/>

E-mail: products@chipdeals.me
Website: https://chipdeals.me
Phone: +22990630401
Whatsapp: +22990630401

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

#
Copyright (C) 2022 Chipdeals Inc - https://chipdeals.me