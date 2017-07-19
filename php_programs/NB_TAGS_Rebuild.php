<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Rebuild NB_TAGS</title>
  <link rel="icon" type="image/x-icon" href="/vnpftdb/images/favicon.ico" />
</head>

<body>
<?php if($_SESSION['debug'] == 'ON') { echo $_SESSION['call_stack'] . "<br><br>"; } ?>
<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<h1>VNP Field Team Database</h1>

<div class="page-header">
	<h2>Rebuild NB_TAGS</h2>
</div>
<form
  class="form-horizontal"
  method="post"
>

<div class="form-group">
  <p class = "col-sm-8">
    This step rebuilds an intermediate table called NB_TAGS.<br>
    Click the Rebuild button to run the process.
  </p>
</div>

<div class = "form-group">
<div class = "col-sm-2">
<input
  type="submit"
  class="btn btn-primary"
  value="Rebuild"
  >
</div>
<div class = "col-sm-2">
  <a
    href  = "/vnpftdb/php_code/stack_return.php"
    class = "btn btn-default"
    >
    Cancel
  </a>
</div>

</div>


</form>

</body>


<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {

$sql  = "CALL NB_TAGS_Build()";
if ( mysqli_query($ftdb, $sql) ) {
} else {
  echo "ERROR: Could not execute $sql <br>";
  echo mysqli_error($ftdb);
}

$sql  = "UPDATE globals";
$sql .= " SET DATE_01 = NOW()";
$sql .= " WHERE KEY_NAME = 'nb_to_vnpftdb_synch_steps'";
$sql .= " AND   KEY_02   = '3'";
if (mysqli_query($ftdb, $sql)) {
} else {
  echo "ERROR: Could not execute <br>";
  echo "$sql<br>";
  echo mysqli_error($ftdb);
}

include "$php_root/stack_return_within_php.php";
exit();
}
?>

</html>
