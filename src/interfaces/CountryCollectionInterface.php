<?php declare(strict_types=1);

namespace ddd\aviation\interfaces;

use ddd\aviation\values\CountryISO3;

interface CountryCollectionInterface
{
    /**
     * @param CountryISO3 $countryISO3
     * @return bool
     */
    public function has(CountryISO3 $countryISO3): bool;

    /**
     * @return string[]
     */
    public function asArray(): array;
}