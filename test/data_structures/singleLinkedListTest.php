<?php
include_once(getcwd().'/test/baseTestCase.php');
include_once(getcwd().'/data_structures/singleLinkedList.php');

/**
 * This is a unit test for the SingleLinkedList class.
 * 
 * @author jim
 * @version 1.0
 * @package php_addressbook.test.data_structures
 */
class singleLinkedListTest extends baseTestCase {
	/**
	 * Single Linked List
	 * 
	 * @var SingleLinkedList
	 */
	private $list;
	
	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();
		$this->list = new SingleLinkedList();
	}
	
	/**
	 * Sets up new Linked List for tests
	 * 
	 * (non-PHPdoc)
	 * @see baseTestCase::setUp()
	 */
	protected function setUp() {
		parent::setUp();
		$this->testlog->trace('Re-initializing list object');
		$this->list = new SingleLinkedList();
	}
	
	/**
	 * Tests SingleLinkedList function isEmpty
	 */
	public function testIsEmpty() {
		$this->assertEquals(true, $this->list->isEmpty());
		$node = new SingleLinkNode();
		$node->setData("Node1");
		$this->list->insertFirst($node);
		$this->assertEquals(false, $this->list->isEmpty());
	}
	
	/**
	 * Tests SingleLinkedList function getCount
	 */
	public function testGetCount() {
		$this->assertEquals(0, $this->list->getCount());
		
		$this->addRandomNodes();
	}

	/**
	 * Tests SingleLinkedList function toString
	 */
	public function testToString() {
		$x = $this->addRandomNodes();
		
		$this->assertTrue(is_string($this->list->toString()));
		
		// test count of delimiters is list.getCount()-1
		$this->assertEquals(substr_count($this->list->toString(), ","), $this->list->getCount()-1);
	}
	
	/**
	 * Tests SingleLinkedList function insertFirst
	 */
	public function testInsertFirst() {
		$iterations = rand(1,10);
		$this->testlog->trace("Random iterations: ".$iterations);
		
		for($x=0; $x < $iterations; $x++) {
			// create a new node
			$node = new SingleLinkNode();
			$node->setData("Node".$x);

			$this->list->insertFirst($node);
				
			//$this->testlog->trace("Current List: ".$this->list->toString());
				
			// check count
			$this->assertEquals($x+1, $this->list->getCount());
			// check data
			$this->assertEquals($node->getData(), $this->list->getFirstNode()->getData());
		}
	}
	
	/**
	 * Tests SingleLinkedList function insertFirst for expected exception
	 *
	 * @expectedException Exception
	 * @expectedExceptionMessage Node is null
	 */
	public function testinsertFirstNullException()
	{
		$this->list->insertFirst(null);
	}
	
	/**
	 * Tests SingleLinkedList function insertFirst for expected exception
	 *
	 * @expectedException Exception
	 * @expectedExceptionMessage Node is not an instance of SingleLinkNode
	 */
	public function testinsertFirstInstanceException()
	{
		$this->list->insertFirst("Not A Node");
	}
	
	/**
	 * Tests SingleLinkedList function insertLast
	 */
	public function testInsertLast() {
		$iterations = rand(1,10);
		$this->testlog->trace("Random iterations: ".$iterations);
		
		for($x=0; $x < $iterations; $x++) {
			// create a new node
			$node = new SingleLinkNode();
			$node->setData("Node".$x);
			
			//$this->testlog->trace("Inserting node: ".$node->getData());
			
			$this->list->insertLast($node);
		
			//$this->testlog->trace("Current List: ".$this->list->toString());
		
			// check count
			$this->assertEquals($x+1, $this->list->getCount());
			// check data
			$this->assertEquals($node->getData(), $this->list->getLastNode()->getData());
		}
	}
	
	/**
	 * Tests SingleLinkedList function insertLast for expected exception
	 *
	 * @expectedException Exception
	 * @expectedExceptionMessage Node is null
	 */
	public function testinsertLastNullException()
	{
		$this->list->insertLast(null);
	}
	
	/**
	 * Tests SingleLinkedList function insertLast for expected exception
	 *
	 * @expectedException Exception
	 * @expectedExceptionMessage Node is not an instance of SingleLinkNode
	 */
	public function testinsertLastInstanceException()
	{
		$this->list->insertLast("Not A Node");
	}
	
	/**
	 * Tests SingleLinkedList function insertAfter
	 */
	public function testInsertAfter() {
		$x = $this->addRandomNodes();
		
		// add a node after first node
		$node = new SingleLinkNode();
		$node->setData("Node_InsertAfterFirst");
		
		//$this->testlog->trace("Current List: ".$this->list->toString());
		
		$this->list->insertAfter($this->list->getFirstNode(), $node);
		
		//$this->testlog->trace("List Insert after First Node: ".$this->list->toString());
		
		// check count
		$this->assertEquals($x+1, $this->list->getCount());
		// check data
		$this->assertEquals($node->getData(), $this->list->getFirstNode()->next->getData());
		
		// add a node after the last node
		$node = new SingleLinkNode();
		$node->setData("Node_InsertAfterLast");
		
		$this->list->insertAfter($this->list->getLastNode(), $node);
		
		//$this->testlog->trace("List Insert after Last Node: ".$this->list->toString());
		
		// check count
		$this->assertEquals($x+2, $this->list->getCount());
		// check data
		$this->assertEquals($node->getData(), $this->list->getLastNode()->getData());
	}

	/**
	 * Tests SingleLinkedList function insertAfter for expected exception
	 *
	 * @expectedException Exception
	 * @expectedExceptionMessage Node is null
	 */
	public function testinsertAfterNullException()
	{
		$this->list->insertAfter(null, new SingleLinkNode());
	}
	
	/**
	 * Tests SingleLinkedList function insertAfter for expected exception
	 *
	 * @expectedException Exception
	 * @expectedExceptionMessage Node is not an instance of SingleLinkNode
	 */
	public function testinsertAfterInstanceException()
	{
		$this->list->insertAfter("Not A Node", new SingleLinkNode());
	}
	
	/**
	 * Tests SingleLinkedList function getNode
	 */
	public function testGetNode() {
		$x = $this->addRandomNodes();
		
		$node = $this->list->getNode($this->list->getFirstNode());
		
		// check data
		$this->assertEquals($node->getData(), $this->list->getFirstNode()->getData());
		
		$node = $this->list->getNode($this->list->getLastNode());
		
		// check data
		$this->assertEquals($node->getData(), $this->list->getLastNode()->getData());
	}
	
	/**
	 * Tests SingleLinkedList function getNode for expected exception
	 * 
	 * @expectedException Exception
	 * @expectedExceptionMessage Node is null
	 */
	public function testgetNodeNullException()
	{
		$this->list->getNode(null);
	}
	
	/**
	 * Tests SingleLinkedList function getNode for expected exception
	 *
	 * @expectedException Exception
	 * @expectedExceptionMessage Node is not an instance of SingleLinkNode
	 */
	public function testgetNodeInstanceException()
	{
		$this->list->getNode("Not A Node");
	}
	
	/**
	 * Tests SingleLinkedList function removeFirst
	 */
	public function testRemoveFirst() {
		$x = $this->addRandomNodes();
		
		// get first node for assertion
		$curNode = $this->list->getFirstNode();
		while($curNode != null) {
			//$this->testlog->trace("Current List: ".$this->list->toString());
			
			// remove first node
			$this->list->removeFirst();		
			$x--;
			
			// check count
			$this->assertEquals($x, $this->list->getCount());
			
			if($this->list->getFirstNode() != null) {
				// check data
				$this->assertNotEquals($curNode->getData(), $this->list->getFirstNode()->getData());
			}
			
			// get new first node
			$curNode = $this->list->getFirstNode();
		}
	}
	
	/**
	 * Tests SingleLinkedList function removeFirst for expected exception
	 *
	 * @expectedException Exception
	 * @expectedExceptionMessage No nodes to remove from list
	 */
	public function testRemoveFirstException()
	{
		$this->list->removeFirst();
	}
	
	/**
	 * Tests SingleLinkedList function removeLast
	 */
	public function testRemoveLast() {
		$x = $this->addRandomNodes();
		
		// get last node for assertion
		$curNode = $this->list->getLastNode();
		while($curNode != null) {
			//$this->testlog->trace("Current List: ".$this->list->toString());
			
			// remove last node
			$this->list->removeLast();		
			$x--;
			
			// check count
			$this->assertEquals($x, $this->list->getCount());
			
			if($this->list->getFirstNode() != null) {
				// check data
				$this->assertNotEquals($curNode->getData(), $this->list->getLastNode()->getData());
			}
			
			// get new last node
			$curNode = $this->list->getLastNode();
		}
	}
	
	/**
	 * Tests SingleLinkedList function removeLast for expected exception
	 *
	 * @expectedException Exception
	 * @expectedExceptionMessage No nodes to remove from list
	 */
	public function testRemoveLastException()
	{
		$this->list->removeLast();
	}
	
	/**
	 * Tests SingleLinkedList function removeAfter
	 */
	public function testRemoveAfter() {
		// makes sure we have enough nodes for a good test
		$x=0;
		while($x < 3) {
			$x = $this->addRandomNodes();
		}
		
		$node = $this->list->getFirstNode()->next;
		
		//$this->testlog->trace("Current List: ".$this->list->toString());
		
		$this->list->removeAfter($this->list->getFirstNode());
		
		//$this->testlog->trace("List Remove after First Node: ".$this->list->toString());
		
		// check count
		$this->assertEquals($x-1, $this->list->getCount());
		// check data
		$this->assertNotEquals($node->getData(), $this->list->getFirstNode()->next->getData());
	}
	
	/**
	 * Tests SingleLinkedList function reverseList
	 */
	public function testReverseList() {
		$x = $this->addRandomNodes();
		
		//$this->testlog->trace("Current List: ".$this->list->toString());
		
		// get first node for assertion
		$firstNode = $this->list->getFirstNode();
		// get last node for assertion
		$lastNode = $this->list->getLastNode();
		
		// reverse the list
		$this->list->reverseList();
		
		//$this->testlog->trace("Reversed List: ".$this->list->toString());
		
		$this->assertEquals($firstNode->getData(), $this->list->getLastNode()->getData());
		$this->assertEquals($lastNode->getData(), $this->list->getFirstNode()->getData());
	}
	
	/**
	 * Adds some random nodes to Linked List
	 * 
	 * @return count of nodes added
	 */
	private function addRandomNodes() {
		$iterations = rand(1,10);
		$this->testlog->trace("Random iterations: ".$iterations);
		
		for($x=0; $x < $iterations; $x++) {
			// create a new node
			$node = new SingleLinkNode();
			$node->setData("Node".$x);
				
			// break up use of insertFirst, insertLast with modulus operator
			if($x % 2 == 0) {
				$this->list->insertFirst($node);
			}
			else {
				$this->list->insertLast($node);
			}
				
			//$this->testlog->trace("Current List: ".$this->list->toString());
				
			// check count
			$this->assertEquals($x+1, $this->list->getCount());
		}
		
		return $x;
	}
}
?>