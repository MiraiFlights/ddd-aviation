<?php declare(strict_types=1);

namespace ddd\aviation\interfaces;

interface DistanceConvertableInterface
{
    public function inKilometers(): float;

    public function inMeters(): float;

    public function inNauticalMiles(): float;

    public static function fromKilometers(float $value): self;

    public static function fromMeters(float $value): self;

    public static function fromNauticalMiles(float $value): self;
}