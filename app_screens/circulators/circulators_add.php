<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";

$name         = "";
$city         = "";
$reg_team     = "";
$nb_id        = "";
$circ_trained = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name     		= trim($_POST["name"]);
	$city     		= trim($_POST["city"]);
	$reg_team 		= trim($_POST["reg_team"]);
	$nb_id 	    	= trim($_POST["nb_id"]);
	$circ_trained = trim($_POST["circ_trained"]);

	$sql  = "INSERT INTO circulators";
	$sql .= " (NAME, CITY, REG_TEAM, NB_ID, CIRC_TRAINED)";
	$sql .= " VALUES (";
	$sql .= "'$name',";
	if ($city         === "")  { $sql .= "NULL,"; } else { $sql .= " '$city',";      }
	if ($reg_team     === "")  { $sql .= "NULL,"; } else { $sql .= " '$reg_team',";  }
	if ($nb_id        === "")  { $sql .= "NULL,"; } else { $sql .= " '$nb_id',";     }
	if ($circ_trained === "1") { $sql .= "1";     } else { $sql .= "0";              }
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
  <title>Create Circulator</title>
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

<div class="page-header">
  <div class = "form-group">
    <div class = "col-sm-1">
      <a
        href  = "<?php echo $_SESSION['Cur_top_menu']; ?>"
        class = "btn btn-success"
      >
      Main Menu
      </a>
    </div>
  </div>
  <br>
  <h1>VNP Field Team Database</h1>
  <h2>Create Circulator</h2>
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
    Region-Team
  </label>
  <div class = "col-sm-3">
	  <select
      required
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
    for   = "nb_id"
    >
    NationBuilder ID or 0 (zero) for Guest Circulator
  </label>
  <div class = "col-sm-3">
    <input
      type  = "number"
      name  = "nb_id"
      class ="form-control"
      value = "<?php echo $nb_id; ?>"
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
      <?php if ($circ_trained === 1) { echo 'checked = "checked"'; } ?>
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
