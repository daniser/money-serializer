<?php

declare(strict_types=1);

namespace TTBooking\MoneySerializer\Serializers;

use Money\Currency;
use Money\Money;
use Money\MoneyFormatter;
use Money\MoneyParser;
use TTBooking\MoneySerializer\Contracts\SerializesMoney;

class MoneySerializer implements SerializesMoney
{
    public function __construct(protected MoneyFormatter $formatter, protected MoneyParser $parser)
    {
    }

    public function serialize(Money $money): string
    {
        return $this->formatter->format($money);
    }

    public function deserialize(string $serialized, Currency $fallbackCurrency = null): Money
    {
        return $this->parser->parse($serialized, $fallbackCurrency);
    }
}
