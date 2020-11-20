<?php declare(strict_types=1);

namespace ddd\aviation\values;

use ddd\aviation\interfaces\TimeConvertableInterface;
use ddd\domain\values\AbstractDomainValue;

final class AircraftServiceTime extends AbstractDomainValue implements TimeConvertableInterface
{
    private int $value;

    /**
     * AircraftServiceTime constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    public function inSeconds(): int
    {
        return $this->value * 60;
    }

    public function inMinutes(): float
    {
        return $this->value;
    }

    public function inHours(): float
    {
        return $this->value / 60;
    }

    public static function fromSeconds(int $value): self
    {
        return new self(intval($value / 60));

    }

    public static function fromMinutes(float $value): self
    {
        return new self(intval($value));
    }

    public static function fromHours(float $value): self
    {
        return new self(intval($value * 60));
    }

    public function asString(): string
    {
        $seconds = $this->inSeconds();
        return sprintf('%02d:%02d:%02d', ($seconds / 3600), ($seconds / 60 % 60), $seconds % 60);
    }

    public function fromString(string $value): self
    {
        $parts = explode(':', $value, 3);
        $seconds = ((int)$parts[0] * 60 + (int)$parts[1]) * 60 + (int)$parts[2];
        return self::fromSeconds($seconds);
    }
}