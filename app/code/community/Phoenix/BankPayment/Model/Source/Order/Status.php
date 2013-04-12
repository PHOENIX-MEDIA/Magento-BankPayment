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
 * @copyright  Copyright (c) 2010 Phoenix Medien GmbH & Co. KG (http://www.phoenix-medien.de)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Phoenix_BankPayment_Model_Source_Order_Status extends Mage_Adminhtml_Model_System_Config_Source_Order_Status
{
    public function __construct()
    {
        if (version_compare(Mage::getVersion(), '1.4.0', '>=')) {
            $this->_stateStatuses[] = Mage_Sales_Model_Order::STATE_PENDING_PAYMENT;
        }
        return $this;
    }

}