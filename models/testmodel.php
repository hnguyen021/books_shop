<?php
require_once("Book.php");
require_once("Bill.php");
$l = Bill::getByUser(1);
print_r($l);
?>