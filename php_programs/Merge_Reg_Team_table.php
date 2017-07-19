<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Merge Reg_team</title>
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
	<h2>Merge reg_teams Table</h2>
</div>
<form
  class="form-horizontal"
  method="post"
>

<div class="form-group">
  <p class = "col-sm-8">
    This step merges the newly built NB_TAG_MAP region-teams with the reg_teams table.<br>
    The <b>reg_teams_add</b> procedure adds Reviewed records to the table that don't already exist<br>
    The <b>reg_teams_delete</b> procedure marks reg_teams records as DELETED if they no longer exist in nb_tag_map<br>
    The <b>reg_teams_update</b> procedure re-enables records previously marked DELETED if they show up again in nb_tab_map<br>
    Click the Merge button to run the process.
  </p>
</div>

<div class = "form-group">
<div class = "col-sm-2">
<input
  type="submit"
  class="btn btn-primary"
  value="Merge"
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

$sql  = "CALL reg_teams_add()";
if ( mysqli_query($ftdb, $sql) ) {
} else {
  echo "ERROR: Could not execute $sql <br>";
  echo mysqli_error($ftdb);
}

$sql  = "CALL reg_teams_delete()";
if ( mysqli_query($ftdb, $sql) ) {
} else {
  echo "ERROR: Could not execute $sql <br>";
  echo mysqli_error($ftdb);
}

$sql  = "CALL reg_teams_update()";
if ( mysqli_query($ftdb, $sql) ) {
} else {
  echo "ERROR: Could not execute $sql <br>";
  echo mysqli_error($ftdb);
}

$sql  = "UPDATE globals";
$sql .= " SET DATE_01 = NOW()";
$sql .= " WHERE KEY_NAME = 'nb_to_vnpftdb_synch_steps'";
$sql .= " AND   KEY_02   = '6'";
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
