<?php
session_start();
include ('../../vnpftdb.php');

$name         = $name_err         = "";
$city         = $city_err         = "";
$reg_team     = $reg_team_err     = "";
$circ_num     = $circ_num_err     = "";
$circ_trained = $circ_trained_err = "";

if(isset($_POST["id"]) && !empty($_POST["id"])){
  $id       		= $_POST["id"];
	$name     		= trim($_POST["name"]);
  $city     		= trim($_POST["city"]);
	$reg_team 		= trim($_POST["reg_team"]);
	$circ_num 		= trim($_POST["circ_num"]);
	$circ_trained = trim($_POST["circ_trained"]);

  $sql  = "UPDATE circulators SET";
	$sql .= " CITY=";
	if ($city===""           ) { $sql .= "NULL,"; } else { $sql .= " '$city',";     }
	$sql .= " REG_TEAM=";
	if ($reg_team===""       ) { $sql .= "NULL,"; } else { $sql .= " '$reg_team',"; }
	$sql .= " CIRC_NUM=";
	if ($circ_num===""       ) { $sql .= "NULL,"; } else { $sql .= " '$circ_num',"; }
	$sql .= " CIRC_TRAINED=";
	if ($circ_trained === "1") { $sql .= "1";     } else { $sql .= "0";             }
	$sql .= " WHERE NAME='$id'";
	if(mysqli_query($db, $sql)){
        header('location: ' . $_SESSION["called_by"]);
        exit();
	} else{
		echo "ERROR: Could not execute $sql. " . mysqli_error($db);
	}
    mysqli_close($db);
}
?>

<html>
<head>
  <meta charset="UTF-8">
  <title>Update Circulators Record</title>
  <link rel="stylesheet" href="/vnpftdb/stylesheets/bootstrap.css">
  <style type="text/css">
    .wrapper{
      width: 500px;
      margin: 0 auto;
    }
  </style>
</head>
<body>
<?php
include ('../../vnpftdb.php');
$id   = $_GET["id"];
$name = $_GET["id"];
$sql  = "SELECT CITY, REG_TEAM, CIRC_NUM, CIRC_TRAINED FROM circulators WHERE NAME =";
$sql .= " '$name'";
$result    		= mysqli_query($db, $sql);
$row       		= mysqli_fetch_array($result);
$city      		= $row["CITY"];
$reg_team  		= $row["REG_TEAM"];
$circ_num  		= $row["CIRC_NUM"];
$circ_trained = $row["CIRC_TRAINED"];
mysqli_close($db);
?>
<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="page-header">
  <h2>Update Circulator Record: <?php echo $id; ?></h2>
</div>
<form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

<div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
  <label>Name</label>
  <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" readonly>
  <span class="help-block"><?php echo $name_err;?></span>
</div>

<div class="form-group <?php echo (!empty($reg_team_err)) ? 'has-error' : ''; ?>">
  <label>City</label>
  <input type="text" name="city" class="form-control" value="<?php echo $city; ?>" >
  <span class="help-block"><?php echo $city_err;?></span>
</div>

<div class="form-group <?php echo (!empty($reg_team_err)) ? 'has-error' : ''; ?>">
  <label>Region-Team</label>
	<select name="reg_team" class="form-control" value="<?php echo $reg_team; ?>">
	<?php
	$sql  = "SELECT REG_TEAM FROM reg_teams_v01 ORDER BY region, team_num";
	$db = mysqli_connect($hostname, $username, $password, $database) or die('Error connecting to MySQL server.');
	$result = mysqli_query($db, $sql);
	echo "<option value =''></option>";
	while($row = mysqli_fetch_array($result)){
		$string  = "<option value='" . $row['REG_TEAM'] . "'";
		if ($row['REG_TEAM']===$reg_team) { $string .= " selected"; }
		$string .= ">" . $row['REG_TEAM'] . "</option>";
		echo $string . "\n";
	}
	mysqli_close($db);
	?>
	</select>
  <span class="help-block"><?php echo $reg_team_err;?></span>
</div>

<div class="form-group <?php echo (!empty($circ_num_err)) ? 'has-error' : ''; ?>">
  <label>NationBuilder ID or 0 (zero) for Guest Circulator</label>
  <input type="text" name="circ_num" class="form-control" value="<?php echo $circ_num; ?>">
  <span class="help-block"><?php echo $circ_num_err;?></span>
</div>

<div class="form-group <?php echo (!empty($circ_trained_err)) ? 'has-error' : ''; ?>">
  <label>Circulator Trained</label>
  <input type="checkbox" name="circ_trained" class="form-control" value="1"
  <?php
	if ($circ_trained === "1") { echo 'checked = "checked"'; }
	echo ">";
	?>
  <span class="help-block"><?php echo $circ_trained_err;?></span>
</div>

<input type="hidden" name="id" value="<?php echo $id; ?>"/>
<input type="submit" class="btn btn-primary" value="Submit">
<a href= <?php echo $_SESSION["called_by"]; ?> class="btn btn-default">Cancel</a>
</form>
</div>
</div>
</div>
</div>
</body>
</html>
