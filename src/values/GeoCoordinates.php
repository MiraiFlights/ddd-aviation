<?php declare(strict_types=1);

namespace ddd\aviation\values;

use Webmozart\Assert\Assert;

class GeoCoordinates
{
    private float $latitude;
    private float $longitude;

    /**
     * GeoCoordinates constructor.
     * @param float $latitude
     * @param float $longitude
     */
    public function __construct(float $latitude, float $longitude)
    {
        Assert::float($latitude, 'INVALID_LATITUDE');
        Assert::float($longitude, 'INVALID_LONGITUDE');

        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }
}