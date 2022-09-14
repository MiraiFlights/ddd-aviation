<?php declare(strict_types=1);

namespace ddd\aviation\interfaces;

interface LocationSelectorFabricInterface
{
    /**
     * @param mixed $data
     * @return LocationSelectorInterface
     */
    public function fromSelector($data): LocationSelectorInterface;
}