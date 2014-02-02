<?php 

include_once 'linkedlist.php';

$l = new LinkedList(new Node("hello"));
$l->add("world");
$l->addItems(array(
	"craig",
	"Jim",
	array("baudbsadj", "sadhjadsb")
));

$l->remove();
echo "List is this big: " . $l->size();
$l->walk(function($current) {
	var_dump($current->getData());
	echo "<br>";
});

?>