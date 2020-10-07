<?php

declare(strict_types=1);

namespace TTBooking\MoneySerializer\Serializers;

use Money\Currencies\ISOCurrencies;
use Money\Formatter\DecimalMoneyFormatter;
use Money\Parser\DecimalMoneyParser;

class DecimalMoneySerializer extends MoneySerializer
{
    public function __construct()
    {
        $currencies = new ISOCurrencies;
        $formatter = new DecimalMoneyFormatter($currencies);
        $parser = new DecimalMoneyParser($currencies);

        parent::__construct($formatter, $parser);
    }
}
