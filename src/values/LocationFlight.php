<?php declare(strict_types=1);

namespace ddd\aviation\values;

use ddd\aviation\interfaces\LocationSelectorInterface;

final class LocationFlight
{
    private LocationSelectorInterface $departure;
    private LocationSelectorInterface $arrival;
    private Pax $pax;
    private Luggage $luggage;
    private \DateTimeInterface $departureDate;

    public function __construct(
        LocationSelectorInterface $departure,
        LocationSelectorInterface $arrival,
        Pax $pax,
        Luggage $luggage,
        \DateTimeInterface $departureDate
    )
    {
        $this->departure = $departure;
        $this->arrival = $arrival;
        $this->pax = $pax;
        $this->luggage = $luggage;
        $this->departureDate = $departureDate;
    }

    /**
     * @return LocationSelectorInterface
     */
    public function getDeparture(): LocationSelectorInterface
    {
        return $this->departure;
    }

    /**
     * @return LocationSelectorInterface
     */
    public function getArrival(): LocationSelectorInterface
    {
        return $this->arrival;
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
}
