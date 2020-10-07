<?php

declare(strict_types=1);

namespace TTBooking\MoneySerializer\Contracts;

use Money\Currency;
use Money\Money;

interface SerializesMoney
{
    public function serialize(Money $money): string;

    public function deserialize(string $serialized, Currency $fallbackCurrency = null): Money;
}
