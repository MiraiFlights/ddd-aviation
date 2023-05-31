<?php

namespace ddd\aviation\collections;

use ddd\aviation\interfaces\AirportCollectionInterface;
use ddd\aviation\values\ICAO;

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

    public function has(ICAO $icao): bool
    {
        return in_array($icao->getValue(), $this->icaoArray);
    }

    public function asArray(): array
    {
        return $this->icaoArray;
    }
}
