<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
?>
<?php call_stack_clear(); ?>
<?php call_stack_add(who_am_i()); ?>

<html>

<head>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/themes/cupertino/jquery-ui.css" type="text/css" media="all">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>Sys Admin menu</title>
  <link rel="icon" type="image/x-icon" href="/vnpftdb/images/favicon.ico" />
</head>

<body>
<?php $_SESSION["user_role"] = "sysadmin"; ?>
<?php $_SESSION["called_by"] = "/vnpftdb/menus/sysadmin.php"; ?>

<div
  style="background-color:#33D"
  overflow="hidden"
  display="block"
  >
  <img src="../images/vnp_logo_400a.png">
</div>

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
  echo $anchor
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
  echo $anchor
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
  echo $anchor
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
  echo $anchor
  ?>
</div>

</div>  </div>

</body>

</html>
