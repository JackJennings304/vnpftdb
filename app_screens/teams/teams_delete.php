<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";
?>
<?php

if ( isset($_POST["reg_team"]) && !empty($_POST["reg_team"]) ) {
	$reg_team = $_POST["reg_team"];
  $sql  = "DELETE FROM reg_teams";
	$sql .= " WHERE REG_TEAM = '$reg_team'";
	if(mysqli_query($ftdb, $sql)) {
	} else{
		echo "ERROR: Could not execute $sql. " . mysqli_error($ftdb);
	}
  mysqli_close($ftdb);
  include "$php_root/stack_return_within_php.php";
  exit();
}
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Delete Region-Team Record</title>
  <link rel="icon" type="image/x-icon" href="/vnpftdb/images/favicon.ico" />

  <script>
  function validateForm() { }
  </script>
</head>

<body>
<?php if($_SESSION['debug'] == 'ON') { echo $_SESSION['call_stack'] . "<br><br>"; } ?>

<?php	$region = $_GET["REG_TEAM"];	?>

<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<div class="page-header clearfix">
  <div class = "form-group">
    <h1>VNP Field Team Database</h1>
    <h2>Delete Region-Team Record: <?php echo $reg_team ?></h2>
  </div>
</div>

<form
  name     = "mainForm"
  class    = "form-horizontal"
  method   = "post"
  onsubmit = "return validateForm()"
  >

<div class="alert alert-danger fade in">

<div class="form-group">
  <input
    type  = "hidden"
    name  = "reg_team"
    value = "<?php echo $reg_team; ?>"
    >
    <p>Are you sure you want to delete this record?</p><br>
</div>

<div class="form-group">

  <div class="col-sm-2">
    <input
      type  = "submit"
      class = "btn btn-danger"
      value = "Yes"
      >
  </div>

  <div class="col-sm-2">
    <a
      href="/vnpftdb/php_code/stack_return.php"
      class="btn btn-default"
      >
      No
    </a>
  </div>
</div>

</div>

</form>

</div>  </div>  </div>  </div>

</body>

</html>
