<?php
declare(strict_types=1);

namespace StorefrontX\SfxStoreConfig\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use StorefrontX\SfxStoreConfig\Api\SfxStoreConfigInterface;

/**
 * SFX fields in store config
 */
class SfxStoreConfigFields implements SfxStoreConfigInterface
{
    private const SFX_URL = 'web/sfx/sfx_base_url';

    private ScopeConfigInterface $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Get media URL format for catalog images
     *
     * @param null|int|string $scopeCode
     * @return string
     */
    public function getSfxUrl($scopeCode = null): string
    {
        $value = $this->scopeConfig->getValue(
            self::SFX_URL,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $scopeCode
        );

        return (string)$value;
    }
}
