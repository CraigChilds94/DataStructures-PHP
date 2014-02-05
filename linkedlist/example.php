<?php 

/**
 *	Example use of the linked list class
 *	Craig Childs 2014
 */
include_once 'linkedlist.php';

// Create a new l-list obj with a starting node "hello"
$l = new LinkedList(new Node("hello"));

// Add a new item "world"
$l->add("world");

// Add multiple items.... 
$l->addItems(array(
	"craig",
	"Jim",
	array("baudbsadj", "sadhjadsb")
));

// Remove an item from the list
$l->remove();

// Get the size of the list
echo "List is this big: " . $l->size();

// Walk through the list running a callback anonymous function and passing
// the current item in the list each time.
$l->walk(function($current) {

	// Get the data from the list item
	var_dump($current->getData());
	echo "<br>";
});

?>