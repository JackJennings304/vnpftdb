<?php session_start(); ?>
<?php
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
?>
<?php call_stack_clear(); ?>
<?php call_stack_add(who_am_i()); ?>
<?php $_SESSION['Cur_top_menu'] = "/vnpftdb/menus/captain.php"; ?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>MI Voters Main Menu</title>
  <link rel="icon" type="image/x-icon" href="/vntftdb/images/favicon.ico" />
</head>

<body>
<?php if($_SESSION['debug'] == 'ON') { echo $_SESSION['call_stack'] . "<br><br>"; } ?>

<?php include "$php_root/header_logo.php" ?>

<h1>Voters Not Politicians MI Voters Database</h1>
<h2>MI Voters Main Menu</h2>
<br>


<nav
  class="navbar navbar-default"
  style = "background-color:#33D"
  >
<div class="container-fluid">
<div class="row" style="background-color:#33D; padding-top:5px">

<div class="col-sm-2">
  <?php
  $anchor  = "<a";
  $anchor .= " href='";
  $anchor .= "/vnpftdb/php_code/stack_call.php?";
  $anchor .= "child=";
  $anchor .= "/vnpftdb/_mvdb/app_screens/mv_lookup/mvlookup_get_parms.php";
  $anchor .= "'";
  $anchor .= ' class = "btn btn-sm btn-default"';
  $anchor .= ' style = "background-color: buttonface"';
  $anchor .= ">";
  $anchor .= "MI Voter Lookup";
  $anchor .= "</a>";
  echo $anchor
  ?>
</div>

</div>  </div>

</body>

</html>
