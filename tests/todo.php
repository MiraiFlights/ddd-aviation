<?php

use ddd\aviation\values\AirwayTime;
class AirwayTimeTest
{
    public function testWholeMinutesSurviveLossyStorage(): void
    {
        for ($m = 1; $m <= 24 * 60; $m++) {
            $exact = $m * 60;
            $stored = [
                $exact / 3600,                                  // double
                unpack('g', pack('g', $exact / 3600))[1],       // MySQL FLOAT
                (float)sprintf('%.6g', $exact / 3600),         // MariaDB FLOAT text
                round($exact / 3600, 4),                        // decimal(10,4)
            ];
            foreach ($stored as $hours) {
                $this->assertSame($exact, AirwayTime::fromHours($hours)->inSeconds(), "{$m} min from {$hours}");
            }
        }
    }
}
