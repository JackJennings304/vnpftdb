<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
?>
<?php call_stack_clear(); ?>
<?php call_stack_add(who_am_i()); ?>
<?php $_SESSION['Cur_top_menu'] = "/vnpftdb/menus/sysadmin.php"; ?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Sys Admin menu</title>
  <link rel="icon" type="image/x-icon" href="/vnpftdb/images/favicon.ico" />
</head>

<body>
<?php if($_SESSION['debug'] == 'ON') { echo $_SESSION['call_stack'] . "<br><br>"; } ?>

<?php include "$php_root/header_logo.php" ?>

<h1>Voters Not Politicians Field Team Database</h1>
<h2>System Administrators Menu</h2>
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
  $anchor .= "/vnpftdb/app_screens/regions/regions_list.php";
  $anchor .= "'";
  $anchor .= ' class = "btn btn-sm btn-default"';
  $anchor .= ' style = "background-color: buttonface"';
  $anchor .= ">";
  $anchor .= "Regions List";
  $anchor .= "</a>";
  echo $anchor;
  ?>
</div>

<div class="col-sm-2">
  <?php
  $anchor  = "<a";
  $anchor .= " href='";
  $anchor .= "/vnpftdb/php_code/stack_call.php?";
  $anchor .= "child=";
  $anchor .= "/vnpftdb/app_screens/teams/teams_list.php";
  $anchor .= "'";
  $anchor .= ' class = "btn btn-sm btn-default"';
  $anchor .= ' style = "background-color: buttonface"';
  $anchor .= ">";
  $anchor .= "Teams List";
  $anchor .= "</a>";
  echo $anchor;
  ?>

</div>

<div class="col-sm-2">
  <?php
  $anchor  = "<a";
  $anchor .= " href='";
  $anchor .= "/vnpftdb/php_code/stack_call.php?";
  $anchor .= "child=";
  $anchor .= "/vnpftdb/app_screens/captains/captains_list.php";
  $anchor .= "'";
  $anchor .= ' class = "btn btn-sm btn-default"';
  $anchor .= ' style = "background-color: buttonface"';
  $anchor .= ">";
  $anchor .= "Captains List";
  $anchor .= "</a>";
  echo $anchor;
  ?>
</div>

<div class="col-sm-2">
  <?php
  $anchor  = "<a";
  $anchor .= " href='";
  $anchor .= "/vnpftdb/php_code/stack_call.php?";
  $anchor .= "child=";
  $anchor .= "/vnpftdb/app_screens/circulators/circulators_list.php";
  $anchor .= "'";
  $anchor .= ' class = "btn btn-sm btn-default"';
  $anchor .= ' style = "background-color: buttonface"';
  $anchor .= ">";
  $anchor .= "Circulators List";
  $anchor .= "</a>";
  echo $anchor;
  ?>
</div>

</div>  </div>

</body>

</html>
