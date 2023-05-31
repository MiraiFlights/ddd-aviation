<?php

namespace ddd\aviation\interfaces;

use ddd\aviation\values\AirportICAO;

interface AirportCollectionInterface
{
    /**
     * @param AirportICAO $airportICAO
     * @return bool
     */
    public function has(AirportICAO $airportICAO): bool;

    /**
     * @return string[]
     */
    public function asArray(): array;
}
