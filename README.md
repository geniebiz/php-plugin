# GenieBusinessConnectPHP

> PHP API Client and bindings for the [Genie Business Connect API](https://github.com/geniebiz/php-plugin)

Using this PHP API Client you can interact with your Genie Business Connect API:
- 💳 __Transactions__

## Installation

Requires PHP 7.0 or higher

The recommended way to install geniebiz-connect-php is through [Composer](https://getcomposer.org):

First, install Composer:

```
$ curl -sS https://getcomposer.org/installer | php
```

Next, install the latest geniebiz-connect-php:

```
$ php composer.phar require geniebusiness/geniebiz-connect-php
```

Finally, you need to require the library in your PHP application:

```php
require "vendor/autoload.php";
```

## Development

- Run `composer test` and `composer phpcs` before creating a PR to detect any obvious issues.
- Please create issues for this specific API Binding under the [issues](https://github.com/geniebusiness/geniebiz-connect-php/issues) section.
- [Contact Genie Business](https://dashboard.geniebiz.lk) directly for Genie Business Connect API support.


## Quick Start
### GenieBusinessConnect\Client
First get your `production` or `sandbox` API key from your [Dashboard](https://dashboard.geniebiz.lk).

If you want to get a `production` client:

```php
use GenieBusinessConnect\Client;

$client = new Client('apikey', 'appid');
```

If you want to get a `sandbox` client:

```php
use GenieBusinessConnect\Client;

$client = new Client('apikey', 'appid', 'sandbox');
```

If you want to pass additional [GuzzleHTTP](https://github.com/guzzle/guzzle) options:

```php
use GenieBusinessConnect\Client;

$options = ['headers' => ['foo' => 'bar']];
$client = new Client('apikey', 'appid', 'sandbox', $options);
```

## Available API Operations

The following exposed API operations from the Genie Business Connect API are available using the API Client.

See below for more details about each resource.

💳 __Transactions__

Create a new transaction with or without a specific payment method.

## Usage details

### 💳 Transactions
#### Create transaction with a specific payment method

```php
use GenieBusinessConnect\Client;

$client = new Client('apikey', 'appid');

$json = [
 "provider" => "card", // Payment method enabled for your merchant account such as bcmc, card, card
 "currency" => "LKR",
 "amount" => 1000, // 10.00 LKR
 "redirectUrl" => "https://foo.bar/order/123" // Optional redirect after payment completion
];

$transaction = $client->transactions->create($json);
header('Location: '. $transaction->url); // Go to transaction payment page
```

#### Create transaction without a payment method that will redirect to the payment method selection screen

```php
use GenieBusinessConnect\Client;

$client = new Client('apikey', 'appid');

$json = [
 "currency" => "LKR",
 "amount" => 1000, // 10.00 LKR
 "redirectUrl" => "https://foo.bar/order/987" // Optional redirect after payment completion
];

$transaction = $client->transactions->create($json);
header('Location: '. $transaction->url); // Go to payment method selection screen
```

#### Create transaction without a payment method with your own localId that will redirect to the payment method selection screen

```php
use GenieBusinessConnect\Client;

// Get your API Key and App ID from the "Connect" screen on your merchant dashboard
$client = new Client('apikey', 'appid');

// Currency should be your merchant account currency or the payment would be rejected
$json = [
 "currency" => "LKR",
 "amount" => 1234, // 12.34 LKR,
 "localId" => "INVOICE-2020-0001",
 "redirectUrl" => "https://your.webshop.domain.url/my_order/2020_0001" // Optional redirect after payment completion, the payment portal will redirect to this URL and attach queryParameters to this URL, fully optional
];

$transaction = $client->transactions->create($json);
header('Location: '. $transaction->url); // Go to payment screen on Genie Business
die();
```

#### Create transaction without a payment method with your own localId that will redirect to the payment method selection screen and also sends a webhook for this specific transaction

```php
use GenieBusinessConnect\Client;

// Get your API Key and App ID from the "Connect" screen on your merchant dashboard
$client = new Client('apikey', 'appid');

// Currency should be your merchant account currency or the payment would be rejected
$json = [
 "currency" => "EUR",
 "amount" => 1234, // 12.34 EUR,
 "localId" => "INVOICE-2020-0001",
 "webhook" => "https://foo.bar/incoming/1234",
 "redirectUrl" => "https://your.webshop.domain.url/my_order/2020_0001" // Optional redirect after payment completion, the payment portal will redirect to this URL and attach queryParameters to this URL, fully optional
];

$transaction = $client->transactions->create($json);
header('Location: '. $transaction->url); // Go to payment screen on Genie Business
die();
```


#### Create transaction without a payment method with your own localId that will redirect to the payment method selection screen and also sends a webhook for this specific transaction. Furthermore expire this payment link automatically after 3 hours.

```php
use GenieBusinessConnect\Client;

// Get your API Key and App ID from the "Connect" screen on your merchant dashboard
$client = new Client('apikey', 'appid');

// Currency should be your merchant account currency or the payment would be rejected
$json = [
 "currency" => "EUR",
 "amount" => 1234, // 12.34 EUR,
 "validForHours" => 3,
 "localId" => "INVOICE-2020-0001",
 "webhook" => "https://foo.bar/incoming/1234",
 "redirectUrl" => "https://your.webshop.domain.url/my_order/2020_0001" // Optional redirect after payment completion, the payment portal will redirect to this URL and attach queryParameters to this URL, fully optional
];

$transaction = $client->transactions->create($json);
header('Location: '. $transaction->url); // Go to payment screen on Genie Business
die();
```



## About

⭐ Sign up as a merchant at https://dashboard.geniebiz.lk and start receiving payments in seconds.
