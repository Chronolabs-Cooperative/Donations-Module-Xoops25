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
function donations_make_show($options) {
	$module_handler = xoops_gethandler('module');
	$config_handler = xoops_gethandler('config');
	$xoMod = $module_handler->getByDirname('donations');
	$xoConfig = $config_handler->getConfigList($xoMod->getVar('mid'));
	
	xoops_load('xoopsformloader');
	
	if ($xoConfig['open_amounts']) {
		$price = new XoopsFormText('', 'item[A][amount]', 15, 15, $xoConfig['open_amount']);
	} else {
		$price = new XoopsFormSelect('', 'item[A][amount]');
		foreach(explode('|', $xoConfig['amounts']) as $amount) 
			$price->addOption($amount, number_format($amount, 2).' '.$xoConfig['currency']);	
	}
	
	$ret = array();
	$ret['price'] = $price->render();
	$ret['sitename'] = $GLOBALS['xoopsConfig']['sitename'];
	$ret['config'] = $xoConfig;
	
	if (is_object($GLOBALS['xoopsUser']))
		$ret['user'] = $GLOBALS['xoopsUser']->toArray();
	
	return $ret;
}

function donations_make_edit($options) {
	
}

?>