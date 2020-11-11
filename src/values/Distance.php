<?php declare(strict_types=1);

namespace ddd\aviation\values;

use ddd\domain\values\AbstractDomainValue;
use ddd\aviation\interfaces\DistanceConvertableInterface;

final class Distance extends AbstractDomainValue implements DistanceConvertableInterface
{
    // 1nm == 1852m == 1.852km
    public const NM_TO_KM = 1852 / 1000;
    public const NM_TO_M = 1852;
    public const M_TO_KM = 1 / 1000;
    public const M_TO_NM = 1 / 1852;
    public const KM_TO_M = 1000;
    public const KM_TO_NM = 1000 / 1852;

    private float $value;

    /**
     * Distance constructor.
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

    public function inKilometers(): float
    {
        return $this->value;
    }

    public function inMeters(): float
    {
        return $this->value * self::KM_TO_M;
    }

    public function inNauticalMiles(): float
    {
        return $this->value * self::KM_TO_NM;
    }

    public static function fromKilometers(float $value): self
    {
        return new self($value);
    }

    public static function fromMeters(float $value): self
    {
        return new self($value * self::M_TO_KM);
    }

    public static function fromNauticalMiles(float $value): self
    {
        return new self($value * self::NM_TO_KM);
    }
}