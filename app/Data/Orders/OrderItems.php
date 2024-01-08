<?php

namespace App\Data\Orders;

use Spatie\LaravelData\Data;

class OrderItems extends Data
{
  public function __construct(
    public $orderItems
  ) {
  }
}
