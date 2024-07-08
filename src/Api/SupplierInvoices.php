<?php

namespace CLDT\PennylaneLaravel\Api;

class SupplierInvoices extends BaseApi
{
    /**
     * List all invoices
     *
     * @param array $filters
     * @return array
     */
    public function list(array $filters = [])
    {
        $response = $this->client->request('get', "supplier_invoices", [
            'query' => [
                'filter' => json_encode($filters)
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Get an invoice by it's ID
     *
     * @param string $id
     * @return array
     */
    public function get(string $id)
    {
        $response = $this->client->request('get', "supplier_invoices/{$id}");

        return json_decode($response->getBody()->getContents(), true);
    }


    /**
     * Import an invoice
     *
     * @param array $data
     * @param string $file_url
     * @param boolean $create_supplier
     * @return array
     */
    public function import(array $data, string $file_url, bool $create_supplier)
    {
        $response = $this->client->request('post', "supplier_invoices/import", [
            'json' => [
                'create_supplier' => $create_supplier,
                'file_url' => $file_url,
                'invoice' => $data
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
