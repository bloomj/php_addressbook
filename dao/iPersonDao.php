<?php
include_once('iDao.php');

/**
 * This a basic interface for a Person DAO object.
 *
 * @author jim
 * @version 1.0
 * @package php_addressbook.dao
 *
 */
interface IPersonDAO extends IDAO {
	/**
	 * Create or update an Person object.
	 * 
	 * @param Person $person
	 * @throws Exception
	 * @return boolean
	 */
	public function store($person);
	
	/**
	 * Read an Person object.
	 * 
	 * @param String $id
	 * @throws Exception
	 * @return Person
	 */
	public function read($id);
	
	/**
	 * Delete an Person object.
	 * 
	 * @param String $id
	 * @throws Exception
	 * @return boolean
	 */
	public function delete($id);
}
?>