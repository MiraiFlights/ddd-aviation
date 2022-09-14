<?php declare(strict_types=1);

namespace ddd\aviation\values;

final class TimezoneExtended
{
    private int $gmtOffset;

    private ?int $dstStart = null;
    private ?int $dstEnd = null;

    /**
     * TimezoneExtended constructor.
     * Todo: array of dst
     * @param int $gmtOffset
     */
    public function __construct(int $gmtOffset)
    {
        $this->gmtOffset = $gmtOffset;
    }

    /**
     * @return int
     */
    public function getGmtOffset(): int
    {
        return $this->gmtOffset;
    }

    /**
     * @return int|null
     */
    public function getDstStart(): ?int
    {
        return $this->dstStart;
    }

    /**
     * @param int|null $dstStart
     * @return TimezoneExtended
     */
    public function setDstStart(?int $dstStart): TimezoneExtended
    {
        $this->dstStart = $dstStart;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDstEnd(): ?int
    {
        return $this->dstEnd;
    }

    /**
     * @param int|null $dstEnd
     * @return TimezoneExtended
     */
    public function setDstEnd(?int $dstEnd): TimezoneExtended
    {
        $this->dstEnd = $dstEnd;
        return $this;
    }
}
