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

class Phoenix_BankPayment_Model_Source_CmsPage extends Mage_Adminhtml_Model_System_Config_Source_Cms_Page
{
    public function toOptionArray()
    {
        if (!$this->_options) {
            parent::toOptionArray();
            array_unshift($this->_options, array(
                'value' => '',
                'label' => Mage::helper('core')->__('-- Please Select --'))
            );
        }
        return $this->_options;
    }
}