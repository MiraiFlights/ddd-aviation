<?php declare(strict_types=1);

namespace ddd\aviation\values;

use ddd\domain\values\AbstractDomainValue;
use Webmozart\Assert\Assert;

final class CountryISO3 extends AbstractDomainValue
{
    private string $value;

    /**
     * CountryISO3 constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        Assert::string($value, 'INVALID_ISO3');
        Assert::length($value, 3, 'INVALID_ISO3');

        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}