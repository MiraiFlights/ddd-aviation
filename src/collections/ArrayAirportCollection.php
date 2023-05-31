<?php

namespace ddd\aviation\collections;

use ddd\aviation\interfaces\AirportCollectionInterface;
use ddd\aviation\values\AirportICAO;

class ArrayAirportCollection implements AirportCollectionInterface
{
    /**
     * @var string[]
     */
    private $icaoArray = [];

    /**
     * @param string[] $icaoArray
     */
    public function __construct(array $icaoArray)
    {
        $this->icaoArray = $icaoArray;
    }

    public function has(AirportICAO $airportICAO): bool
    {
        return in_array($airportICAO->getValue(), $this->icaoArray);
    }

    public function asArray(): array
    {
        return $this->icaoArray;
    }
}
