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
 */

class Phoenix_BankPayment_Block_Form extends Mage_Payment_Block_Form
{
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('phoenix/bankpayment/form.phtml');
    }

    /**
     * @return string
     */
    public function getCustomFormBlockType()
    {
        return $this->getMethod()->getConfigData('form_block_type');
    }

    /**
     * @return string
     */
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

    /**
     * @return array
     */
    public function getAccounts()
    {
        return $this->getMethod()->getAccounts();
    }

    /**
     * @param boolean $addNl2Br
     * @return string
     */
    public function getCustomText($addNl2Br = true)
    {
        return $this->getMethod()->getCustomText($addNl2Br);
    }
}
