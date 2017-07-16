<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";
?>
<?php
$region = $_GET["REGION"];
$sql  = "SELECT";
$sql .= "  REGION";
$sql .= ", NAME";
$sql .= ", DIR_01_NAME";
$sql .= ", DIR_01_CITY";
$sql .= ", DIR_01_NB_ID";
$sql .= ", DIR_02_NAME";
$sql .= ", DIR_02_CITY";
$sql .= ", DIR_02_NB_ID";
$sql .= " FROM regions WHERE REGION = $region";
if($result = mysqli_query($ftdb, $sql)){
} else{
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($ftdb);
}
$row = mysqli_fetch_array($result);
$region         = $row["REGION"];
$name           = $row["NAME"];
$dir_01_name    = $row["DIR_01_NAME"];
$dir_01_city    = $row["DIR_01_CITY"];
$dir_01_nb_id   = $row["DIR_01_NB_ID"];
$dir_02_name    = $row["DIR_02_NAME"];
$dir_02_city    = $row["DIR_02_CITY"];
$dir_02_nb_id   = $row["DIR_02_NB_ID"];
mysqli_close($ftdb);
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>View Region Record</title>
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
    <h2>View Region Record: <?php echo $region; ?></h2>
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
    for="region"
    >
    Region:
  </label>
  <div class="col-sm-1">
      <input
        type  = "number"
        name  = "region"
        class = "form-control"
        value = "<?php echo $region; ?>";
        readonly
        >
  </div>
</div>

<div class = "form-group">
  <label
    class = "control-label col-sm-3"
    for   = "name"
    >
    Region Name:
  </label>
  <div class = "col-sm-2">
      <input
        type  = "text"
        name  = "name"
        class = "form-control"
        value = "<?php echo $name; ?>";
        readonly
        >
  </div>
</div>

<div class = "form-group">
  <label
    class = "control-label col-sm-3"
    for   = "dir_01_name"
    >
    Director #1 Name:
  </label>
  <div class="col-sm-2">
      <input
        type  = "text"
        name  = "dir_01_name"
        class = "form-control"
        value = "<?php echo $dir_01_name; ?>";
        readonly
        >
  </div>
</div>

<div class = "form-group">
  <label
    class = "control-label col-sm-3"
    for   = "dir_01_city"
    >
    Director #1 City:
  </label>
  <div class="col-sm-2">
      <input
        type  = "text"
        name  = "dir_01_city"
        class = "form-control"
        value = "<?php echo $dir_01_city; ?>";
        readonly
        >
  </div>
</div>

<div class = "form-group">
  <label
    class = "control-label col-sm-3"
    for   = "dir_01_nb_id"
    >
    Dir #1 Nation Builder ID:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "dir_01_nb_id"
        class = "form-control"
        value = "<?php echo $dir_01_nb_id; ?>";
        readonly
        >
  </div>
</div>


<div class = "form-group">
  <label
    class = "control-label col-sm-3"
    for   = "dir_02_name"
    >
    Director #2 Name:
  </label>
  <div class="col-sm-2">
      <input
        type  = "text"
        name  = "dir_02_name"
        class = "form-control"
        value = "<?php echo $dir_02_name; ?>";
        readonly
        >
  </div>
</div>

<div class = "form-group">
  <label
    class = "control-label col-sm-3"
    for   = "dir_02_city"
    >
    Director #2 City:
  </label>
  <div class="col-sm-2">
      <input
        type  = "text"
        name  = "dir_02_city"
        class = "form-control"
        value = "<?php echo $dir_02_city; ?>";
        readonly
        >
  </div>
</div>

<div class = "form-group">
  <label
    class = "control-label col-sm-3"
    for   = "dir_02_nb_id"
    >
    Dir #2 Nation Builder ID:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "dir_02_nb_id"
        class = "form-control"
        value = "<?php echo $dir_02_nb_id; ?>";
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
