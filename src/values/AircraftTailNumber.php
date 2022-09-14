<?php declare(strict_types=1);

namespace ddd\aviation\values;

use ddd\domain\values\AbstractDomainValue;

final class AircraftTailNumber extends AbstractDomainValue
{
    private string $value;

    /**
     * AircraftTailNumber constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}