<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Review NB_TAG_MAP</title>
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
	<h2>Review NB_TAG_MAP</h2>
</div>
<form
  class="form-horizontal"
  method="post"
>

<div class="form-group">
  <p class = "col-sm-8">
    This is a manual step.<br>
  </p>
</div>
<div class = "form-group">
  <div class = "col-sm-1"> </div>
  <div class = "col-sm-10">
    <ul>
    <li>manually review and code any new mappings the NB_TAG_MAP table in MySQL Workbench.</li>
    <li>Execute in an SQL window: SELECT * FROM NB_TAG_MAP WHERE REVIEWED &lt;&gt; 'X'</li>
    <li>Make changes in the resulting grid.</li>
    <li>Put an ‘X’ in the REVIEWED column to indicate this record is mapped.</li>
    <li>If the tag represents a Director, put an ‘X’ in the DIRECTOR column.</li>
    <li>If the tag represents a Captain, put an ‘X’ in the CAPTAIN column.</li>
    <li>If the tag represents a Circulator, put an ‘X’ in the CIRCULATOR column.</li>
    <li>If the tag indicates a Region, put the Region number in the REGION column.</li>
    <li>If the tag indicates a Team, put just the Team#, not the whole 9-3, but just the 3 in the TEAM column.</li>
    <li>After making all the changes, click Apply.
      MySQL Workbench displays the corresponding SQL script to make the requested changes.  Click “Apply” to save the changes.</li>
    </ul>
  </div>
</div>
<div class = "form-group">
<div class = "col-sm-8">
  <p>
    When you have completed this process, click the "Complete" button to mark the step complete.
  </p>
</div>
</div>


<div class = "form-group">
<div class = "col-sm-2">
<input
  type="submit"
  class="btn btn-primary"
  value="Complete"
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

$sql  = "UPDATE globals";
$sql .= " SET DATE_01 = NOW()";
$sql .= " WHERE KEY_NAME = 'nb_to_vnpftdb_synch_steps'";
$sql .= " AND   KEY_02   = '5'";
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
