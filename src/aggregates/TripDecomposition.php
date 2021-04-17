<?php declare(strict_types=1);

namespace ddd\aviation\aggregates;

class TripDecomposition
{
    /** @var FlightDecomposition[] */
    private array $flights = [];

    public function __construct(array $flights = [])
    {
        $this->flights = $flights;
    }

    public function addFlight(?FlightDecomposition $flight)
    {
        if (null === $flight)
            return;

        $this->flights[] = $flight;
    }

    /**
     * @return FlightDecomposition[]
     */
    public function getFlights(): array
    {
        return $this->flights;
    }
}

