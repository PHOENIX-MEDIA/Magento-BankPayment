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
 * @copyright  Copyright (c) 2008-2009 Andrej Sinicyn
 * @copyright  Copyright (c) 2010-2016 Phoenix Medien GmbH & Co. KG (http://www.phoenix-medien.de)
 * @copyright  Copyright (c) 2017-2018 Phoenix Media GmbH & Co. KG (http://www.phoenix-media.eu)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *
 * @author     Achim Rosenhagen <a.rosenhagen@ffuenf.de>
 * @copyright  Copyright (c) 2015 ffuenf (http://www.ffuenf.de)
 * @license    http://opensource.org/licenses/mit-license.php MIT License
 */

class Phoenix_BankPayment_Helper_Data extends Phoenix_BankPayment_Helper_Core {

    const CONFIG_EXTENSION_ACTIVE = 'payment/bankpayment/enable';

    /**
     * Variable for if the extension is active.
     *
     * @var bool
     */
    protected $_bExtensionActive;

    /**
     * Check to see if the extension is active.
     *
     * @return bool
     */
    public function isExtensionActive() {
        return $this->getStoreFlag(self::CONFIG_EXTENSION_ACTIVE, '_bExtensionActive');
    }

    /**
     * @param Varien_Object $account, $quoteCurrencyCode
     * @return bool
     */
    public function displayAccountData($account, $quoteCurrencyCode) {
        $validCurrencyCode = ($quoteCurrencyCode != '') && in_array($quoteCurrencyCode, $_account->getCurrencies());
        $validAccountData = (this->displaySepaAccountData($account) || $this->displayNonSepaAccountData($account));
        return ($validCurrencyCode && $validAccountData);
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
        return ($account->getIban() && $account->getBic());
    }
}