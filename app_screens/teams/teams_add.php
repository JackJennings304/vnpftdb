<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";
?>
<?php
$reg_team        = "";
$territory_name  = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $reg_team       = trim($_POST["reg_team"]);
	$territory_name = trim($_POST["territory_name"]);

	$sql  = "INSERT INTO reg_teams";
	$sql .= " (REG_TEAM, TERRITORY_NAME)";
	$sql .= " VALUES (";
	$sql .= "'$reg_team'";
	if ($territory_name==="")  { $sql .= ", NULL"; } else { $sql .= ", '$territory_name'"; }
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
  <title>Create Team</title>
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
    <h2>Create Region-Team</h2>
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
    for="reg_team"
    >
    Region-Team:
  </label>
  <div class="col-sm-2">
      <input
        type  = "text"
        name  = "reg_team"
        class = "form-control"
        value = "<?php echo $reg_team; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="territory_name"
    >
    Territory Name:
  </label>
  <div class="col-sm-4">
      <input
        type  = "text"
        name  = "territory_name"
        class = "form-control"
        value = "<?php echo $territory_name; ?>";
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
