<?php declare(strict_types=1);

namespace ddd\aviation\values;

use ddd\domain\values\AbstractDomainValue;
use Webmozart\Assert\Assert;

final class Speed extends AbstractDomainValue
{
    private int $value;

    /**
     * Speed constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
        Assert::greaterThan($value, 0, 'INVALID_SPEED');

        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}