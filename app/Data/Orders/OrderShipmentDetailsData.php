<?php

namespace App\Data\Orders;

use Spatie\LaravelData\Data;

class OrderShipmentDetailsData extends Data
{
  public function __construct(
    public  $shipmentDetails
  ) {
  }
}
