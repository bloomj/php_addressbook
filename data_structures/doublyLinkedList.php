<?php
	/**
	 * Simple double node class for doubly linked lists
	 * 
	 * @author jim
	 * @version 1.0
	 * @package php_addressbook.data_structures
	 *
	 */
	class DoubleLinkNode {
		/**
		 * Data of the Node
		 * 
		 * @var unknown
		 */
		private $data;
		/**
		 * Next Node in the List
		 * 
		 * @var DoubleLinkNode
		 */
		public $next;
		/**
		 * Previous Node in the List
		 *
		 * @var DoubleLinkNode
		 */
		public $prev;
		
		/**
		 * Constructor
		 */
		public function __construct() {
			$this->data = null;
			$this->next = null;	
			$this->prev = null;
		}
		
		/**
		 * Set data of Node
		 * 
		 * @param unknown $_data
		 */
		public function setData($_data) {
			$this->data = $_data;
		}
		
		/**
		 * Get data of Node
		 * 
		 * @return unknown
		 */
		public function getData() {
			return $this->data;
		}
	}
	
	/**
	 * Doubly linked list class implementation
	 * 
	 * @author jim
	 * @version 1.0
	 * @package php_addressbook.data_structures
	 * 
	 */
	class DoublyLinkedList {
		/**
		 * First Node of the Linked List
		 * 
		 * @var DoubleLinkNode
		 */
		private $firstNode;
		/**
		 * Last Node of the Linked List
		 * 
		 * @var DoubleLinkNode
		 */
		private $lastNode;
		/**
		 * Count of the number of nodes in the Linked List
		 * 
		 * @var int
		 */
		private $count;
		
		/**
		 * Constructor
		 */
		public function __construct() {
			$this->firstNode = null;
			$this->lastNode = null;
			$this->count = 0;
			$this->testlog = Logger::getLogger('unittest');
		}
		
		/**
		 * Determines if the Linked List is empty
		 * 
		 * @return boolean
		 */
		public function isEmpty() {
			if($this->count == 0) {
				return true;
			}
			else {
				return false;
			}
		}
		
		/**
		 * Gets the total number of nodes in the Linked List
		 * 
		 * @return number
		 */
		public function getCount() {
			return $this->count;
		}
		
		/**
		 * Returns readable concatenation of Node data
		 * Can traverse the list backwards and forwards
		 * 
		 * @param string $delimiter
		 * @param bool $forward
		 */
		public function toString($delimiter=",",$forward=true) {
			$result = "";
			
			$curNode = $this->firstNode;
			if(!$forward) {
				$curNode = $this->lastNode;
				if($curNode != null) {
					$result = $curNode->getData();
				}
			}
			
			// traverse list to concatenate a string result
			while($curNode != null) {
				if($forward) {
					$result = $result.$curNode->getData();
					$curNode = $curNode->next;
					
					if($curNode != null) {
						$result = $result.$delimiter;
					}
				}
				else {
					$curNode = $curNode->prev;
					
					if($curNode != null) {
						$result = $curNode->getData().$delimiter.$result;
					}
				}
			}
				
			return $result;
		}
		
		/**
		 * Gets first node of Linked List
		 * 
		 * @return DoubleLinkNode
		 */
		public function getFirstNode() {
			return $this->firstNode;
		}
		
		/**
		 * Gets last node of Linked List
		 * 
		 * @return DoubleLinkNode
		 */
		public function getLastNode() {
			return $this->lastNode;
		}
		
		/**
		 * Inserts a node at the beginning of the Linked List
		 * 
		 * @param DoubleLinkNode $_node
		 * @throws Exception
		 */
		public function insertFirst($_node) {
			$this->checkNode($_node,"");
			
			if($this->firstNode != null) {
				$this->firstNode->prev = $_node;
			}
			$_node->next = $this->firstNode;
			$this->firstNode = $_node;
			
			$this->count++;
			
			if($this->lastNode == null) {
				$this->lastNode = &$_node;
			}
		}
		
		/**
		 * Inserts a node at the end of the Linked List
		 * 
		 * @param DoubleLinkNode $_node
		 * @throws Exception
		 */
		public function insertLast($_node) {
			$this->checkNode($_node,"");
			
			if($this->firstNode == null) {
				$this->insertFirst($_node);
			}
			else {
				$_node->prev = $this->lastNode;
				$this->lastNode->next = $_node;
				$this->lastNode = &$_node;
				
				$this->count++;
			}
		}
		
		/**
		 * Inserts a node after the given parent node
		 * 
		 * @param DoubleLinkNode $_parentNode
		 * @param DoubleLinkNode $_node
		 * @throws Exception
		 */
		public function insertAfter($_parentNode, $_node) {
			$this->checkNode($_node,"Parent");
			
			$curNode = $this->getNode($_parentNode, true);
			
			// if getNode comes back null, the _parentNode isn't in this list
			if($curNode == null) {
				throw new Exception("Node not found");
			}
			
			$_node->prev = $curNode;
			$_node->next = $curNode->next;
			$curNode->next->prev = $_node;
			$curNode->next = $_node;
			
			if ($this->lastNode == null) {
				$this->lastNode = &$_node->next;
			}
			else if($_node->next == null) {
				$this->lastNode = $_node;
			}
			
			$this->count++;
		}
		
		/**
		 * Gets a given node of the Linked List
		 * Traverses either forward or backward
		 * 
		 * @param DoubleLinkNode $_node
		 * @param bool $forward
		 * @throws Exception
		 * @return DoubleLinkNode
		 */
		public function getNode($_node, $forward=true) {
			$this->checkNode($_node,"");
			
			$curNode = $this->firstNode;
			if(!$forward) {
				$curNode = $this->lastNode;
			}
				
			// traverse list to find parent node passed in
			while($curNode != null && $curNode->getData() != $_node->getData()) {
				if($forward) {
					$curNode = $curNode->next;
				}
				else {
					$curNode = $curNode->prev;
				}
			}
			
			return $curNode;
		}
		
		/**
		 * Removes the first node of the Linked List
		 * 
		 * @throws Exception
		 */
		public function removeFirst() {
			if($this->firstNode == null) {
				throw new Exception("No nodes to remove from list");
			}
			
			$this->firstNode = $this->firstNode->next;
			$this->count--;
			
			if($this->firstNode == null) {
				$this->lastNode = null;
			}
		}
		
		/**
		 * Removes the last node of the Linked List
		 * 
		 * @throws Exception
		 */
		public function removeLast() {
			if($this->firstNode == null) {
				throw new Exception("No nodes to remove from list");
			}
			
			// keep track of the last two nodes
			$prevNode = $this->firstNode;
			$curNode = $this->firstNode->next;
			
			if ($curNode == null) {
				// only one node, just remove it
				$this->firstNode = null;
				$this->lastNode = null;
				$this->count--;
			} else {
				// traverse list to find the second to last node
				while ($curNode != null) {			
					if ($curNode->next == null) {
						$prevNode->next = null;
						$this->lastNode = $prevNode;
						
						$this->count--;
						
						break;
					} else {
						$prevNode = $curNode;
						$curNode = $curNode->next;
					}
				}
			}
		}
		
		/**
		 * Removes a node after the given parent node
		 * 
		 * @param DoubleLinkNode $_parentNode
		 * @throws Exception
		 */
		public function removeAfter($_parentNode) {
			$this->checkNode($_parentNode,"Parent");
			
			$curNode = $this->getNode($_parentNode, true);
			
			// if getNode comes back null, the _parentNode isn't in this list
			if($curNode == null) {
				throw new Exception("Node not found");
			}
			
			$tempNode = $curNode->next;
			$curNode->next = $tempNode->next;
			$tempNode->next->prev = $curNode;
			
			$tempNode->next = null;
			$tempNode->prev = null;
			
			$this->count--;	
		}
		
		/**
		 * Reverses the order of the Linked List
		 */
		public function reverseList() {
		    if($this->firstNode != null)
	        {
	            if($this->firstNode->next != null)
	            {
	            	// start with the first node
	                $current = $this->firstNode;
	                // set our last node
	                $this->lastNode = $current;
	                $new = null;
	 
	                while ($current != NULL)
	                {
	                	// temporarily hold next node
	                    $temp = $current->next;
	                    // break link and reset to previous node
	                    $current->next = $new;
	                    // set previous link to temp
	                    $current->prev = $temp;
	                    // set new previous node
	                    $new = $current;
	                    // set new current node
	                    $current = $temp;
	                }
	                $this->firstNode = $new;
	            }
	        }
		}
		
		/**
		 * Checks for null or non DoubleLinkNode variables
		 * 
		 * @param DoubleLinkNode $_node
		 * @param string $str
		 * @throws Exception
		 */
		private function checkNode($_node, $str) {
			if($_node == null) {
				throw new Exception($str."Node is null");
			}
			if(!($_node instanceof DoubleLinkNode)) {
				throw new Exception($str."Node is not an instance of DoubleLinkNode");
			}
		}
	}
?>