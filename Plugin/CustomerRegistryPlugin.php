<?php
declare(strict_types=1);

namespace StorefrontX\SfxStoreConfig\Plugin;

use Magento\Customer\Model\CustomerRegistry;
use Magento\Customer\Model\Customer;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\StoreManagerInterface;

class CustomerRegistryPlugin
{
    private StoreManagerInterface $storeManager;

    public function __construct(
        StoreManagerInterface $storeManager
    ) {
        $this->storeManager = $storeManager;
    }

    /**
     *
     * @param CustomerRegistry $subject
     * @param Customer $result
     * @param string|null $websiteId Optional website ID, if not set, will use the current websiteId
     * @return Customer
     * @throws NoSuchEntityException
     */
    public function afterRetrieveByEmail(
        CustomerRegistry $subject,
        Customer         $result,
        ?string          $websiteId
    ): Customer {
        if ($storeId = $this->storeManager->getStore()->getId()) {
            $result->setData("store_id", $storeId);
        }
        return $result;
    }
}
