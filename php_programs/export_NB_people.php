<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>export NB People</title>
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
	<h2>Export Nation Builder People</h2>
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
    <ol>
    <li> From the People view, click the “More” dropdown and choose “Export”.</li>
    <li>In the Export screen, select the “People” radio button and click the “Customize fields to export” button.</li>
    <li>Click the “Export all fields” button.</li>
    <li>The export will commence and you will proceed to the “Past exports” screen.
    Your export with be in-progress for about five minutes.</li>
    <li>When it completes, a filename will appear in the “File” column for your export.
    Click on the file link to copy it to your desktop.</li>
    <li>Once downloaded, delete the export file from the NB server.</li>
    <li>Save it to the location  C:\wamp\tmp</li>
    <li>And rename it to synch_to_vnpftdb.csv</li>
    <li>You may need to create these folders.  This is necessary because the load into the
    VNP Fld Team Database looks for a file at   C:\wamp\tmp\synch_to_vnpftdb.csv</li>
    <li>If there is already a file called “synch_to_vnpftdb.csv”
      rename it to “sync_to_vnpftdb_2017_07_09.csv” (using today’s date).</li>
    </ol>
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
$sql .= " AND   KEY_02   = '1'";
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
