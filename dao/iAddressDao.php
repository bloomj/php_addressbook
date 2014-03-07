<?php
include_once('iDao.php');

/**
 * This a basic interface for a Address DAO object.
 *
 * @author jim
 * @version 1.0
 * @package php_addressbook.dao
 *
 */
interface IAddressDAO extends IDAO {
	/**
	 * Create or update an Address object.
	 * 
	 * @param Address $address
	 * @throws Exception
	 * @return boolean
	 */
	public function store($address);
	
	/**
	 * Read an Address object.
	 * 
	 * @param String $id
	 * @throws Exception
	 * @return Address
	 */
	public function read($id);
	
	/**
	 * Delete an Address object.
	 * 
	 * @param String $id
	 * @throws Exception
	 * @return boolean
	 */
	public function delete($id);
}
?>