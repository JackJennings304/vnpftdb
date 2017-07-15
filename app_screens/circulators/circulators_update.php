<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";

$name         = "";
$city         = "";
$reg_team     = "";
$circ_num     = "";
$circ_trained = "";

if ( isset($_POST["name"]) && !empty($_POST["name"]) ) {
	$name     		= trim($_POST["name"]);
  $city     		= trim($_POST["city"]);
	$reg_team 		= trim($_POST["reg_team"]);
	$circ_num 		= trim($_POST["circ_num"]);
	$circ_trained = trim($_POST["circ_trained"]);

  $sql  = "UPDATE circulators SET";
	$sql .= " CITY = ";
	if ($city === ""           ) { $sql .= "NULL,"; } else { $sql .= " '$city',";     }
	$sql .= " REG_TEAM = ";
	if ($reg_team === ""       ) { $sql .= "NULL,"; } else { $sql .= " '$reg_team',"; }
	$sql .= " CIRC_NUM = ";
	if ($circ_num === ""       ) { $sql .= "NULL,"; } else { $sql .= " '$circ_num',"; }
	$sql .= " CIRC_TRAINED = ";
	if ($circ_trained === "1") { $sql .= "1";     } else { $sql .= "0";             }
	$sql .= " WHERE NAME = '$name'";
	if(mysqli_query($ftdb, $sql)){
	} else{
		echo "ERROR: Could not execute $sql. " . mysqli_error($ftdb);
	}
  mysqli_close($ftdb);
  include "$php_root/stack_return_within_php.php";
  exit();
}
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Update Circulator Record</title>
  <link rel="icon" type="image/x-icon" href="/vnpftdb/images/favicon.ico" />
  <script>
  function validateForm() {
  }
  </script>
</head>

<body>
<?php if($_SESSION['debug'] == 'ON') { echo $_SESSION['call_stack'] . "<br><br>"; } ?>

<?php
include "$php_root/db_config_ftdb.php";
$name = $_GET["NAME"];
$sql  = "SELECT";
$sql .= "  CITY";
$sql .= ", REG_TEAM";
$sql .= ", CIRC_NUM";
$sql .= ", CIRC_TRAINED";
$sql .= " FROM circulators";
$sql .= " WHERE NAME = '$name'";
$result    		= mysqli_query($ftdb, $sql);
$row       		= mysqli_fetch_array($result);
$city      		= $row["CITY"];
$reg_team  		= $row["REG_TEAM"];
$circ_num  		= $row["CIRC_NUM"];
$circ_trained = $row["CIRC_TRAINED"];
mysqli_close($ftdb);
?>

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
    <h2>Update Circulator Record: <?php echo $name; ?></h2>
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
    class = "control-label col-sm-3"
    for   = "name"
    >
    Name
  </label>
  <div class = "col-sm-3">
    <input
      type  = "text"
      name  = "name"
      class ="form-control"
      value = "<?php echo $name; ?>"
      >
    </div>
</div>

<div class="form-group">
  <label
    class = "control-label col-sm-3"
    for   = "city"
    >
    City
  </label>
  <div class = "col-sm-3">
    <input
      type  = "text"
      name  = "city"
      class ="form-control"
      value = "<?php echo $city; ?>"
      >
    </div>
</div>

<div class="form-group">
  <label
    class = "control-label col-sm-3"
    for   = "reg_team"
    >
    Region-Team:
  </label>
  <div class = "col-sm-3">
	  <select
      name  = "reg_team"
      class = "form-control"
      value = "<?php echo "NULL"; ?>"
      >
    	<?php
    	$sql  = "SELECT REG_TEAM FROM reg_teams_v01 ORDER BY region, team_num";
      include "$php_root/db_config_ftdb.php";
    	$result = mysqli_query($ftdb, $sql);
    	echo "<option value =''></option>";
    	while($row = mysqli_fetch_array($result)){
    		$string  = "<option value='" . $row['REG_TEAM'] . "'";
    		$string .= ">" . $row['REG_TEAM'] . "</option>";
    		echo $string . "\n";
    	}
    	mysqli_close($ftdb);
    	?>
    </select>
  </div>
</div>

<div class="form-group">
  <label
    class = "control-label col-sm-3"
    for   = "circ_num"
    >
    NationBuilder ID or 0 (zero) for Guest Circulator
  </label>
  <div class = "col-sm-3">
    <input
      type  = "number"
      name  = "circ_num"
      class ="form-control"
      value = "<?php echo $circ_num; ?>"
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
  <div class = "col-sm-3">
    <input
      type  = "checkbox"
      name  = "circ_trained"
      class ="form-control"
      value = "1"
      <?php if ($circ_trained === "1") { echo 'checked = "checked"'; } ?>
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

    <a
      href  = "/vnpftdb/php_code/stack_return.php"
      class = "btn btn-default"
      >
      Cancel
    </a>
  </div>
</div>

</form>

</div>  </div>  </div>  </div>

</body>

</html>
