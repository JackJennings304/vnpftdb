<?php

function who_am_i()         { return $_SERVER["PHP_SELF"]; }

function call_stack_clear() {  $_SESSION["call_stack"] = ''; }

function call_stack_add($child)   {
  if ($_SESSION["call_stack"] != '') {  $_SESSION["call_stack"] .= '|';  }
  $_SESSION["call_stack"] .= $child;
}

function call_stack_remove() {
  $cur_stack = $_SESSION["call_stack"];
  if ($cur_stack == '') { return ''; }
  if (strchr($cur_stack,'|') == '' ) {
    $_SESSION["call_stack"] = '';
    return '';
  }
  $last_delim_and_node = strrchr($cur_stack,'|');
  $new_len = strlen($cur_stack) - strlen($last_delim_and_node);
  $_SESSION["call_stack"] = substr($cur_stack,0,$new_len);
  $new_stack = $_SESSION["call_stack"];
  $last_delim_and_node = strrchr($new_stack,'|');
  if ($last_delim_and_node == '') { return $new_stack; }
  $parent = substr($last_delim_and_node,1,strlen($last_delim_and_node)-1);
  return $parent;
}
?>
