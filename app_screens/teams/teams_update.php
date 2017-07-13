<?php
session_start();
include ('../../vnpftdb.php');

$reg_team     = $territory_name     = "";
$reg_team_err = $territory_name_err = "";

if(isset($_POST["id"]) && !empty($_POST["id"])){
  $id             = $_POST["id"];
  $reg_team       = trim($_POST["reg_team"]);
	$territory_name = trim($_POST["territory_name"]);

  $sql  = "UPDATE reg_teams";
	$sql .= " SET TERRITORY_NAME=";
	if ($territory_name==="")  { $sql .= "NULL"; } else { $sql .= " '$territory_name'"; }
	$sql .= " WHERE REG_TEAM='$id'";
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
    <title>Update Team Record</title>
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
	$id       = $_GET["id"];
  $reg_team = $_GET["id"];
  $sql = "SELECT TERRITORY_NAME FROM reg_teams WHERE REG_TEAM =";
	$sql .= " '$reg_team'";
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_array($result);
  $territory_name = $row["TERRITORY_NAME"];
  mysqli_close($db);
	?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Team Record: <?php echo $id; ?></h2>
                    </div>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($reg_team_err)) ? 'has-error' : ''; ?>">
                            <label>Region-Team</label>
                            <input type="text" name="reg_team" class="form-control" value="<?php echo $reg_team; ?>" readonly>
                            <span class="help-block"><?php echo $reg_team_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($territory_name_err)) ? 'has-error' : ''; ?>">
                            <label>Territory Name</label>
                            <input type="text"  name="territory_name" class="form-control" value="<?php echo $territory_name; ?>">
                            <span class="help-block"><?php echo $territory_name_err;?></span>
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
