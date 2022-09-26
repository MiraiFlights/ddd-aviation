<?php declare(strict_types=1);

namespace ddd\aviation\values;

use ddd\domain\values\AbstractDomainValue;

final class ManufacturerCode extends AbstractDomainValue
{
    private string $value;

    /**
     * ManufacturerCode constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = mb_strtoupper($value);
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}