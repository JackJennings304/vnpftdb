<?php session_start(); ?>
<?php
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Region Ldrbrd</title>
  <link rel="icon" type="image/x-icon" href="../images/favicon.ico" />
</head>

<body>
<?php if($_SESSION['debug'] == 'ON') { echo $_SESSION['call_stack'] . "<br><br>"; } ?>

<div class="wrapper">
<div class="container-fluid">
<div class="row">

<div class = "col-sm-10">
  <h1>
    Region Leaderboard Report - Verified Signatures<br>
    coming soon!
  </h1>
</div>

<br> <br> <br> <br> <br> <br> <br> <br>

<div class = "col-sm-2">
  <a
    href  = "/vnpftdb/php_code/stack_return.php"
    class = "btn btn-success"
    >
    Back
  </a>
</div>

</div> </div> </div>
</body>
</html>
