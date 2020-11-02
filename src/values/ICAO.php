<?php declare(strict_types=1);

namespace ddd\aviation\values;

use ddd\domain\values\AbstractDomainValue;
use Webmozart\Assert\Assert;

final class ICAO extends AbstractDomainValue
{
    private string $value;

    /**
     * ICAO constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        Assert::length($value, 4, 'INVALID_ICAO');

        $this->value = mb_strtoupper($value);
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}