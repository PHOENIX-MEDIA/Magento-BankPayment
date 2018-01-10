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

$installer = $this;

$installer->startSetup();

/**
 * Convert existing bank account data of default configuration scope to config array
 */
$accountData = array(
    'account_holder' => array('', $installer->getConnection()->fetchOne("select value from ".$installer->getTable('core/config_data')." where scope='default' and path='payment/bankpayment/bankaccountholder'")),
    'bank_name'      => array('', $installer->getConnection()->fetchOne("select value from ".$installer->getTable('core/config_data')." where scope='default' and path='payment/bankpayment/bankname'")),
    'iban'           => array('', $installer->getConnection()->fetchOne("select value from ".$installer->getTable('core/config_data')." where scope='default' and path='payment/bankpayment/bankiban'")),
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