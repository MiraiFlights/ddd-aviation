<?php declare(strict_types=1);

namespace ddd\aviation\values;

use ddd\domain\values\AbstractDomainValue;

final class AircraftDimensions extends AbstractDomainValue
{
    const WIDTH_NAME = 'width';
    const HEIGHT_NAME = 'height';
    const LENGTH_NAME = 'length';

    /** @var float[] */
    private array $value = [];
    private float $default = 0;

    /**
     * @param array|float[] $values
     */
    public function __construct(array $values)
    {
        $this->value = $values;
    }

    public function getSize(string $size): ?float
    {
        if (array_key_exists($size, $this->value))
            return (float)$this->value[$size];

        return $this->default;
    }

    /**
     * @return string[]
     */
    public function getValue(): array
    {
        return $this->value;
    }
}