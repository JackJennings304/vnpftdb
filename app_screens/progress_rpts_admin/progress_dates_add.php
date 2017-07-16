<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";

$meas_date    = "";
$meas_week    = "";

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
  $meas_date   = trim($_POST["meas_date"]);
  $meas_week   = trim($_POST["meas_week"]);

	$sql  = "INSERT INTO progress_dates";
	$sql .= " (MEAS_DATE, MEAS_WEEK)";
	$sql .= " VALUES (";
	$sql .= " '$meas_date'";
	$sql .= ", $meas_week";
	$sql .= ")";
	if(mysqli_query($ftdb, $sql)){
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($ftdb);
	}
  mysqli_close($ftdb);
  include "$php_root/stack_return_within_php.php";
  exit();
}
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>New Progress Dt</title>
  <link rel="icon" type="image/x-icon" href="/vnpftdb/images/favicon.ico" />

  <script>
  function validateForm() {
  }
  </script>
</head>

<body>
<?php if($_SESSION['debug'] == 'ON') { echo $_SESSION['call_stack'] . "<br><br>"; } ?>

<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<div class="page-header clearfix">
  <div class = "form-group">
    <div class = "col-sm-1">
      <a
        href  = "/vnpftdb/php_code/stack_return.php"
        class = "btn btn-success"
        >
        Back
      </a>
    </div>
  </div>
  <br>
  <div class = "form-group">
    <h1>VNP Field Team Database</h1>
    <h2>Create new Progress Date</h2>
    <p>Progress Dates define the weeks of the Campaign.</p>
  </div>
</div>

<form
  name     = "mainForm"
  class    = "form-horizontal"
  method   = "post"
  onsubmit = "return validateForm()"
  >

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="meas_date"
    >
    Measure Date:
  </label>
  <div class="col-sm-2">
      <input
        type  = "date"
        name  = "meas_date"
        class = "form-control"
        value = "<?php echo $meas_date; ?>";
        required
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="meas_week"
    >
    Measure Week:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "meas_week"
        class = "form-control"
        value = "<?php echo $meas_week; ?>";
        required
        >
  </div>
</div>

<div class="form-group">

  <div class = "col-sm-3">    </div>
  <div class="col-sm-2">
    <input
      type  = "submit"
      class = "btn btn-primary"
      value = "Submit"
      >
  </div>

  <div class="col-sm-2">
    <a
      href="/vnpftdb/php_code/stack_return.php"
      class="btn btn-default"
      >
      Cancel
    </a>
  </div>
</div>

</form>

</div>  </div>  </div>  </div>

</body>

</html>
