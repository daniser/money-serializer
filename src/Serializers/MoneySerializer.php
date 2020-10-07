<?php

declare(strict_types=1);

namespace TTBooking\MoneySerializer\Serializers;

use Money\Currency;
use Money\Money;
use Money\MoneyFormatter;
use Money\MoneyParser;
use TTBooking\MoneySerializer\Contracts\SerializesMoney;
use TTBooking\SafeMoneyParser\FallbackMoneyParser;

class MoneySerializer implements SerializesMoney
{
    /** @var MoneyFormatter */
    protected $formatter;

    /** @var MoneyParser */
    protected $parser;

    /**
     * MoneySerializer constructor.
     *
     * @param MoneyFormatter $formatter
     * @param MoneyParser $parser
     */
    public function __construct(MoneyFormatter $formatter, MoneyParser $parser)
    {
        $this->formatter = $formatter;
        $this->parser = $parser;
    }

    public function serialize(Money $money): string
    {
        return $this->formatter->format($money);
    }

    public function deserialize(string $serialized, Currency $fallbackCurrency = null): Money
    {
        return (new FallbackMoneyParser($this->parser))->parse($serialized, $fallbackCurrency);
    }
}
