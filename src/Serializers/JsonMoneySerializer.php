<?php

declare(strict_types=1);

namespace TTBooking\MoneySerializer\Serializers;

use Money\Currency;
use Money\Money;
use TTBooking\MoneySerializer\Contracts\SerializesMoney;

class JsonMoneySerializer implements SerializesMoney
{
    public function serialize(Money $money): string
    {
        return json_encode($money);
    }

    public function deserialize(string $serialized, Currency $fallbackCurrency = null): Money
    {
        $value = json_decode($serialized);

        return new Money($value->amount, new Currency($value->currency));
    }
}
