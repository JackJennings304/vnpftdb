<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . '/vnpftdb/php_code';
include "$php_root/call_stack_functions.php";
?>
<?php $parent = call_stack_remove(); ?><br>
<?php header("Location: $parent"); ?>
