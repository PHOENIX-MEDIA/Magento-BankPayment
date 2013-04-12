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
 * @copyright  Copyright (c)0 2008 Andrej Sinicyn
 * @copyright  Copyright (c) 2010 Phoenix Medien GmbH & Co. KG (http://www.phoenix-medien.de)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


class Phoenix_BankPayment_Block_Info extends Mage_Payment_Block_Info
{
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('bankpayment/info.phtml');
    }

    public function toPdf()
    {
        $this->setTemplate('bankpayment/pdf/info.phtml');
        return $this->toHtml();
    }

    public function getAccounts() {
        return $this->getMethod()->getAccounts();
    }

    public function getShowBankAccountsInPdf() {
        return $this->getMethod()->getConfigData('show_bank_accounts_in_pdf');
    }

    public function getShowCustomTextInPdf() {
        return $this->getMethod()->getConfigData('show_customtext_in_pdf');
    }
}
