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

if (!defined('XOOPS_ROOT_PATH')) {
	exit();
}
/**
 * Class for Blue Room Donations
 * @author Simon Roberts <simon@xoops.org>
 * @copyright copyright (c) 2009-2003 XOOPS.org
 * @package kernel
 */
class DonationsDonations extends XoopsObject
{

    function DonationsDonations($id = null)
    {
        $this->initVar('din', XOBJ_DTYPE_INT, null, false);
        $this->initVar('uid', XOBJ_DTYPE_INT, 1, false);
        $this->initVar('amount', XOBJ_DTYPE_DECIMAL, null, false);
		$this->initVar('currency', XOBJ_DTYPE_TXTBOX, 'USD', false, 3);
		$this->initVar('realname', XOBJ_DTYPE_TXTBOX, '', false, 128);
		$this->initVar('state', XOBJ_DTYPE_TXTBOX, '', false, 128);
		$this->initVar('country', XOBJ_DTYPE_TXTBOX, '', false, 128);
		$this->initVar('email', XOBJ_DTYPE_TXTBOX, '', false, 255);
		$this->initVar('created', XOBJ_DTYPE_INT, 0, false);
		$this->initVar('iid', XOBJ_DTYPE_INT, 0, false);
	
    }
	
	function toArray() {
		
		$ret = parent::toArray();
				 
		$ret['created_datetime'] = date(_DATESTRING, $this->getVar('created'));
		
		if (is_object($GLOBALS['xoopsUser']))
			$ret['user'] = $GLOBALS['xoopsUser']->toArray();
			
		return $ret;
	}
		
}


/**
* XOOPS donations handler class.
* This class is responsible for providing data access mechanisms to the data source
* of XOOPS user class objects.
*
* @author  Simon Roberts <simon@chronolabs.coop>
* @package kernel
*/
class DonationsDonationsHandler extends XoopsPersistableObjectHandler
{
    function __construct(&$db) 
    {
		$this->db = $db;
        parent::__construct($db, 'donations', 'DonationsDonations', "din", "realname");
    }
    
    function insert($object, $force = true)
    {
    	if ($object->isNew())
    		$object->setVar('created', time());
    
    	return parent::insert($object, $force);
    }
	
}

?>