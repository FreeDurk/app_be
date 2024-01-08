<?php

namespace App\Interfaces;

interface OrderRepositoryInterface
{
    public function getAllOrders($params = []);
    public function getOrderById($orderId);
}
