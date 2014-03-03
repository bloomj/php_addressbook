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
	 */
	public function store($address);
	
	/**
	 * Read an Address object.
	 * 
	 * @param String $id
	 */
	public function read($id);
	
	/**
	 * Delete an Address object.
	 * 
	 * @param String $id
	 */
	public function delete($id);
}
?>