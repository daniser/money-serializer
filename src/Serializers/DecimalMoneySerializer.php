<?php

declare(strict_types=1);

namespace TTBooking\MoneySerializer\Serializers;

use Money\Currencies;
use Money\Formatter\DecimalMoneyFormatter;
use Money\Parser\DecimalMoneyParser;

class DecimalMoneySerializer extends MoneySerializer
{
    public function __construct(Currencies $currencies)
    {
        $formatter = new DecimalMoneyFormatter($currencies);
        $parser = new DecimalMoneyParser($currencies);

        parent::__construct($formatter, $parser);
    }
}
