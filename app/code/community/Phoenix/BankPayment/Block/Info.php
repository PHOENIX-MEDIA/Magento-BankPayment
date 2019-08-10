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
 * @copyright  Copyright (c) 2008-2009 Andrej Sinicyn, Mik3e
 * @copyright  Copyright (c) 2010-2016 Phoenix Medien GmbH & Co. KG (http://www.phoenix-medien.de)
 * @copyright  Copyright (c) 2017-2018 Phoenix Media GmbH & Co. KG (http://www.phoenix-media.eu)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Phoenix_BankPayment_Block_Info extends Mage_Payment_Block_Info
{
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('phoenix/bankpayment/info.phtml');
    }

    /**
     * @return string
     */
    public function toPdf()
    {
        $this->setTemplate('phoenix/bankpayment/pdf/info.phtml');
        return $this->toHtml();
    }

    /**
     * @return array
     */
    public function getAccounts() {
        return $this->getMethod()->getAccounts();
    }

    /**
     * @return string
     */
    public function getShowBankAccountsInPdf() {
        return $this->getMethod()->getConfigData('show_bank_accounts_in_pdf');
    }

    /**
     * @return string
     */
    public function getShowCustomTextInPdf() {
        return $this->getMethod()->getConfigData('show_customtext_in_pdf');
    }
}
