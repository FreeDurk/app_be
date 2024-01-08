<?php

namespace App\Repositories\Orders;

use App\Interfaces\OrderRepositoryInterface;
use App\Wrappers\AppHttp;

class OrderRepository implements OrderRepositoryInterface
{
    protected $httpClient;

    public function __construct(AppHttp $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getAllOrders($params = [])
    {
        return $this->httpClient->get('/orders', $params);
    }

    public function getOrderById($orderId)
    {
    }
}
