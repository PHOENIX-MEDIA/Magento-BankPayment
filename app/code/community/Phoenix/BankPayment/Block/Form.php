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
 * @copyright  Copyright (c) 2010 Phoenix Medien GmbH & Co. KG (http://www.phoenix-medien.de)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Phoenix_BankPayment_Block_Form extends Mage_Payment_Block_Form
{
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('bankpayment/form.phtml');
    }

    public function getCustomFormBlockType()
    {
        return $this->getMethod()->getConfigData('form_block_type');
    }

    public function getFormCmsUrl()
    {
        $pageUrl = null;
        $pageCode = $this->getMethod()->getConfigData('form_cms_page');
        if (!empty($pageCode)) {
            if ($pageId = Mage::getModel('cms/page')->checkIdentifier($pageCode, Mage::app()->getStore()->getId())) {
                $pageUrl = Mage::helper('cms/page')->getPageUrl($pageId);
            }
        }
        return $pageUrl;
    }

    public function getAccounts()
    {
        return $this->getMethod()->getAccounts();
    }

    public function getCustomText($addNl2Br = true)
    {
        return $this->getMethod()->getCustomText($addNl2Br);
    }
}
