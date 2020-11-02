<?php declare(strict_types=1);

namespace ddd\aviation\values;

use ddd\domain\values\AbstractDomainValue;

final class AirwayTime extends AbstractDomainValue implements TimeConvertableInterface
{
    private float $value;

    /**
     * AirwayTime constructor.
     * @param float $value
     */
    public function __construct(float $value)
    {
        $this->value = $value;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    public function inSeconds(): int
    {
        return intval($this->value * 60 * 60);
    }

    public function inMinutes(): float
    {
        return $this->value * 60;
    }

    public function inHours(): float
    {
        return $this->value;
    }

    public static function fromSeconds(int $value): self
    {
        return new self($value / 60 / 60);
    }

    public static function fromMinutes(float $value): self
    {
        return new self($value / 60);
    }

    public static function fromHours(float $value): self
    {
        return new self($value);
    }
}
