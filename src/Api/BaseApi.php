<?php

namespace CLDT\PennylaneLaravel\Api;

use GuzzleHttp\ClientInterface;

abstract class BaseApi
{
    protected $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }
}
