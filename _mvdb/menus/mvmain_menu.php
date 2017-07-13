<?php session_start(); ?>
<?php
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
  <title>MI Voters Main Menu</title>
  <link rel="icon" type="image/x-icon" href="/vnpftdb/images/favicon.ico" />
</head>

<body>

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
<!---------------------------------------------------------->
<div class="col-sm-2">
    <a
      href="/vnpftdb/php_code/stack_call.php?child=/vnpftdb/_mvdb/app_screens/mv_lookup/mvlookup_get_parms.php"
      class="btn btn-sm btn-default"
      style="background-color: buttonface"
    >
    MI Voter Lookup
    </a>
</div>


<!---------------------------------------------------------->
</div>
</div>

</body>

</html>
