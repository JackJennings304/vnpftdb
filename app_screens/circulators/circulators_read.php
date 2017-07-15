<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";

if ( isset($_GET["NAME"]) && !empty(trim($_GET["NAME"])) ) {
  $name = $_GET['NAME'];
  $sql  = "SELECT";
  $sql .= "  NAME";
  $sql .= ", CITY";
  $sql .= ", REG_TEAM";
  $sql .= ", CIRC_NUM";
  $sql .= ", CIRC_TRAINED";
  $sql .= " FROM circulators";
  $sql .= " WHERE NAME = '$name'";
  if ( $result = mysqli_query($ftdb, $sql) ) {
  } else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($ftdb);
	}
	$row      		= mysqli_fetch_array($result);
  $name     		= $row["NAME"];
  $city     		= $row["CITY"];
  $reg_team 		= $row["REG_TEAM"];
  $circ_num 		= $row["CIRC_NUM"];
	$circ_trained = $row["CIRC_TRAINED"];
  mysqli_close($ftdb);
}
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>View Circulators Record</title>
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
    <h2>View Circulator Record: <?php echo $name; ?></h2>
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
    for="name"
    >
    Name:
  </label>
  <div class="col-sm-3">
      <input
        type  = "text"
        name  = "name"
        class = "form-control"
        value = "<?php echo $name; ?>";
        readonly
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="city"
    >
    City:
  </label>
  <div class="col-sm-3">
      <input
        type  = "text"
        name  = "city"
        class = "form-control"
        value = "<?php echo $city; ?>";
        readonly
        >
  </div>
</div>

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
    for="circ_num"
    >
    NationBuilder ID or 0 (zero) for Guest Circulator:
  </label>
  <div class="col-sm-1">
      <input
        type  = "number"
        name  = "circ_num"
        class = "form-control"
        value = "<?php echo $circ_num; ?>";
        readonly
        >
  </div>
</div>

<div class="form-group">
  <label
    class = "control-label col-sm-3"
    for   = "circ_trained"
    >
    Circulator Trained
  </label>
  <div class = "col-sm-1">
    <input
      type  = "checkbox"
      name  = "circ_trained"
      class ="form-control"
      value = "1"
      <?php if ($circ_trained === "1") { echo 'checked = "checked"'; } ?>
      readonly
      disabled
      >
    </div>
</div>

<div class="form-group">

  <div class = "col-sm-3">    </div>
  <div class = "col-sm-2">
    <a
      href  = "/vnpftdb/php_code/stack_return.php"
      class = "btn btn-default"
      >
      Back
    </a>
  </div>
</div>

</form>

</div>  </div>  </div>  </div>

</body>

</html>
