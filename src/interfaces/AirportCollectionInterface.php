<?php

namespace ddd\aviation\interfaces;

use ddd\aviation\values\ICAO;

interface AirportCollectionInterface
{
    /**
     * @param ICAO $icao
     * @return bool
     */
    public function has(ICAO $icao): bool;

    /**
     * @return string[]
     */
    public function asArray(): array;
}
