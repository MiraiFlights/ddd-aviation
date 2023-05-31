<?php

namespace ddd\aviation\values;

use ddd\domain\values\AbstractDomainValue;
use Webmozart\Assert\Assert;

class AirportICAO extends AbstractDomainValue
{
    private const INVALID_MESSAGE = 'INVALID_ICAO';
    private string $value;

    public function __construct(string $value)
    {
        Assert::string($value, self::INVALID_MESSAGE);
        Assert::length($this->value, 4, self::INVALID_MESSAGE);

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
