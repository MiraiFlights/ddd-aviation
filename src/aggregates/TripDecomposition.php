<?php declare(strict_types=1);

namespace ddd\aviation\aggregates;

use ddd\aviation\interfaces\AircraftInterface;

class TripDecomposition implements \JsonSerializable
{
    /** @var FlightDecomposition[] */
    private array $flights = [];

    private ?AircraftInterface $aircraft = null;

    public function __construct(array $flights = [])
    {
        $this->flights = $flights;
    }

    public function addFlight(?FlightDecomposition $flight): self
    {
        if (null === $flight)
            return $this;

        $this->flights[] = $flight;
        return $this;
    }

    /**
     * @return FlightDecomposition[]
     */
    public function getFlights(): array
    {
        return $this->flights;
    }

    /**
     * @return AircraftInterface|null
     */
    public function getAircraft(): ?AircraftInterface
    {
        return $this->aircraft;
    }

    /**
     * @param AircraftInterface|null $aircraft
     * @return TripDecomposition
     */
    public function setAircraft(?AircraftInterface $aircraft): TripDecomposition
    {
        $this->aircraft = $aircraft;
        return $this;
    }

    /**
     * @return FlightDecomposition[]
     */
    public function getEmptyFlights(): array
    {
        return array_values(
            array_filter($this->flights, fn(FlightDecomposition $flight) => $flight->isEmpty())
        );
    }

    /**
     * @return FlightDecomposition[]
     */
    public function getFerryFlights(): array
    {
        return array_values(
            array_filter($this->flights, fn(FlightDecomposition $flight) => !$flight->isEmpty())
        );
    }

    /**
     * возвратный это A-B-A
     * все остальное - oneway
     * @return bool
     */
    public function isOneway(): bool
    {
        $legs = $this->getFerryFlights();
        if (count($legs) != 2)
            return true;

        return !$legs[0]->getRoute()->getDepartureICAO()->isEqualTo(
            $legs[1]->getRoute()->getArrivalICAO()
        );
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'flights' => $this->getFlights(),
            'aircraft' => $this->getAircraft(),
        ];
    }
}

