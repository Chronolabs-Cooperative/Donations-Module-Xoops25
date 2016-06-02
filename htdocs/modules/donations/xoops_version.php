<?php
/**
 * Donation for XPayment
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


if (!defined('XOOPS_ROOT_PATH')) {
	die('XOOPS root path not defined');
}


$modversion['dirname'] 		= basename(dirname(__FILE__));
$modversion['name'] 		= ucfirst(basename(dirname(__FILE__)));
$modversion['version']     	= "1.03";
$modversion['releasedate'] 	= "2011-03-17";
$modversion['status']      	= "Stable";
$modversion['description'] 	= _MI_DNS_DESC;
$modversion['credits']     	= _MI_DNS_CREDITS;
$modversion['author']      	= "Wishcraft";
$modversion['help']        	= "";
$modversion['license']     	= "GPL 2.0";
$modversion['official']    	= 1;
$modversion['image']       	= "images/donations_slogo.png";


// Mysql file
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";

// Main
$modversion['hasMain'] = 1;

$modversion['tables'][1] = 'donations';

// Admin
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/admin.php";
$modversion['adminmenu'] = "admin/menu.php";

// Install Script
$modversion['onInstall'] = "include/install.php";

// Update Script
$modversion['onUpdate'] = "include/onupdate.php";

$i=0;
$i++;
$modversion['config'][$i]['name'] = 'donation_group';
$modversion['config'][$i]['title'] = '_DNS_MI_DONATIONGROUP';
$modversion['config'][$i]['description'] = '_DNS_MI_DONATIONGROUP_DESC';
$modversion['config'][$i]['formtype'] = 'group';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = XOOPS_GROUP_DONATION;

$i++;
$modversion['config'][$i]['name'] = 'change_group';
$modversion['config'][$i]['title'] = '_DNS_MI_CHANGEGROUP';
$modversion['config'][$i]['description'] = '_DNS_MI_CHANGEGROUP_DESC';
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = false;

$i++;
$modversion['config'][$i]['name'] = 'profile_field';
$modversion['config'][$i]['title'] = '_DNS_MI_PROFILEFIELD';
$modversion['config'][$i]['description'] = '_DNS_MI_PROFILEFIELD_DESC';
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'donation_made';

$i++;
$modversion['config'][$i]['name'] = 'currency';
$modversion['config'][$i]['title'] = '_DNS_MI_CURRENCY';
$modversion['config'][$i]['description'] = '_DNS_MI_CURRENCY_DESC';
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'USD';

$i++;
$modversion['config'][$i]['name'] = 'target';
$modversion['config'][$i]['title'] = '_DNS_MI_MONTHLYTARGET';
$modversion['config'][$i]['description'] = '_DNS_MI_MONTHLYTARGET_DESC';
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '50.00';

$i++;
$modversion['config'][$i]['name'] = 'target_period_days';
$modversion['config'][$i]['title'] = '_DNS_MI_TARGETPERIODDAYS';
$modversion['config'][$i]['description'] = '_DNS_MI_TARGETPERIODDAYS_DESC';
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = '30';

$i++;
$modversion['config'][$i]['name'] = 'open_amounts';
$modversion['config'][$i]['title'] = '_DNS_MI_OPENAMOUNTS';
$modversion['config'][$i]['description'] = '_DNS_MI_OPENAMOUNTS_DESC';
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = false;

$i++;
$modversion['config'][$i]['name'] = 'open_amount';
$modversion['config'][$i]['title'] = '_DNS_MI_OPENAMOUNT';
$modversion['config'][$i]['description'] = '_DNS_MI_OPENAMOUNT_DESC';
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '35.00';

$i++;
$modversion['config'][$i]['name'] = 'amounts';
$modversion['config'][$i]['title'] = '_DNS_MI_AMOUNTS';
$modversion['config'][$i]['description'] = '_DNS_MI_AMOUNTS_DESC';
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '5|10|20|40|60|80|90|100|200';

// Templates
$i = 0;
$i++;
$modversion['templates'][$i]['file'] = 'donations_index.html';
$modversion['templates'][$i]['description'] = 'Donation Index!';
$i++;
$modversion['templates'][$i]['file'] = 'donations_success.html';
$modversion['templates'][$i]['description'] = 'Donation Successful notice!';
$i++;
$modversion['templates'][$i]['file'] = 'donations_cancel.html';
$modversion['templates'][$i]['description'] = 'Donation Cancel notice!';
$i++;
$modversion['templates'][$i]['file'] = 'donations_this_period.html';
$modversion['templates'][$i]['description'] = 'Donation Drill down list';
$i++;
$modversion['templates'][$i]['file'] = 'donations_cpanel_financials.html';
$modversion['templates'][$i]['description'] = 'Cpanel Donations List!';

// Blocks

$modversion["blocks"][1]    = array(
    "file"            => "donations_make.php",
    "name"            => "Make Donation",
    "description"     => "Display block where donation can be made",
    "show_func"       => "donations_make_show",
    "edit_func"       => "donations_make_edit",
    "options"         => "",
    "template"        => "donations_make.html"
    );
?>
