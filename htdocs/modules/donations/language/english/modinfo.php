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
	// Application information
	define('_MI_DNS_DESC','Donations is a module used in conjunction with XPayment to recieve donations.');
	define('_MI_DNS_CREDITS','Simon Roberts (simon@chronolabs.coop)');
	
	// Preferences
	define('_DNS_MI_DONATIONGROUP','Group to Add User To');
	define('_DNS_MI_DONATIONGROUP_DESC','This is the group to add the user to when they make a donation.');
	define('_DNS_MI_CHANGEGROUP','Add User to Group');
	define('_DNS_MI_CHANGEGROUP_DESC','Whether you add a user to a group on donation.');
	define('_DNS_MI_PROFILEFIELD','Datetime field in profile module');
	define('_DNS_MI_PROFILEFIELD_DESC','This is the field you record the date the last donation was made in profile module.');
	define('_DNS_MI_CURRENCY','Currency (ISO)');
	define('_DNS_MI_CURRENCY_DESC','This is the currency to bill in - you must use a 3 letter ISO Code');
	define('_DNS_MI_MONTHLYTARGET','Period Target');
	define('_DNS_MI_MONTHLYTARGET_DESC','This is the amount the period target is');
	define('_DNS_MI_TARGETPERIODDAYS','Number of Days in a Period');
	define('_DNS_MI_TARGETPERIODDAYS_DESC','The total number of days measured in a target period.');
	define('_DNS_MI_OPENAMOUNTS','Allow open amounts');
	define('_DNS_MI_OPENAMOUNTS_DESC','Prompts the user to enter an amount!');
	define('_DNS_MI_OPENAMOUNT','Default Open amount');
	define('_DNS_MI_OPENAMOUNT_DESC','This is the default open amount!');
	define('_DNS_MI_AMOUNTS','Amount to Donate');
	define('_DNS_MI_AMOUNTS_DESC','If not open these are the amounts seperated with a pipe (|) that the user can select to add');
	
?>

