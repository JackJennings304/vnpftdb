<?php
session_start();
include ('../../vnpftdb.php');

$reg_team     = $territory_name     = "";
$reg_team_err = $territory_name_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $reg_team       = trim($_POST["reg_team"]);
	$territory_name = trim($_POST["territory_name"]);

	$sql  = "INSERT INTO reg_teams";
	$sql .= " (REG_TEAM, TERRITORY_NAME)";
	$sql .= " VALUES (";
	$sql .= "'$reg_team',";
	if ($territory_name==="")  { $sql .= "NULL"; } else { $sql .= " '$territory_name'"; }
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
    <title>Create Team</title>
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
                        <h2>Create Team</h2>
                    </div>
					<p>VNP Field Team Database</p>
                    <p>Please fill this form and submit to add Captain record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($reg_team_err)) ? 'has-error' : ''; ?>">
                            <label>Region-Team</label>
                            <input type="text" name="reg_team" class="form-control" value="<?php echo $reg_team; ?>">
                            <span class="help-block"><?php echo $reg_team_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($territory_name_err)) ? 'has-error' : ''; ?>">
                            <label>Territory Name</label>
                            <textarea name="territory_name" class="form-control"><?php echo $territory_name; ?></textarea>
                            <span class="help-block"><?php echo $territory_name_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href= <?php echo $_SERVER['HTTP_REFERER']; ?> class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
