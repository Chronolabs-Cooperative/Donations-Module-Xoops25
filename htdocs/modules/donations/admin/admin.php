<?php
/**
 * Invoice Transaction Gateway with Modular Plugin set
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
	include('header.php');
	error_reporting(E_ALL);
	xoops_cp_header();
	
	include_once $GLOBALS['xoops']->path( "/class/template.php" );
	$GLOBALS['donationsTpl'] = new XoopsTpl();
	$GLOBALS['donationsTpl']->assign('php_self', $_SERVER['PHP_SELF']);
	
	xoops_loadLanguage('admin', 'donations');
		
	switch($_REQUEST['op']) {
	default:
	case "financials":	
		switch ($_REQUEST['fct'])
		{
		default:
		case "list":
			$donations_handler =& xoops_getmodulehandler('donations', 'donations');
			
			$ttl = $donations_handler->getCount(NULL);
			$limit = !empty($_REQUEST['limit'])?intval($_REQUEST['limit']):30;
			$start = !empty($_REQUEST['start'])?intval($_REQUEST['start']):0;
			$order = !empty($_REQUEST['order'])?$_REQUEST['order']:'DESC';
			$sort = !empty($_REQUEST['sort'])?$_REQUEST['sort']:'created';
			
			$pagenav = new XoopsPageNav($ttl, $limit, $start, 'start', 'limit='.$limit.'&sort='.$sort.'&order='.$order.'&op='.$_REQUEST['op'].'&fct='.$_REQUEST['fct']);
			$GLOBALS['donationsTpl']->assign('pagenav', $pagenav->renderNav());

			foreach (array('amount','currency','realname','state','country', 'email', 'created') as $id => $key) {
				$GLOBALS['donationsTpl']->assign(strtolower($key.'_th'), '<a href="'.$_SERVER['PHP_SELF'].'?start='.$start.'&limit='.$limit.'&sort='.$key.'&order='.(($key==$sort)?($order=='ASC'?'DESC':'ASC'):$order).'&op='.$_REQUEST['op'].'&fct='.$_REQUEST['fct'].'">'.(defined('_DNS_AM_TH_'.strtoupper($key))?constant('_DNS_AM_TH_'.strtoupper($key)):'_DNS_AM_TH_'.strtoupper($key)).'</a>');
			}
			
			$criteria = new Criteria('1','1');
			$criteria->setStart($start);
			$criteria->setLimit($limit);
			$criteria->setSort($sort);
			$criteria->setOrder($order);
			
			$donations = $donations_handler->getObjects($criteria, true);
			foreach($donations as $pid => $donation) {
				$GLOBALS['donationsTpl']->append('donations', $donation->toArray());
			}
					
			$GLOBALS['donationsTpl']->display('db:donations_cpanel_financials.html');
			break;
		}
		break;

	}
	
	xoops_cp_footer();
?>