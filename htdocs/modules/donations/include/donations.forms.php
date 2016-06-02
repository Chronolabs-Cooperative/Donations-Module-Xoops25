<?php
/**
 * Donation Module for XPayment
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       Chronolabs Co-Op http://www.chronolabs.coop/
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         xpayment
 * @since           1.30.0
 * @author          Simon Roberts <simon@chronolabs.coop>
 */
	function donations_makedonation() {
		
		$sform = new XoopsThemeForm(_DNS_MF_FRM_MAKEDONATION, 'donation', XOOPS_URL.'/modules/xpayment/', 'post');
		
		$sform->addElement(new XoopsFormHidden('op', 'createinvoice'));
		$sform->addElement(new XoopsFormHidden('plugin', 'donations'));
		$sform->addElement(new XoopsFormHidden('donation', true));
		$sform->addElement(new XoopsFormHidden('drawfor', $GLOBALS['xoopsConfig']['sitename']));
		if (is_object($GLOBALS['xoopsUser'])) {
			$sform->addElement(new XoopsFormHidden('drawto', $GLOBALS['xoopsUser']->getVar('name').' ('.$GLOBALS['xoopsUser']->getVar('uname').')'));
			$sform->addElement(new XoopsFormHidden('drawto_email', $GLOBALS['xoopsUser']->getVar('email')));			
		} else {
			$sform->addElement(new XoopsFormText(_DNS_MF_DRAWTO, 'drawto', 25, 128), true);
			$sform->addElement(new XoopsFormText(_DNS_MF_DRAWTO_EMAIL, 'drawto_email', 25, 128), true);			
		}
		$sform->addElement(new XoopsFormHidden('key', ''));
		$sform->addElement(new XoopsFormHidden('currency', $GLOBALS['xoopsModuleConfig']['currency']));
		$sform->addElement(new XoopsFormHidden('weight_unit', 'kgs'));
		$sform->addElement(new XoopsFormHidden('item[A][cat]', _DNS_MF_DONATIONCAT));
		$sform->addElement(new XoopsFormHidden('item[A][name]', _DNS_MF_DONATION));
		$sform->addElement(new XoopsFormHidden('item[A][quantity]', '1'));
		$sform->addElement(new XoopsFormHidden('item[A][shipping]', 0));
		$sform->addElement(new XoopsFormHidden('item[A][handling]', 0));
		$sform->addElement(new XoopsFormHidden('item[A][weight]', 0));
		$sform->addElement(new XoopsFormHidden('item[A][tax]', 0));
		$sform->addElement(new XoopsFormHidden('return', XOOPS_URL.'/modules/donations/success.php'));
		$sform->addElement(new XoopsFormHidden('cancel', XOOPS_URL.'/modules/donations/success.php'));
		
		if ($GLOBALS['xoopsModuleConfig']['open_amounts']) {
			$sform->addElement(new XoopsFormText(_DNS_MF_AMOUNT, 'item[A][amount]', 15, 15, $GLOBALS['xoopsModuleConfig']['open_amount']), true);
		} else {
			$sel = new XoopsFormSelect(_DNS_MF_AMOUNT, 'item[A][amount]');
			foreach(explode('|', $GLOBALS['xoopsModuleConfig']['amounts']) as $amount) 
				$sel->addOption($amount, number_format($amount, 2).' '.$GLOBALS['xoopsModuleConfig']['currency']);	
			$sform->addElement($sel, true);
		}
		$sform->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
		return $sform->render();
		
	}
?>