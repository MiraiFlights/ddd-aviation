<?php declare(strict_types=1);

namespace ddd\aviation\values;

use ddd\domain\values\AbstractDomainValue;
use Webmozart\Assert\Assert;

final class CountryISO2 extends AbstractDomainValue
{
    private string $value;

    /**
     * CountryISO2 constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        Assert::string($value, 'INVALID_ISO2');
        Assert::length($value, 2, 'INVALID_ISO2');

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