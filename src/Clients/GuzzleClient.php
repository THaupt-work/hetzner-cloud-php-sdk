<?php

namespace LKDev\HetznerCloud\Clients;

use GuzzleHttp\Client;
use LKDev\HetznerCloud\HetznerAPIClient;

class GuzzleClient extends Client
{
    /**
     * @param HetznerAPIClient $client
     */
    public function __construct(HetznerAPIClient $client)
    {
        parent::__construct([
            'base_uri' => $client->getBaseUrl(),
            'headers' => [
                'Authorization' => 'Bearer '.$client->getApiToken(),
                'Content-Type' => 'application/json',
                'User-Agent' => ((strlen($client->getUserAgent()) > 0) ? $client->getUserAgent().' ' : '').'hcloud-php/'.HetznerAPIClient::VERSION,
            ],
        ]);
    }
}
