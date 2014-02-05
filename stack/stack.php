<?php

/**
 *	PHP implementation of the stack data structure using arrays
 *  Craig Childs 2014
 */

class Stack {

	private $size =  0;	 // Stores the size of the stack
	private $top  = -1;	 // Stores the index of the top of the stack
	private $stack = array();

	/**
	 *	Construct a new stack
	 */
	public function __construct() {
		$this->size = 0;
		$this->top = -1;
	}

	/**
	 *	Push a new item onto the stack
	 *  @param the item to add to the stack
	 */
	public function push($item) {
		$this->top++;
		$this->stack[$this->top] = $item;
		$this->size++;
	}

	/**
	 *	Remove and return the top of the stack
	 *  @return the item on the top of the stack or null
	 */
	public function pop() {
		if($this->size > 0) {
			$temp = $this->stack[$this->top];
			$this->stack[$this->top] = null;
			$this->top--;
			$this->size--;
			return $temp;
		}

		return null;
	}

	/**
	 *	Get the size of the stack
	 *  @return the size
	 */
	public function size() {
		return $this->size;
	}

	/**
	 *	Get the item on the top of the stack without popping e.g. peek
	 *  @return the item on the top of the stack or null
	 */
	public function top() {
		return $this->stack[$this->top];
	}
}

?>