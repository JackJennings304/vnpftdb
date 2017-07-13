<?php session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
?>
<html>
<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Error</title>
  <link rel="icon" type="image/x-icon" href="/vnpftdb/images/favicon.ico" />
</head>

<body>
<?php if($_SESSION['debug'] == 'ON') { echo $_SESSION['call_stack'] . "<br><br>"; } ?>

<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<div class="page-header">
  <h1>Invalid Request</h1>
</div>

<div class="alert alert-danger fade in">
  <p>I apologize.  An error occurred with this program.
    Please click
    <a
      href="/vnpftdb/php_code/die.php"
      class="alert-link"
      >
      here
    </a> to close session.
	</p>

</div>
</div>
</div>
</div>
</div>
</body>
</html>
