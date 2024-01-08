<?php

namespace App\Data\Orders;

use Spatie\LaravelData\Data;

class BillingDetailsData extends Data
{
  public function __construct(
    //
    public  $billingDetails
  ) {
  }
}
