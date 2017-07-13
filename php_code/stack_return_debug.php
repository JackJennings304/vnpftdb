<?php session_start(); ?>
<?php
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . '/vnpftdb/php_code';
include "$php_root/call_stack_functions.php";
?>
<?php
function call_stack_remove_debug() {
  $cur_stack = $_SESSION["call_stack"];
  echo 'DBG: cur_stack = '. $cur_stack . '<br><br>';
  if ($cur_stack == '') { return ''; }
  if (strchr($cur_stack,'|') == '' ) {
    $_SESSION["call_stack"] = '';
    return '';
  }
  echo 'DBG: cur_stack = '. $cur_stack . '<br><br>';
  $last_delim_and_node = strrchr($cur_stack,'|');
  echo 'DBG: last_delim_and_node = ' . $last_delim_and_node . '<br><br>';
  $new_len = strlen($cur_stack) - strlen($last_delim_and_node);
  echo 'DBG: new_len = ' . $new_len . '<br><br>';
  $_SESSION["call_stack"] = substr($cur_stack,0,$new_len);
  $new_stack = $_SESSION["call_stack"];
  echo 'DBG: new_stack = ' . $new_stack . '<br><br>';
  $last_delim_and_node = strrchr($new_stack,'|');
  echo 'DBG: last_delim_and_node = ' . $last_delim_and_node . '<br><br>';
  if ($last_delim_and_node == '') { return $new_stack; }
  $parent = substr($last_delim_and_node,1,strlen($last_delim_and_node)-1);
  echo 'DBG: parent = ' . $parent . '<br><br>';
  return $parent;
}
?>
<html>
<head>
</head>
<body>

<?php $parent = call_stack_remove_debug(); ?><br>
</body>
</html>
