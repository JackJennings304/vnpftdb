<?php session_start(); ?>
<?php
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
?>
<?php call_stack_clear(); ?>
<?php call_stack_add(who_am_i()); ?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Central Proc</title>
  <link rel="icon" type="image/x-icon" href="../images/favicon.ico" />
</head>

<body>
<?php if($_SESSION['debug'] == 'ON') { echo $_SESSION['call_stack'] . "<br><br>"; } ?>

<div class="wrapper">
<div class="container-fluid">
<div class="row">

<div class = "col-sm-8">
  <h1>
    Central Processing<br>
    coming soon!
  </h1>
</div>

<br> <br> <br> <br> <br> <br> <br> <br>


</div> </div> </div>
</body>
</html>
