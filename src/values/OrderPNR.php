<?php declare(strict_types=1);

namespace ddd\aviation\values;

use ddd\domain\values\AbstractDomainValue;
use Webmozart\Assert\Assert;

final class OrderPNR extends AbstractDomainValue
{
    public const LENGTH = 6;

    private string $value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        Assert::length($value, self::LENGTH, 'INVALID_PNR');
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
