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

class Phoenix_BankPayment_Model_BankPayment extends Mage_Payment_Model_Method_Abstract
{
    /**
     * unique internal payment method identifier
     *
     * @var string [a-z0-9_]
     */
    protected $_code = 'bankpayment';

    protected $_formBlockType = 'bankpayment/form';
    protected $_infoBlockType = 'bankpayment/info';
    protected $_accounts;
    protected $_storeId = null;

    protected $_canCapture                  = true;
    protected $_canCapturePartial           = true;

    /**
     * @return string|null
     */
    public function getAccountHolder()
    {
        if ($accounts = $this->getAccounts()) {
            return $accounts[0]->getAccountHolder();
        }
        return null;
    }

    /**
     * @return string|null
     */
    public function getBankName()
    {
        if ($accounts = $this->getAccounts()) {
            return $accounts[0]->getBankName();
        }
        return null;
    }

    /**
     * @return string|null
     */
    public function getIBAN()
    {
        if ($accounts = $this->getAccounts()) {
            return $accounts[0]->getIBAN();
        }
        return null;
    }

    /**
     * @return string|null
     */
    public function getBIC()
    {
        if ($accounts = $this->getAccounts()) {
            return $accounts[0]->getBIC();
        }
        return null;
    }

    /**
     * @return string|null
     */
    public function getAccountNumber()
    {
        if ($accounts = $this->getAccounts()) {
            return $accounts[0]->getAccountNumber();
        }
        return null;
    }

    /**
     * @return string|null
     */
    public function getSortCode()
    {
        if ($accounts = $this->getAccounts()) {
            return $accounts[0]->getSortCode();
        }
        return null;
    }

    /**
     * @return string|null
     */
    public function getCurrencies()
    {
        if ($accounts = $this->getAccounts()) {
            return $accounts[0]->getCurrencies();
        }
        return null;
    }

    /**
     * @return string|null
     */
    public function getPayWithinXDays()
    {
        return $this->getConfigData('paywithinxdays', $this->getStoreId());
    }

    /**
     * @param bool $addNl2Br
     * @return mixed|string
     */
    public function getCustomText($addNl2Br = true)
    {
        $customText = $this->getConfigData('customtext', $this->getStoreId());
        if ($addNl2Br) {
            $customText = nl2br($customText);
        }
        return $customText;
    }

    /**
     * get the correct store id
     *
     * @return int
     */
    protected function getStoreId()
    {
        $paymentInfo = $this->getInfoInstance();
        if ($currentOrder = Mage::registry('current_order')) {
            $this->_storeId = $currentOrder->getStoreId();
        } elseif ($paymentInfo instanceof Mage_Sales_Model_Order_Payment) {
            $this->_storeId = $paymentInfo->getOrder()->getStoreId();
        }
        return $this->_storeId;
    }

    /**
     * @return array
     */
    public function getAccounts()
    {
        if (!$this->_accounts) {
            $accounts = unserialize($this->getConfigData('bank_accounts', $this->getStoreId()));
            $this->_accounts = array();
            $fields = is_array($accounts) ? array_keys($accounts) : null;
            if (!empty($fields)) {
                foreach ($accounts[$fields[0]] as $i => $k) {
                    if ($k) {
                        $account = new Varien_Object();
                        foreach ($fields as $field) {
                            $account->setData($field, $accounts[$field][$i]);
                        }
                        $this->_accounts[] = $account;
                    }
                }
            }
        }
        return $this->_accounts;
    }
}
