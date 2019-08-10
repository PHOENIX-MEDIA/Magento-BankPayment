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

class Phoenix_BankPayment_Block_Adminhtml_System_Config_Form_Bankaccount extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    protected $_addRowButtonHtml = array();
    protected $_removeRowButtonHtml = array();

    /**
     * @param string Varien_Data_Form_Element_Abstract
     * @return string
     */
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        $this->setElement($element);

        $html = '<div id="bank_account_template" style="display:none">';
        $html .= $this->_getRowTemplateHtml();
        $html .= '</div>';

        $html .= '<ul id="bank_account_container">';
        if ($accountHolder = $this->_getValue('account_holder')) {
            foreach ($accountHolder as $i => $f) {
                if ($i) {
                    $html .= $this->_getRowTemplateHtml($i);
                }
            }
        }
        $html .= '</ul>';
        $html .= $this->_getAddRowButtonHtml('bank_account_container',
            'bank_account_template', $this->__('Add Bank Account'));

        return $html;
    }

    /**
     * @param int $i
     * @return string
     */
    protected function _getRowTemplateHtml($i = 0)
    {
        $html = '<li><fieldset>';
        $html .= '<p>';
        $html .= '<label>' . $this->__('Account holder') . '</label><br />';
        $html .= '<input class="input-text" type="text" name="' . $this->getElement()->getName() . '[account_holder][]" value="' . $this->_getValue('account_holder/' . $i) . '" ' . $this->_getDisabled() . ' />';
        $html .= '</p>';
        $html .= '<p>';
        $html .= '<label>' . $this->__('Bank name') . '</label><br />';
        $html .= '<input class="input-text" type="text" name="' . $this->getElement()->getName() . '[bank_name][]" value="' . $this->_getValue('bank_name/' . $i) . '" ' . $this->_getDisabled() . ' />';
        $html .= '</p>';
        $html .= '<p>&nbsp;</p>';
        $html .= '<p>';
        $html .= '<label>' . $this->__('IBAN') . '</label><br />';
        $html .= '<input class="input-text" type="text" name="' . $this->getElement()->getName() . '[iban][]" value="' . $this->_getValue('iban/' . $i) . '" ' . $this->_getDisabled() . ' />';
        $html .= '</p>';
        $html .= '<p>';
        $html .= '<label>' . $this->__('BIC') . '</label><br />';
        $html .= '<input class="input-text" type="text" name="' . $this->getElement()->getName() . '[bic][]" value="' . $this->_getValue('bic/' . $i) . '" ' . $this->_getDisabled() . ' />';
        $html .= '</p>';
        $html .= '<p>&nbsp;</p>';
        $html .= '<p>';
        $html .= '<strong>' . $this->__('Account data for non SEPA countries') . '</strong>';
        $html .= '</p>';
        $html .= '<p>';
        $html .= '<label>' . $this->__('Account number') . '</label><br />';
        $html .= '<input class="input-text" type="text" name="' . $this->getElement()->getName() . '[account_number][]" value="' . $this->_getValue('account_number/' . $i) . '" ' . $this->_getDisabled() . ' />';
        $html .= '</p>';
        $html .= '<p>';
        $html .= '<label>' . $this->__('Sort code') . '</label><br />';
        $html .= '<input class="input-text" type="text" name="' . $this->getElement()->getName() . '[sort_code][]" value="' . $this->_getValue('sort_code/' . $i) . '" ' . $this->_getDisabled() . ' />';
        $html .= '</p>';
        $html .= $this->_getRemoveRowButtonHtml();
        $html .= '</fieldset></li>';

        return $html;
    }

    /**
     * @return string
     */
    protected function _getDisabled()
    {
        return $this->getElement()->getDisabled() ? ' disabled' : '';
    }

    /**
     * @param string $key
     * @return string
     */
    protected function _getValue($key)
    {
        return $this->getElement()->getData('value/' . $key);
    }

    /**
     * @param string $key
     * @param string $value
     * @return string
     */
    protected function _getSelected($key, $value)
    {
        return $this->getElement()->getData('value/' . $key) == $value ? 'selected="selected"' : '';
    }

    /**
     * @param $container
     * @param $template
     * @param string $title
     * @return array
     */
    protected function _getAddRowButtonHtml($container, $template, $title = 'Add')
    {
        if (!isset($this->_addRowButtonHtml[$container])) {
            $this->_addRowButtonHtml[$container] = $this->getLayout()->createBlock('adminhtml/widget_button')
                ->setType('button')
                ->setClass('add ' . $this->_getDisabled())
                ->setLabel($this->__($title))
                ->setOnClick("Element.insert($('" . $container . "'), {bottom: $('" . $template . "').innerHTML})")
                ->toHtml();
        }
        return $this->_addRowButtonHtml[$container];
    }

    /**
     * @param string $selector
     * @param string $title
     * @return array
     */
    protected function _getRemoveRowButtonHtml($selector = 'li', $title = 'Delete Account')
    {
        if (!$this->_removeRowButtonHtml) {
            $this->_removeRowButtonHtml = $this->getLayout()->createBlock('adminhtml/widget_button')
                ->setType('button')
                ->setClass('delete v-middle ' . $this->_getDisabled())
                ->setLabel($this->__($title))
                ->setOnClick("Element.remove($(this).up('" . $selector . "'))")
                ->toHtml();
        }
        return $this->_removeRowButtonHtml;
    }
}
