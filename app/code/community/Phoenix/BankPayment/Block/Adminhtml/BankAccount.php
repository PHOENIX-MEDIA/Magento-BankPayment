<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category   Phoenix
 * @package    Phoenix_BankPayment
 * @copyright  Copyright (c) 2010 Phoenix Medien GmbH & Co. KG (http://www.phoenix-medien.de)
 */

class Phoenix_BankPayment_Block_Adminhtml_BankAccount extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    protected $_addRowButtonHtml = array();
    protected $_removeRowButtonHtml = array();

    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        $this->setElement($element);

        $html = '<div id="bank_account_template" style="display:none">';
        $html .= $this->_getRowTemplateHtml();
        $html .= '</div>';

        $html .= '<ul id="bank_account_container">';
        if ($this->_getValue('account_holder')) {
            foreach ($this->_getValue('account_holder') as $i=>$f) {
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

    protected function _getRowTemplateHtml($i=0)
    {
        $html = '<li><fieldset>';
        $html .= '<label>'.$this->__('Account holder').'</label>';
        $html .= '<input class="input-text" type="text" name="'.$this->getElement()->getName().'[account_holder][]" value="' . $this->_getValue('account_holder/'.$i) . '" '.$this->_getDisabled().' />';
        $html .= '<label>'.$this->__('Account number').'</label>';
        $html .= '<input class="input-text" type="text" name="'.$this->getElement()->getName().'[account_number][]" value="' . $this->_getValue('account_number/'.$i) . '" '.$this->_getDisabled().' />';
        $html .= '<label>'.$this->__('Sort code').'</label>';
        $html .= '<input class="input-text" type="text" name="'.$this->getElement()->getName().'[sort_code][]" value="' . $this->_getValue('sort_code/'.$i) . '" '.$this->_getDisabled().' />';
        $html .= '<label>'.$this->__('Bank name').'</label>';
        $html .= '<input class="input-text" type="text" name="'.$this->getElement()->getName().'[bank_name][]" value="' . $this->_getValue('bank_name/'.$i) . '" '.$this->_getDisabled().' />';
        $html .= '<label>'.$this->__('IBAN').'</label>';
        $html .= '<input class="input-text" type="text" name="'.$this->getElement()->getName().'[iban][]" value="' . $this->_getValue('iban/'.$i) . '" '.$this->_getDisabled().' />';
        $html .= '<label>'.$this->__('BIC').'</label>';
        $html .= '<input class="input-text" type="text" name="'.$this->getElement()->getName().'[bic][]" value="' . $this->_getValue('bic/'.$i) . '" '.$this->_getDisabled().' />';
        $html .= '<br />&nbsp;<br />';
        $html .= $this->_getRemoveRowButtonHtml();
        $html .= '</fieldset></li>';

        return $html;
    }

    protected function _getDisabled()
    {
        return $this->getElement()->getDisabled() ? ' disabled' : '';
    }

    protected function _getValue($key)
    {
        return $this->getElement()->getData('value/'.$key);
    }

    protected function _getSelected($key, $value)
    {
        return $this->getElement()->getData('value/'.$key)==$value ? 'selected="selected"' : '';
    }

    protected function _getAddRowButtonHtml($container, $template, $title='Add')
    {
        if (!isset($this->_addRowButtonHtml[$container])) {
            $this->_addRowButtonHtml[$container] = $this->getLayout()->createBlock('adminhtml/widget_button')
                    ->setType('button')
                    ->setClass('add '.$this->_getDisabled())
                    ->setLabel($this->__($title))
                    ->setOnClick("Element.insert($('".$container."'), {bottom: $('".$template."').innerHTML})")
                    ->setDisabled($this->_getDisabled())
                    ->toHtml();
        }
        return $this->_addRowButtonHtml[$container];
    }

    protected function _getRemoveRowButtonHtml($selector='li', $title='Delete Account')
    {
        if (!$this->_removeRowButtonHtml) {
            $this->_removeRowButtonHtml = $this->getLayout()->createBlock('adminhtml/widget_button')
                    ->setType('button')
                    ->setClass('delete v-middle '.$this->_getDisabled())
                    ->setLabel($this->__($title))
                    ->setOnClick("Element.remove($(this).up('".$selector."'))")
                    ->setDisabled($this->_getDisabled())
                    ->toHtml();
        }
        return $this->_removeRowButtonHtml;
    }
}
