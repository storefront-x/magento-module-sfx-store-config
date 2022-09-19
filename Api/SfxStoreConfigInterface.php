<?php

namespace StorefrontX\SfxStoreConfig\Api;

use Magento\Framework\App\Config\ScopeConfigInterface;

interface SfxStoreConfigInterface
{
    /**
     * Retrieve SFX URL value by scope.
     *
     * @param null|int|string $scopeCode
     * @return string
     */
    public function getSfxUrl($scopeCode = null):string;
}
