<?php session_start(); ?>
<?php include 'call_stack_functions.php'; ?>
<?php
$child = $_GET["child"];
call_stack_add($child);
header("Location: $child"); 
?>
