<?php declare(strict_types=1);

namespace ddd\aviation\values;

use ddd\domain\values\AbstractDomainValue;
use Webmozart\Assert\Assert;

final class RouteFuelStops extends AbstractDomainValue
{
    private int $value;

    /**
     * RouteFuelStops constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
        Assert::greaterThanEq($value, 0, 'INVALID_FUEL_STOPS');

        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}