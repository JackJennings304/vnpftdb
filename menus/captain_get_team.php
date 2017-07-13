<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
#$_SESSION['debug'] = 'ON';
$_SESSION['debug'] = 'OFF';

$reg_team        = $reg_team_err        = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $reg_team                    = trim($_POST["reg_team"]);
	$_SESSION["reg_team_filter"] = $reg_team;
	header('location: captain.php');
	exit();
}
?>

<html>
<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Set Region-Team</title>
  <link rel="icon" type="image/x-icon" href="/vnpftdb/images/favicon.ico" />
</head>

<body>
<?php if($_SESSION['debug'] == 'ON') { echo $_SESSION['call_stack'] . "<br><br>"; } ?>

<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<div class="page-header">
  <h1>VNP Field Team Database</h1>
  <h2>Set Region-Team</h2>
</div>

<form
  class="form-horizontal"
  method="post"
>

<div class = "form-group">
  <div class = "col-sm-2">
  </div>
  <div class = "col-sm-3">
    <p>Please select the Region-Team</p>
  </div>
</div>

<div class = "form-group">
	<label
    class = "control-label col-sm-3"
    >
    Region-Team (required)
  </label>
  <div class = "col-sm-2">
  	<select
      required
      name  = "reg_team"
      class = "form-control"
      value = "<?php echo "NULL"; ?>"
      >
  		<?php
      include "$php_root/db_config_ftdb.php";
  		$sql  = "SELECT REG_TEAM FROM reg_teams_v01 ORDER BY region, team_num";
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

<input type="submit" class="btn btn-primary" value="OK">

</form>

</div>  </div>  </div>  </div>

</body>
</html>
