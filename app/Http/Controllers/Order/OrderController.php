<?php

namespace App\Http\Controllers\Order;

use App\Data\Orders\BillingDetailsData;
use App\Data\Orders\OrderData;
use App\Data\Orders\OrderItems;
use App\Data\Orders\OrderShipmentDetailsData;
use App\Http\ApiResponse\ApiResponse;
use App\Wrappers\AppHttp;
use App\Http\Controllers\Controller;
use App\Interfaces\OrderRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepo)
    {
        $this->orderRepository = $orderRepo;
    }

    public function index()
    {
        $params = [
            'fulfilment-method' => "ALL",
            'status' => "ALL"
        ];

        $response = $this->orderRepository->getAllOrders($params);
        $orderList = $response->json();
        return $orderList;
        if (!$orderList) {
            return ApiResponse::error('Error loading orders. Please check authorizations');
        }

        $orderDetails = $this->orderRepository->getOrderById($orderList['orderId']);
        $details = $orderDetails->json();
        if (!$orderDetails) {
            return ApiResponse::error('Error loaded order details. Please check authorizations');
        }

        return ApiResponse::success([$orderList, $orderDetails], 'Success');

        // $orders = new OrderData(
        //     $orderData['orderId'],
        //     $orderData['pickupPoint'],
        //     $orderData['orderPlacedDateTime'],
        //     new OrderShipmentDetailsData($orderData['shipmentDetails']),
        //     new BillingDetailsData($orderData['billingDetails']),
        //     new OrderItems($orderData['orderItems']),
        // );


    }
}
