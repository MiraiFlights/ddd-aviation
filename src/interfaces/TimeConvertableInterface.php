<?php declare(strict_types=1);

namespace ddd\aviation\interfaces;

interface TimeConvertableInterface
{
    public function inSeconds(): int;

    public function inMinutes(): float;

    public function inHours(): float;

    public function asString(): string;

    public static function fromSeconds(int $value): self;

    public static function fromMinutes(float $value): self;

    public static function fromHours(float $value): self;

    public static function fromString(string $value): self;
}