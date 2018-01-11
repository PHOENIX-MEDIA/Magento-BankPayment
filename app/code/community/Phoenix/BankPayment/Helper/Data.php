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
 * @category   Mage
 * @package    Phoenix_BankPayment
 * @copyright  Copyright (c) 2008 Andrej Sinicyn
 * @copyright  Copyright (c) 2010-2018 Phoenix Media GmbH & Co. KG (http://www.phoenix-media.eu)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Phoenix_BankPayment_Helper_Data extends Mage_Core_Helper_Abstract {

    /**
     * @param Varien_Object $account
     * @return bool
     */
    public function displayFullAccountData($account) {
        return ($this->displaySepaAccountData($account) && $this->displayNonSepaAccountData($account));
    }

    /**
     * @param Varien_Object $account
     * @return bool
     */
    public function displayNonSepaAccountData($account) {
        return ($account->getAccountNumber() && $account->getSortCode());
    }

    /**
     * @param Varien_Object $account
     * @return bool
     */
    public function displaySepaAccountData($account) {
        return ($account->getIban());
    }
}