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
	
	include('../../mainfile.php');
		
	include_once $GLOBALS['xoops']->path('/modules/donations/include/donations.functions.php');
	include_once $GLOBALS['xoops']->path('/modules/donations/include/donations.objects.php');
	include_once $GLOBALS['xoops']->path('/modules/donations/include/donations.forms.php');

	xoops_load('pagenav');	
	xoops_load('xoopsmailer');
	
	$myts = MyTextSanitizer::getInstance();
		
	
?>