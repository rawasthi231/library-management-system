<?php
// the message
$msg = "Hello\nRaghvendra Awasthi";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("awasthiraghav59@gmail.com","Test mail",$msg);
?>