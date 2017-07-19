<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Merge NB_TAGS into NB_TAG_MAP</title>
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
	<h2>Merge NB_TAGS into NB_TAG_MAP</h2>
</div>
<form
  class="form-horizontal"
  method="post"
>

<div class="form-group">
  <p class = "col-sm-8">
    This step adds new records into NB_TAG_MAP <br>
    and deletes obsolete records from NB_TAG_MAP.<br>
    Step 4: Merge NB_TAGS into NB_TAG_MAP.<br>
    The NB_TAG_MAP is the table which converts the multiple variations of tags being used within
     the Nation Builder system into a structured set of fields.  They are<br>
    REGION.  A region number ex: 3<br>
    TEAM.   Just the last part of the commonly used REG_TEAM.  Ex: 9.  In this case, REG_TEAM would be 3-9.<br>
    DIRECTOR.  	Contains an “X” if a tag indicates this person is a Director.<br>
    CAPTAIN.	Contains an “X” if a tag indicates this person is a Captain.<br>
    CIRCULATOR	Contains an “X” if a tag indicates this person is a Circulator<br>
    <br>
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

$sql  = "CALL NB_TAG_MAP_add()";
if ( mysqli_query($ftdb, $sql) ) {
} else {
  echo "ERROR: Could not execute $sql <br>";
  echo mysqli_error($ftdb);
}
$sql  = "CALL NB_TAG_MAP_delete()";
if ( mysqli_query($ftdb, $sql) ) {
} else {
  echo "ERROR: Could not execute $sql <br>";
  echo mysqli_error($ftdb);
}

$sql  = "UPDATE globals";
$sql .= " SET DATE_01 = NOW()";
$sql .= " WHERE KEY_NAME = 'nb_to_vnpftdb_synch_steps'";
$sql .= " AND   KEY_02   = '4'";
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
