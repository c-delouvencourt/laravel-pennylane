<?php

namespace CLDT\PennylaneLaravel;

use CLDT\PennylaneLaravel\Api\SupplierInvoices;
use GuzzleHttp\ClientInterface;
use CLDT\PennylaneLaravel\Api\Enums;
use CLDT\PennylaneLaravel\Api\Invoices;
use CLDT\PennylaneLaravel\Api\Products;
use CLDT\PennylaneLaravel\Api\Customers;
use CLDT\PennylaneLaravel\Api\Estimates;

class PennylaneLaravel
{
    protected $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function me()
    {
        $response = $this->client->request('get', 'me');

        return json_decode($response->getBody()->getContents(), true);
    }

    public function customers()
    {
        return new Customers($this->client);
    }

    public function products()
    {
        return new Products($this->client);
    }

    public function invoices()
    {
        return new Invoices($this->client);
    }

    public function supplierInvoices()
    {
        return new SupplierInvoices($this->client);
    }

    public function estimates()
    {
        return new Estimates($this->client);
    }

    public function enums()
    {
        return new Enums($this->client);
    }
}
