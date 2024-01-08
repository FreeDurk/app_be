<?php

namespace App\Data\Orders;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

class OrderData extends Data
{

  protected $orderData;

  public function __construct(
    public string $orderId,
    public string $pickupPoint,
    public string $orderPlacedDateTime,
    #[DataCollectionOf(OrderShipmentDetailsData::class)]
    public OrderShipmentDetailsData $shipmentDetails,
    #[DataCollectionOf(BillingDetailsData::class)]
    public BillingDetailsData $billingDetails,
    #[DataCollectionOf(OrderItems::class)]
    public OrderItems $orderItems
  ) {
  }
}
