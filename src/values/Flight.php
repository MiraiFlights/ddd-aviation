<?php declare(strict_types=1);

namespace ddd\aviation\values;

class Flight
{
    private ICAO $departureICAO;
    private ICAO $arrivalICAO;
    private Pax $pax;
    private Luggage $luggage;
    private \DateTimeInterface $departureDate;

    private ?\DateTimeInterface $arrivalDate = null;
    private ?AirwayTime $airwayTime = null;

    /**
     * Flight constructor.
     * @param ICAO $departureICAO
     * @param ICAO $arrivalICAO
     * @param Pax $pax
     * @param Luggage $luggage
     * @param \DateTimeInterface $departureDate
     */
    public function __construct(ICAO $departureICAO, ICAO $arrivalICAO, Pax $pax, Luggage $luggage, \DateTimeInterface $departureDate)
    {
        $this->departureICAO = $departureICAO;
        $this->arrivalICAO = $arrivalICAO;
        $this->pax = $pax;
        $this->luggage = $luggage;
        $this->departureDate = $departureDate;
    }

    /**
     * @return ICAO
     */
    public function getDepartureICAO(): ICAO
    {
        return $this->departureICAO;
    }

    /**
     * @return ICAO
     */
    public function getArrivalICAO(): ICAO
    {
        return $this->arrivalICAO;
    }

    /**
     * @return Pax
     */
    public function getPax(): Pax
    {
        return $this->pax;
    }

    /**
     * @return Luggage
     */
    public function getLuggage(): Luggage
    {
        return $this->luggage;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDepartureDate(): \DateTimeInterface
    {
        return $this->departureDate;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getArrivalDate(): ?\DateTimeInterface
    {
        return $this->arrivalDate;
    }

    /**
     * @return AirwayTime|null
     */
    public function getAirwayTime(): ?AirwayTime
    {
        return $this->airwayTime;
    }

    /**
     * @param \DateTimeInterface|null $arrivalDate
     * @return Flight
     */
    public function setArrivalDate(?\DateTimeInterface $arrivalDate): Flight
    {
        $this->arrivalDate = $arrivalDate;
        return $this;
    }

    /**
     * @param AirwayTime|null $airwayTime
     * @return Flight
     */
    public function setAirwayTime(?AirwayTime $airwayTime): Flight
    {
        $this->airwayTime = $airwayTime;
        return $this;
    }
}
