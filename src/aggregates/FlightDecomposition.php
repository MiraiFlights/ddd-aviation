<?php declare(strict_types=1);

namespace ddd\aviation\aggregates;

use ddd\aviation\interfaces\AircraftInterface;
use ddd\aviation\interfaces\TimeConvertableInterface;

class FlightDecomposition
{
    private Route $route;
    private AircraftInterface $aircraft;
    private \DateTimeInterface $departureDate;

    private ?TimeConvertableInterface $parkingInterval;

    public function __construct(Route $route, AircraftInterface $aircraft, \DateTimeInterface $departureDate)
    {
        $this->route = $route;
        $this->aircraft = $aircraft;
        $this->departureDate = $departureDate;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->route->isEmpty();
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDepartureDate(): \DateTimeInterface
    {
        return $this->departureDate;
    }

    /**
     * @return AircraftInterface
     */
    public function getAircraft(): AircraftInterface
    {
        return $this->aircraft;
    }

    /**
     * @return Route
     */
    public function getRoute(): Route
    {
        return $this->route;
    }

    /**
     * @return TimeConvertableInterface|null
     */
    public function getParkingInterval(): ?TimeConvertableInterface
    {
        return $this->parkingInterval;
    }

    /**
     * @param TimeConvertableInterface|null $parkingInterval
     * @return FlightDecomposition
     */
    public function setParkingInterval(?TimeConvertableInterface $parkingInterval): FlightDecomposition
    {
        $this->parkingInterval = $parkingInterval;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getArrivalDate(): \DateTimeInterface
    {
        return (clone $this->departureDate)
            ->add(new \DateInterval('PT' . $this->getRoute()->getTotalTime()->inSeconds() . 'S'));
    }
}