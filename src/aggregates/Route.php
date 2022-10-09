<?php declare(strict_types=1);

namespace ddd\aviation\aggregates;

use ddd\aviation\interfaces\TimeConvertableInterface;
use ddd\aviation\values;

/**
 * @deprecated move to adapter
 */
class Route implements \JsonSerializable
{
    private values\ICAO $departureICAO;
    private values\ICAO $arrivalICAO;
    private values\Pax $pax;
    private values\Luggage $luggage;
    private values\RouteFuelStops $fuelStops;

    private ?TimeConvertableInterface $airwayTime = null;
    private ?TimeConvertableInterface $refuelTime = null;
    private array $countriesOnTheWay = [];

    /**
     * Route constructor.
     * @param values\ICAO $departureICAO
     * @param values\ICAO $arrivalICAO
     * @param values\Pax $pax
     * @param values\Luggage $luggage
     */
    public function __construct(values\ICAO $departureICAO, values\ICAO $arrivalICAO, values\Pax $pax, values\Luggage $luggage)
    {
        $this->departureICAO = $departureICAO;
        $this->arrivalICAO = $arrivalICAO;
        $this->pax = $pax;
        $this->luggage = $luggage;

        $this->setFuelStops(new values\RouteFuelStops(0));
    }

    /**
     * @return values\ICAO
     */
    public function getDepartureICAO(): values\ICAO
    {
        return $this->departureICAO;
    }

    /**
     * @return values\ICAO
     */
    public function getArrivalICAO(): values\ICAO
    {
        return $this->arrivalICAO;
    }

    /**
     * @return values\Pax
     */
    public function getPax(): values\Pax
    {
        return $this->pax;
    }

    /**
     * @param values\Pax $pax
     * @return Route
     */
    public function setPax(values\Pax $pax): Route
    {
        $this->pax = $pax;
        return $this;
    }

    /**
     * @return values\Luggage
     */
    public function getLuggage(): values\Luggage
    {
        return $this->luggage;
    }

    /**
     * @param values\Luggage $luggage
     * @return Route
     */
    public function setLuggage(values\Luggage $luggage): Route
    {
        $this->luggage = $luggage;
        return $this;
    }

    /**
     * @return values\RouteFuelStops
     */
    public function getFuelStops(): values\RouteFuelStops
    {
        return $this->fuelStops;
    }

    /**
     * @param values\RouteFuelStops $fuelStops
     * @return Route
     */
    public function setFuelStops(values\RouteFuelStops $fuelStops): Route
    {
        $this->fuelStops = $fuelStops;
        return $this;
    }

    /**
     * @return TimeConvertableInterface|null
     */
    public function getAirwayTime(): ?TimeConvertableInterface
    {
        return $this->airwayTime;
    }

    /**
     * @param TimeConvertableInterface|null $airwayTime
     * @return Route
     */
    public function setAirwayTime(?TimeConvertableInterface $airwayTime): Route
    {
        $this->airwayTime = $airwayTime;
        return $this;
    }

    /**
     * @return TimeConvertableInterface|null
     */
    public function getRefuelTime(): ?TimeConvertableInterface
    {
        return $this->refuelTime;
    }

    /**
     * @param TimeConvertableInterface|null $refuelTime
     * @return Route
     */
    public function setRefuelTime(?TimeConvertableInterface $refuelTime): Route
    {
        $this->refuelTime = $refuelTime;
        return $this;
    }

    /**
     * @return values\AirwayTime
     */
    public function getTotalTime(): values\AirwayTime
    {
        return values\AirwayTime::fromHours(
            $this->airwayTime->inHours() + $this->refuelTime->inHours()
        );
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->getPax()->getValue() === 0;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'departureICAO' => $this->getDepartureICAO()->getValue(),
            'arrivalICAO' => $this->getArrivalICAO()->getValue(),
            'pax' => $this->getPax()->getValue(),
            'luggage' => $this->getLuggage()->getValue(),
            'fuelStops' => $this->getFuelStops()->getValue(),
            'airwayTime' => $this->getAirwayTime() ? $this->getAirwayTime()->inHours() : null,
            'refuelTime' => $this->getRefuelTime() ? $this->getRefuelTime()->inHours() : null,
        ];
    }

    /**
     * @return array
     */
    public function getCountriesOnTheWay(): array
    {
        return $this->countriesOnTheWay;
    }

    /**
     * @param array $countriesOnTheWay
     * @return Route
     */
    public function setCountriesOnTheWay(array $countriesOnTheWay): Route
    {
        $this->countriesOnTheWay = $countriesOnTheWay;
        return $this;
    }
}
