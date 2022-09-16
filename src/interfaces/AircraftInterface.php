<?php declare(strict_types=1);

namespace ddd\aviation\interfaces;

/**
 * @deprecated move to adapter
 */
interface AircraftInterface
{
    public function getId();

    public function getProperties(): AircraftPropertiesInterface;
}