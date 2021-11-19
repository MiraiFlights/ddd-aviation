<?php declare(strict_types=1);

namespace ddd\aviation\aggregates;

use ddd\aviation\interfaces\AircraftInterface;
use ddd\aviation\interfaces\TimeConvertableInterface;
use ddd\aviation\values\AircraftServiceTime;
use ddd\aviation\exceptions\RouteNotFoundException;

class FlightDecomposition implements \JsonSerializable
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

    /**
     * @param Route $route
     * @param AircraftInterface $aircraft
     * @param \DateTimeInterface $date
     * @param \DateTimeInterface|null $nextFlightDate
     * @return FlightDecomposition
     */
    public static function create(
        Route               $route,
        AircraftInterface   $aircraft,
        \DateTimeInterface  $date,
        ?\DateTimeInterface $nextFlightDate = null
    ): self
    {
        $result = new self(
            $route,
            $aircraft,
            $date
        );

        if (null !== $nextFlightDate) {
            $allInSeconds = $nextFlightDate->getTimestamp() - $date->getTimestamp();
            $routeInSeconds = $route->getTotalTime()->inSeconds();
            $parkingInSeconds = $allInSeconds - $routeInSeconds;

            if ($parkingInSeconds < $aircraft->getProperties()->getMinGroundTime()->inSeconds())
                throw new RouteNotFoundException('FLIGHT_NOT_ALLOWED_BY_TIME_GAP');

            $result->setParkingInterval(AircraftServiceTime::fromSeconds($parkingInSeconds));
        } else {
            if (
                $aircraft->getProperties()->isReturnToHome()
                && !$aircraft->getProperties()->getHomeICAO()->isEqualTo($route->getArrivalICAO())
            ) {
                $result->setParkingInterval($aircraft->getProperties()->getMinGroundTime());
            } else {
                $result->setParkingInterval(AircraftServiceTime::fromMinutes(0));
            }
        }

        return $result;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'route' => $this->getRoute(),
            'aircraft' => $this->getAircraft(),
            'departureDate' => $this->getDepartureDate()->format('Y-m-d H:i:s'),
            'parkingInterval' => $this->getParkingInterval() ? $this->getParkingInterval()->asString() : null,
        ];
    }
}