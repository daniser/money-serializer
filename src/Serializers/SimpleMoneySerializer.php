<?php

declare(strict_types=1);

namespace TTBooking\MoneySerializer\Serializers;

use InvalidArgumentException;
use Money\Currency;
use Money\Money;
use TTBooking\MoneySerializer\Contracts\SerializesMoney;

class SimpleMoneySerializer implements SerializesMoney
{
    public function serialize(Money $money): string
    {
        return $money->getAmount();
    }

    public function deserialize(string $serialized, Currency $fallbackCurrency = null): Money
    {
        if (is_null($fallbackCurrency)) {
            throw new InvalidArgumentException('Fallback currency requested, but not provided.');
        }

        return new Money($serialized, $fallbackCurrency);
    }
}
