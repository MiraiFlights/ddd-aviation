<?php declare(strict_types=1);

namespace ddd\aviation\values;

class Flight
{
    private ICAO $departureICAO;
    private ICAO $arrivalICAO;
    private Pax $pax;
    private Luggage $luggage;
    private \DateTimeInterface $date;

    /**
     * Flight constructor.
     * @param ICAO $departureICAO
     * @param ICAO $arrivalICAO
     * @param Pax $pax
     * @param Luggage $luggage
     * @param \DateTimeInterface $date
     */
    public function __construct(ICAO $departureICAO, ICAO $arrivalICAO, Pax $pax, Luggage $luggage, \DateTimeInterface $date)
    {
        $this->departureICAO = $departureICAO;
        $this->arrivalICAO = $arrivalICAO;
        $this->pax = $pax;
        $this->luggage = $luggage;
        $this->date = $date;
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
     * @return \DateTimeInterface
     */
    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @return Luggage
     */
    public function getLuggage(): Luggage
    {
        return $this->luggage;
    }
}
