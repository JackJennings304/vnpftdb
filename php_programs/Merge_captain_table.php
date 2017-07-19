<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Merge Captain Table</title>
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
	<h2>Merge Captain Table</h2>
</div>
<form
  class="form-horizontal"
  method="post"
>

<div class="form-group">
  <p class = "col-sm-8">
    This step merges the newly built NB_TAG_MAP captains and their assignments with the captains table.<br>
    The <b>captains_add</b> procedure adds captain records to the table that were added in NB<br>
    The <b>captains_delete</b> procedure marks captains records as DELETED if they no longer exist as a Captain in NB<br>
    The <b>captains_merge</b> procedure updates the team assignment and city for existing records<br>
    Note that for captains assigned to multiple teams, the merge process picks the first one it finds to load
    into the Captains table<br>
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

$sql  = "CALL captains_add()";
if ( mysqli_query($ftdb, $sql) ) {
} else {
  echo "ERROR: Could not execute $sql <br>";
  echo mysqli_error($ftdb);
}

$sql  = "CALL captains_delete()";
if ( mysqli_query($ftdb, $sql) ) {
} else {
  echo "ERROR: Could not execute $sql <br>";
  echo mysqli_error($ftdb);
}

$sql  = "CALL captains_merge()";
if ( mysqli_query($ftdb, $sql) ) {
} else {
  echo "ERROR: Could not execute $sql <br>";
  echo mysqli_error($ftdb);
}

$sql  = "UPDATE globals";
$sql .= " SET DATE_01 = NOW()";
$sql .= " WHERE KEY_NAME = 'nb_to_vnpftdb_synch_steps'";
$sql .= " AND   KEY_02   = '7'";
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
