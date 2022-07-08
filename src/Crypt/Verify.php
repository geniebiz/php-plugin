<?php
namespace GenieBusinessConnect\Crypt;

use GenieBusinessConnect\Client;

class Verify
{
    public function validateSignature(Client $client, string $sign, int $amount, string $currency)
    {
        return ($sign == sha1('amount='.$amount. '&currency='.$currency.'&apiKey='.$client->getApiKey()));
    }
}
