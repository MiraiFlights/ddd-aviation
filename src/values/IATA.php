<?php declare(strict_types=1);

namespace ddd\aviation\values;

use ddd\domain\values\AbstractDomainValue;
use Webmozart\Assert\Assert;

final class IATA extends AbstractDomainValue
{
    private string $value;

    /**
     * IATA constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        Assert::length($value, 3, 'INVALID_IATA');

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