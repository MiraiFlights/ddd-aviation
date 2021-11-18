<?php declare(strict_types=1);

namespace ddd\aviation\interfaces;

use ddd\aviation\values\ICAO;
use ddd\aviation\values\Pax;

interface AircraftPropertiesInterface
{
    public function getCapacity(): Pax;
    public function getHomeICAO(): ?ICAO;
}