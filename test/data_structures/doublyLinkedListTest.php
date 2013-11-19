<?php
include_once(getcwd().'/test/baseTestCase.php');
include_once(getcwd().'/data_structures/doublyLinkedList.php');

/**
 * This is a unit test for the DoublyLinkedList class.
 * 
 * @author jim
 * @version 1.0
 * @package php_addressbook.test.data_structures
 */
class doublyLinkedListTest extends baseTestCase {
	/**
	 * Doubly Linked List
	 * 
	 * @var DoublyLinkedList
	 */
	private $list;
	
	/**
	 * Minimum number of nodes to add to the list
	 * 
	 * @var int
	 */
	private static $MINIMUM_NODES=3;
	
	/**
	 * Maximum number of nodes to add to the list
	 * 
	 * @var int
	 */
	private static $MAXIMUM_NODES=10;
	
	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();
		$this->list = new DoublyLinkedList();
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
		$this->list = new DoublyLinkedList();
	}
	
	/**
	 * Tests DoublyLinkedList function isEmpty
	 */
	public function testIsEmpty() {
		$this->assertEquals(true, $this->list->isEmpty());
		$node = new DoubleLinkNode();
		$node->setData("Node1");
		$this->list->insertFirst($node);
		$this->assertEquals(false, $this->list->isEmpty());
	}
	
	/**
	 * Tests DoublyLinkedList function getCount
	 */
	public function testGetCount() {
		$this->assertEquals(0, $this->list->getCount());
		
		$this->addRandomNodes();
	}

	/**
	 * Tests DoublyLinkedList function toString
	 */
	public function testToString() {
		$x = $this->addRandomNodes();
		
		$this->validateLinks();
	}
	
	/**
	 * Tests DoublyLinkedList function insertFirst
	 */
	public function testInsertFirst() {
		$iterations = rand(self::$MINIMUM_NODES,self::$MAXIMUM_NODES);
		$this->testlog->trace("Random iterations: ".$iterations);
		
		for($x=0; $x < $iterations; $x++) {
			// create a new node
			$node = new DoubleLinkNode();
			$node->setData("Node".$x);

			$this->list->insertFirst($node);
				
			//$this->testlog->trace("Current List: ".$this->list->toString());
				
			// check count
			$this->assertEquals($x+1, $this->list->getCount());
			// check data
			$this->assertEquals($node->getData(), $this->list->getFirstNode()->getData());
		}
		
		$this->validateLinks();
	}
	
	/**
	 * Tests DoublyLinkedList function insertFirst for expected exception
	 *
	 * @expectedException Exception
	 * @expectedExceptionMessage Node is null
	 */
	public function testinsertFirstNullException()
	{
		$this->list->insertFirst(null);
	}
	
	/**
	 * Tests DoublyLinkedList function insertFirst for expected exception
	 *
	 * @expectedException Exception
	 * @expectedExceptionMessage Node is not an instance of DoubleLinkNode
	 */
	public function testinsertFirstInstanceException()
	{
		$this->list->insertFirst("Not A Node");
	}
	
	/**
	 * Tests DoublyLinkedList function insertLast
	 */
	public function testInsertLast() {
		$iterations = rand(self::$MINIMUM_NODES,self::$MAXIMUM_NODES);
		$this->testlog->trace("Random iterations: ".$iterations);
		
		for($x=0; $x < $iterations; $x++) {
			// create a new node
			$node = new DoubleLinkNode();
			$node->setData("Node".$x);
			
			$this->testlog->trace("Inserting node: ".$node->getData());
			
			$this->list->insertLast($node);
		
			$this->testlog->trace("Current List: ".$this->list->toString());
		
			// check count
			$this->assertEquals($x+1, $this->list->getCount());
			// check data
			$this->assertEquals($node->getData(), $this->list->getLastNode()->getData());
		}
		
		$this->validateLinks();
	}
	
	/**
	 * Tests DoublyLinkedList function insertLast for expected exception
	 *
	 * @expectedException Exception
	 * @expectedExceptionMessage Node is null
	 */
	public function testinsertLastNullException()
	{
		$this->list->insertLast(null);
	}
	
	/**
	 * Tests DoublyLinkedList function insertLast for expected exception
	 *
	 * @expectedException Exception
	 * @expectedExceptionMessage Node is not an instance of DoubleLinkNode
	 */
	public function testinsertLastInstanceException()
	{
		$this->list->insertLast("Not A Node");
	}
	
	/**
	 * Tests DoublyLinkedList function insertAfter
	 */
	public function testInsertAfter() {
		$x = $this->addRandomNodes();
		
		// add a node after first node
		$node = new DoubleLinkNode();
		$node->setData("Node_InsertAfterFirst");
		
		$this->testlog->trace("Current List: ".$this->list->toString());
		
		$this->list->insertAfter($this->list->getFirstNode(), $node);
		
		$this->testlog->trace("List Insert after First Node: ".$this->list->toString());
		
		// check count
		$this->assertEquals($x+1, $this->list->getCount());
		// check data
		$this->assertEquals($node->getData(), $this->list->getFirstNode()->next->getData());
		
		// add a node after the last node
		$node = new DoubleLinkNode();
		$node->setData("Node_InsertAfterLast");
		
		$this->list->insertAfter($this->list->getLastNode(), $node);
		
		$this->testlog->trace("List Insert after Last Node: ".$this->list->toString());
		
		// check count
		$this->assertEquals($x+2, $this->list->getCount());
		// check data
		$this->assertEquals($node->getData(), $this->list->getLastNode()->getData());
		
		$this->validateLinks();
	}

	/**
	 * Tests DoublyLinkedList function insertAfter for expected exception
	 *
	 * @expectedException Exception
	 * @expectedExceptionMessage Node is null
	 */
	public function testinsertAfterNullException()
	{
		$this->list->insertAfter(null, new DoubleLinkNode());
	}
	
	/**
	 * Tests DoublyLinkedList function insertAfter for expected exception
	 *
	 * @expectedException Exception
	 * @expectedExceptionMessage Node is not an instance of DoubleLinkNode
	 */
	public function testinsertAfterInstanceException()
	{
		$this->list->insertAfter("Not A Node", new DoubleLinkNode());
	}
	
	/**
	 * Tests DoublyLinkedList function insertAfter for expected exception
	 *
	 * @expectedException Exception
	 * @expectedExceptionMessage Node not found
	 */
	public function testinsertAfterNodeNotFoundException()
	{	
		$node = new DoubleLinkNode();
		$node->setData("NodeUnknown");
		$this->list->insertAfter($node, new DoubleLinkNode());
	}
	
	/**
	 * Tests DoublyLinkedList function getNode
	 */
	public function testGetNode() {
		$x = $this->addRandomNodes();
		
		$node = $this->list->getNode($this->list->getFirstNode(), false);
		
		// check data
		$this->assertEquals($node->getData(), $this->list->getFirstNode()->getData());
		
		$node = $this->list->getNode($this->list->getLastNode(), true);
		
		// check data
		$this->assertEquals($node->getData(), $this->list->getLastNode()->getData());
	}
	
	/**
	 * Tests DoublyLinkedList function getNode for expected exception
	 * 
	 * @expectedException Exception
	 * @expectedExceptionMessage Node is null
	 */
	public function testgetNodeNullException()
	{
		$this->list->getNode(null, true);
	}
	
	/**
	 * Tests DoublyLinkedList function getNode for expected exception
	 *
	 * @expectedException Exception
	 * @expectedExceptionMessage Node is not an instance of DoubleLinkNode
	 */
	public function testgetNodeInstanceException()
	{
		$this->list->getNode("Not A Node", true);
	}
	
	/**
	 * Tests DoublyLinkedList function removeFirst
	 */
	public function testRemoveFirst() {
		$x = $this->addRandomNodes();
		
		// get first node for assertion
		$curNode = $this->list->getFirstNode();
		while($curNode != null) {
			$this->testlog->trace("Current List: ".$this->list->toString());
			
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
		
		$this->validateLinks();
	}
	
	/**
	 * Tests DoublyLinkedList function removeFirst for expected exception
	 *
	 * @expectedException Exception
	 * @expectedExceptionMessage No nodes to remove from list
	 */
	public function testRemoveFirstException()
	{
		$this->list->removeFirst();
	}
	
	/**
	 * Tests DoublyLinkedList function removeLast
	 */
	public function testRemoveLast() {
		$x = $this->addRandomNodes();
		
		// get last node for assertion
		$curNode = $this->list->getLastNode();
		while($curNode != null) {
			$this->testlog->trace("Current List: ".$this->list->toString());
			
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
		
		$this->validateLinks();
	}
	
	/**
	 * Tests DoublyLinkedList function removeLast for expected exception
	 *
	 * @expectedException Exception
	 * @expectedExceptionMessage No nodes to remove from list
	 */
	public function testRemoveLastException()
	{
		$this->list->removeLast();
	}
	
	/**
	 * Tests DoublyLinkedList function removeAfter
	 */
	public function testRemoveAfter() {
		// makes sure we have enough nodes for a good test
		$x=0;
		while($x < 3) {
			$x = $this->addRandomNodes();
		}
		
		$node = $this->list->getFirstNode()->next;
		
		$this->testlog->trace("Current List: ".$this->list->toString());
		
		$this->list->removeAfter($this->list->getFirstNode());
		
		$this->testlog->trace("List Remove after First Node: ".$this->list->toString());
		
		// check count
		$this->assertEquals($x-1, $this->list->getCount());
		// check data
		$this->assertNotEquals($node->getData(), $this->list->getFirstNode()->next->getData());
		
		$this->validateLinks();
	}
	
	/**
	 * Tests DoublyLinkedList function removeAfter for expected exception
	 *
	 * @expectedException Exception
	 * @expectedExceptionMessage Node not found
	 */
	public function testRemoveAfterNodeNotFoundException()
	{
		$node = new DoubleLinkNode();
		$node->setData("NodeUnknown");
		$this->list->removeAfter($node);
	}
	
	/**
	 * Tests DoublyLinkedList function reverseList
	 */
	public function testReverseList() {
		$x = $this->addRandomNodes();
		
		$this->testlog->trace("Current List: ".$this->list->toString());
		
		// get first node for assertion
		$firstNode = $this->list->getFirstNode();
		// get last node for assertion
		$lastNode = $this->list->getLastNode();
		
		// reverse the list
		$this->list->reverseList();
		
		$this->testlog->trace("Reversed List: ".$this->list->toString());
		
		$this->assertEquals($firstNode->getData(), $this->list->getLastNode()->getData());
		$this->assertEquals($lastNode->getData(), $this->list->getFirstNode()->getData());
		
		$this->validateLinks();
	}
	
	/**
	 * Adds some random nodes to Linked List
	 * 
	 * @return count of nodes added
	 */
	private function addRandomNodes() {
		$iterations = rand(self::$MINIMUM_NODES,self::$MAXIMUM_NODES);
		$this->testlog->trace("Random iterations: ".$iterations);
		
		for($x=0; $x < $iterations; $x++) {
			// create a new node
			$node = new DoubleLinkNode();
			$node->setData("Node".$x);
				
			// break up use of insertFirst, insertLast with modulus operator
			if($x % 2 == 0) {
				$this->list->insertFirst($node);
			}
			else {
				$this->list->insertLast($node);
			}
				
			$this->testlog->trace("Current List: ".$this->list->toString());
			//$this->testlog->trace("Current List2: ".$this->list->toString(",",false));
				
			// check count
			$this->assertEquals($x+1, $this->list->getCount());
		}
		
		return $x;
	}
	
	/**
	 * Validates next/prev links in Doubly Linked List
	 * by traversing backwards and forwards in the list
	 * for string representation
	 */
	private function validateLinks() {
		$forwardTraverseStr = $this->list->toString(",",true);
		$backwardTraverseStr = $this->list->toString(",",false);
		
		$this->testlog->trace("Forward traverse string: ".$forwardTraverseStr);
		$this->testlog->trace("Backward traverse string: ".$backwardTraverseStr);
		
		$this->assertTrue(is_string($forwardTraverseStr));
		
		// test count of delimiters is list.getCount()-1
		if($forwardTraverseStr != "") {
			$this->assertEquals(substr_count($forwardTraverseStr, ","), $this->list->getCount()-1);
		}
		
		$this->assertTrue(is_string($backwardTraverseStr));
		
		// test count of delimiters is list.getCount()-1
		if($backwardTraverseStr != "") {
			$this->assertEquals(substr_count($backwardTraverseStr, ","), $this->list->getCount()-1);
		}
		
		// test strings are the same
		$this->assertEquals($forwardTraverseStr,$backwardTraverseStr);
	}
}
?>