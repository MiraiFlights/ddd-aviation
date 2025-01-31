<?php declare(strict_types=1);

namespace ddd\aviation\interfaces;

use ddd\aviation\values\AircraftServiceTime;
use ddd\aviation\values\ICAO;
use ddd\aviation\values\Pax;

/**
 * @deprecated move to adapter
 */
interface AircraftPropertiesInterface
{
    public function getCapacity(): Pax;
    public function getHomeICAO(): ?ICAO;
    public function getMinGroundTime(): AircraftServiceTime;
    public function isReturnToHome(): bool;
}