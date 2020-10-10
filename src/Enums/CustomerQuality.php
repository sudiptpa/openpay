<?php

namespace Omnipay\Openpay\Enums;

class CustomerQuality
{
    const CUSTOMER_UNKNOWN = -1; // Unknown (default)
    const CUSTOMER_NEW = 0; // Brand new with no history
    const CUSTOMER_GOOD = 1; // Returning ‘Good’ customer
    const CUSTOMER_AVERAGE = 2; // Returning ‘Average’ customer
    const CUSTOMER_BAD = 3; // Returning ‘Bad’ customer
}
