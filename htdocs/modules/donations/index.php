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

	include ('header.php');
	
	$xoopsOption['template_main'] = 'donations_index.html';
	include_once $GLOBALS['xoops']->path('/header.php');
	
	$GLOBALS['xoopsTpl']->assign('php_self', $_SERVER['PHP_SELF']);
	
	$donations_handler =& xoops_getmodulehandler('donations', 'donations');
		
	$criteria = new Criteria('created',time()-($GLOBALS['xoopsModuleConfig']['target_period_days']*(60*60*24)), '>=');
	$criteria->setSort('`created`');
	$criteria->setOrder('DESC');
	
	$donations = $donations_handler->getObjects($criteria, true);
	foreach($donations as $pid => $donation) {
		$GLOBALS['xoopsTpl']->append('donations', $donation->toArray());
	}
	
	$GLOBALS['xoopsTpl']->assign('target', sprintf(_DNS_MF_PERIOD_P, $GLOBALS['xoopsModuleConfig']['target_period_days'], $GLOBALS['xoopsModuleConfig']['target']));
	$GLOBALS['xoopsTpl']->assign('donationform', donations_makedonation());
	
	include_once $GLOBALS['xoops']->path('/footer.php');
	exit(0);
?>