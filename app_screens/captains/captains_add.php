<?php
include ('../../vnpftdb.php');

$name     = $reg_team     = "";
$name_err = $reg_team_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name      = trim($_POST["name"]);
	$reg_team  = trim($_POST["reg_team"]);

	$sql  = "INSERT INTO captains";
	$sql .= " (NAME, REG_TEAM)";
	$sql .= " VALUES (";
	$sql .= "'$name',";
	if ($reg_team==="")  { $sql .= "NULL"; } else { $sql .= " '$reg_team'"; }
	$sql .= ")";
	echo "Executing " . $sql;
	if(mysqli_query($db, $sql)){
        header('location: ' . $_SERVER['HTTP_REFERER']);
        exit();
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
	}
    mysqli_close($db);
}
?>

<html>
<head>
  <meta charset="UTF-8">
  <title>Create Captain</title>
  <link rel="stylesheet" href="/vnpftdb/stylesheets/bootstrap.css">
  <style type="text/css">
    .wrapper{
      width: 500px;
      margin: 0 auto;
    }
  </style>
</head>
<body>
<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="page-header">
	<h2>Create Captain</h2>
</div>
<p>VNP Field Team Database</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

  <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
        <span class="help-block"><?php echo $name_err;?></span>
  </div>

	<div class="form-group <?php echo (!empty($reg_team_err)) ? 'has-error' : ''; ?>">
        <label>Region-Team (required)</label>
		<select required name="reg_team" class="form-control" value="<?php echo "NULL"; ?>">
		<?php
		$sql  = "SELECT REG_TEAM FROM reg_teams_v01 ORDER BY region, team_num";
		$db = mysqli_connect($hostname, $username, $password, $database) or die('Error connecting to MySQL server.');
		$result = mysqli_query($db, $sql);
		echo "<option value =''></option>";
		while($row = mysqli_fetch_array($result)){
			$string  = "<option value='" . $row['REG_TEAM'] . "'";
			$string .= ">" . $row['REG_TEAM'] . "</option>";
			echo $string . "\n";
		}
		mysqli_close($db);
		?>
		</select>
        <span class="help-block"><?php echo $reg_team_err;?></span>
    </div>

    <input type="submit" class="btn btn-primary" value="Submit">
    <a href= <?php echo $_SERVER['HTTP_REFERER']; ?>  class="btn btn-default">Cancel</a>
</form>
</div>
</div>
</div>
</div>
</body>
</html>
