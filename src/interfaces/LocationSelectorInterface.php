<?php declare(strict_types=1);

namespace ddd\aviation\interfaces;

use ddd\aviation\values\TimezoneExtended;
use ddd\i18n\values\MultiLanguageString;

interface LocationSelectorInterface
{
    /**
     * @return mixed
     */
    public function asSelector();

    /**
     * @return MultiLanguageString
     */
    public function getName(): MultiLanguageString;

    /**
     * @return TimezoneExtended
     */
    public function getTimezone(): TimezoneExtended;
}