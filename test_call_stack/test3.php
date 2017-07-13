<?php session_start(); ?>
<?php
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
?>
<html>
<head></head>
<body>
call_stack = <?php echo $_SESSION["call_stack"]; ?><br>
<br>
<a
  href="/vnpftdb/php_code/stack_return.php"
>
Return to calling module
</a>
<br><br>

<a
  href="/vnpftdb/php_code/stack_call.php?child=/vnpftdb/test_call_stack/test3.php"
>
Recursive Call inline test3.php</a>

</body>
</html>
