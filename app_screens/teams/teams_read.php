<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";
?>
<?php
if(isset($_GET["REG_TEAM"]) && !empty(trim($_GET["REG_TEAM"])) ) {
  $reg_team = trim($_GET["REG_TEAM"]);
  $sql  = "SELECT";
  $sql .= " REG_TEAM";
  $sql .= ", TERRITORY_NAME";
  $sql .= " FROM reg_teams";
  $sql .= " WHERE REG_TEAM = '$reg_team'";

	if($result = mysqli_query($ftdb, $sql)){
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($ftdb);
	}
  $row = mysqli_fetch_array($result);
  $reg_team       = $row["REG_TEAM"];
  $territory_name = $row["TERRITORY_NAME"];
  mysqli_close($ftdb);
}
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>View Team Record</title>
  <link rel="icon" type="image/x-icon" href="/vnpftdb/images/favicon.ico" />
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
    <h2>View Region-Team Record: <?php echo $reg_team; ?></h2>
  </div>
</div>

<form
  name     = "mainForm"
  class    = "form-horizontal"
  method   = ""
  onsubmit = ""
  >

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="reg_team"
    >
    Region-Team:
  </label>
  <div class="col-sm-1">
      <input
        type  = "text"
        name  = "reg_team"
        class = "form-control"
        value = "<?php echo $reg_team; ?>";
        readonly
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
        readonly
        >
  </div>
</div>

<div class="form-group">

  <div class = "col-sm-3">    </div>

  <div class="col-sm-2">
    <a
      href="/vnpftdb/php_code/stack_return.php"
      class="btn btn-default"
      >
      Back
    </a>
  </div>
</div>

</form>

</div>  </div>  </div>  </div>

</body>

</html>
