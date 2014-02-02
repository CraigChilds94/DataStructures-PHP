<?php

class Node {

	private $next, $prev;
	private $data;

	/**
	 *	Construct a new node within a linked list
	 *	@param data, The data which this node holds
	 *  @param (Node) prev, the node before this node in the list
	 *  @param (Node) next, the node after this node in the list 
	 */
	public function __construct($data, Node $prev = null, Node $next = null) {
		$this->data = $data;
		$this->prev = $prev;
		$this->next = $next;
	}

	/**
	 *	SETTERS
	 */

	public function setNext($next) {
		$this->next = $next;
	}

	public function setPrev($prev) {
		$this->prev = $prev;
	}

	public function setData($data) {
		$this->data = $data;
	}

	/**
	 *  GETTERS
	 */

	public function getNext() {
		return $this->next;
	}

	public function getPrev() {
		return $this->prev;
	}

	public function getData() {
		return $this->data;
	}
}
	
class LinkedList {

	private $head, $tail, $size;

	/**
	 *	Construct a new list from just a head node
	 *  @param (Node) head, the starting head node
	 */
	public function __construct(Node $head = null) {
		$this->head = $head;
		$this->tail = $this->head;
		$this->size++;
	}

	/**
	 *	Add a new node to the list
	 *  @param data, the data the node contains
	 *  @param index, and optional index stating where to place the new node
	 */
	public function add($data, $index = false) {
		// Add to the end of the list
		if(!$index || ($index > ($this->size - 1) || $index < 0)) {
			$node = new Node($data, $this->tail);
			$this->tail->setNext($node);
			$this->tail = $node;
			$this->size++;
			return;
		}

		// Add into a position of the list
		$i = 0;
		$current = $this->head;
		while($i <= $index) {
			if($i == $index) {
				$node = new Node($data, $current->getPrev(), $current);
				$current->setPrev($node);
				break;
			}

			$current = $current->getNext();
			$i++;
		}

		$this->size++;
		return;
	}

	/**
	 *	Add an array of items
	 *	@param items, an array of items to be added
	 */
	public function addItems(array $items) {
		foreach($items as $item) {
			$this->add($item);
		}
	}

	/**
     *	Remove an item from the list
     *	@param index, the index of the item to remove if empty remove last
     */
	public function remove($index = null) {
		// If no index is defined or its out of our boundary remove last
		if($index != null || ($index > ($this->size - 1) || $index < 0)) {
			$current = $this->tail->getPrev();
			$this->tail = $current;
			$this->tail->setNext(null);
			$this->size--;
			return;
		}
		// Otherwise find the item and remove it using its index
		$i = 0;
		$current = $this->head;
		while($i <= $index) {
			if($i == $index) {
				if($current->getPrev() != null) {
					$current->getPrev()->setNext($current->getNext());
					$current->getNext()->setPrev($current->getPrev());
				} else {
					$this->head = $this->head->getNext();
					$this->head->setPrev(null);
				}

				break;
			}

			$current = $current->getNext();
			$i++;
		}

		$this->size--;
		return;

	}

	/**
	 *	Walk along the list calling a funcion and passing the node as a param
	 *	@param callback, a callback function
	 */
	public function walk($callback) {
		$current = $this->head;
		while($current != null) {
			$callback($current);
			$current = $current->getNext();
		}
	}

	/**
	 *	Get the size of the list
	 *  @return the size of the list
	 */
	public function size() {
		return $this->size;
	}
}
?>