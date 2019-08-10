<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category   Phoenix
 * @package    Phoenix_BankPayment
 *
 * @author     Achim Rosenhagen <a.rosenhagen@ffuenf.de>
 * @copyright  Copyright (c) 2015 ffuenf (http://www.ffuenf.de)
 * @license    http://opensource.org/licenses/mit-license.php MIT License
 */

class Phoenix_BankPayment_Helper_Core extends Mage_Core_Helper_Abstract {

    /**
     * Get a store flag value and set to against the object.
     *
     * @param string $sStoreFlagPath
     * @param string $sStoreFlagAttribute
     *
     * @return bool
     */
    public function getStoreFlag($sStoreFlagPath, $sStoreFlagAttribute) {
        return (bool) $this->getStoreConfig($sStoreFlagPath, $sStoreFlagAttribute);
    }

    /**
     * Get a store config value and set against the object.
     *
     * @param string $sStoreConfigPath
     * @param string $sStoreConfigAttribute
     *
     * @return string
     */
    public function getStoreConfig($sStoreConfigPath, $sStoreConfigAttribute) {
        if ($this->$sStoreConfigAttribute === null) {
            $this->$sStoreConfigAttribute = Mage::getStoreConfig($sStoreConfigPath);
        }
        return $this->$sStoreConfigAttribute;
    }
}