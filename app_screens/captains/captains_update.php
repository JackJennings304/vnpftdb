<?php
include ('../../vnpftdb.php');

$name     = $reg_team     = "";
$name_err = $reg_team_err = "";

if(isset($_POST["id"]) && !empty($_POST["id"])){
    $id        = $_POST["id"];
    $name      = trim($_POST["name"]);
	$reg_team  = trim($_POST["reg_team"]);

    $sql  = "UPDATE captains";
	$sql .= " SET REG_TEAM=";
	if ($reg_team==="")  { $sql .= "NULL"; } else { $sql .= " '$reg_team'"; }
	$sql .= " WHERE NAME='$id'";
	if(mysqli_query($db, $sql)){
        header('location: ' . $_SERVER['HTTP_REFERER']);
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
    <title>Update Captain Record</title>
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
$db = mysqli_connect($hostname, $username, $password, $database) or die('Error connecting to MySQL server.');
$id    = $_GET["id"];
$name  = $_GET["id"];
$sql = "SELECT REG_TEAM FROM captains WHERE NAME =";
$sql .= " '$name'";
$result    = mysqli_query($db, $sql);
$row       = mysqli_fetch_array($result);
$reg_team  = $row["REG_TEAM"];
mysqli_close($db);
?>
<div class="wrapper">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-12">
    <div class="page-header">
        <h2>Update Captain Record: <?php echo $id; ?></h2>
    </div>
    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

	<div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
		<label>Name</label>
		<input type="text" name="name" class="form-control" value="<?php echo $name; ?>" readonly>
		<span class="help-block"><?php echo $name_err;?></span>
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

    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
    <input type="submit" class="btn btn-primary" value="Submit">
    <a href= <?php echo $_SERVER['HTTP_REFERER']; ?> class="btn btn-default">Cancel</a>
    </form>
   </div>
  </div>
 </div>
</div>
</body>
</html>
