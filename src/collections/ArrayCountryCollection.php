<?php declare(strict_types=1);

namespace ddd\aviation\collections;

use ddd\aviation\interfaces\CountryCollectionInterface;
use ddd\aviation\values\CountryISO3;

class ArrayCountryCollection implements CountryCollectionInterface
{
    protected array $iso3s = [];

    /**
     * @param array $iso3s
     */
    public function __construct(array $iso3s)
    {
        $this->iso3s = $iso3s;
    }

    /**
     * @param CountryISO3 $countryISO3
     * @return bool
     */
    public function has(CountryISO3 $countryISO3): bool
    {
        return in_array($countryISO3->getValue(), $this->iso3s);
    }

    /**
     * @return string[]
     */
    public function asArray(): array
    {
        return $this->iso3s;
    }
}