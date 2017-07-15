<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";
?>
<?php

$name       = "";
$reg_team   = "";
$nb_id      = "";

if( isset($_POST["name"]) && !empty($_POST["name"]) ) {
  $name      = trim($_POST["name"]);
	$reg_team  = trim($_POST["reg_team"]);
  $nb_id     = trim($_POST["nb_id"]);

  $sql  = "UPDATE captains SET";
	$sql .= "  REG_TEAM = ";
	if ($reg_team === "")  { $sql .= "NULL"; } else { $sql .= "'$reg_team'"; }
  $sql .= ", NB_ID    = ";
  if ($nb_id    === "")  { $sql .= "NULL"; } else { $sql .= " $nb_id";     }
	$sql .= " WHERE NAME = '$name'";
	if ( mysqli_query($ftdb, $sql) ) {
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
  <title>Update Captain</title>
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
$name  = $_GET["NAME"];
$sql  = "SELECT";
$sql .= "  REG_TEAM";
$sql .= ", NB_ID";
$sql .= " FROM captains";
$sql .= " WHERE NAME = '$name'";
$result    = mysqli_query($ftdb, $sql);
$row       = mysqli_fetch_array($result);
$reg_team  = $row["REG_TEAM"];
$nb_id     = $row['NB_ID'];
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
    <h2>Update Captain Record: <?php echo $name; ?></h2>
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
    for="name"
    >
    Name:
  </label>
  <div class="col-sm-2">
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
    for="reg_team"
    >
    Region-Team:
  </label>
  <div class="col-sm-2">
		<select
      required
      name  = "reg_team"
      class = "form-control"
      value = "<?php echo $reg_team; ?>"
      >
		<?php
		$sql  = "SELECT";
    $sql .= " REG_TEAM";
    $sql .= " FROM reg_teams_v01";
    $sql .= " ORDER BY region, team_num";
    include "$php_root/db_config_ftdb.php";
		$result = mysqli_query($ftdb, $sql);
		echo "<option value =''></option>";
		while ( $row = mysqli_fetch_array($result) ) {
			$string  = "<option value='" . $row['REG_TEAM'] . "'";
			if ( $row['REG_TEAM'] === $reg_team ) { $string .= " selected"; }
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
    class="control-label col-sm-3"
    for="nb_id"
    >
    Nation Builder ID:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "nb_id"
        class = "form-control"
        value = "<?php echo $nb_id; ?>";
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
