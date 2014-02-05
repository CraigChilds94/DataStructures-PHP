<?php

/**
 *	Example use of the stack class
 *	Craig Childs 2014
 */
include_once 'stack.php';

// Create a new stack object
$s =  new Stack();

// Push some data
$s->push("Hello");
$s->push("World");

// Print out stack size
var_dump($s->size());

// Pop an element
var_dump($s->pop());

// Print the top element
var_dump($s->top());

?>