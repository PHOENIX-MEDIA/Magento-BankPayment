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
$installer = $this;

$installer->startSetup();

/**
 * Convert existing bank account data of default configuration scope to config array
 */
$accountData = array(
    'account_holder' => array('', $installer->getConnection()->fetchOne("select value from ".$installer->getTable('core/config_data')." where scope='default' and path='payment/bankpayment/bankaccountholder'")),
    'account_number' => array('', $installer->getConnection()->fetchOne("select value from ".$installer->getTable('core/config_data')." where scope='default' and path='payment/bankpayment/bankaccountnumber'")),
    'sort_code'      => array('', $installer->getConnection()->fetchOne("select value from ".$installer->getTable('core/config_data')." where scope='default' and path='payment/bankpayment/sortcode'")),
    'iban'           => array('', $installer->getConnection()->fetchOne("select value from ".$installer->getTable('core/config_data')." where scope='default' and path='payment/bankpayment/bankiban'")),
    'bank_name'      => array('', $installer->getConnection()->fetchOne("select value from ".$installer->getTable('core/config_data')." where scope='default' and path='payment/bankpayment/bankname'")),
    'bic'            => array('', $installer->getConnection()->fetchOne("select value from ".$installer->getTable('core/config_data')." where scope='default' and path='payment/bankpayment/bankbic'"))
);
$installer->setConfigData('payment/bankpayment/bank_accounts', serialize($accountData));

// remove old account settings
$installer->deleteConfigData('payment/bankpayment/bankaccountholder');
$installer->deleteConfigData('payment/bankpayment/bankaccountnumber');
$installer->deleteConfigData('payment/bankpayment/sortcode');
$installer->deleteConfigData('payment/bankpayment/bankname');
$installer->deleteConfigData('payment/bankpayment/bankiban');
$installer->deleteConfigData('payment/bankpayment/bankbic');

$installer->endSetup();