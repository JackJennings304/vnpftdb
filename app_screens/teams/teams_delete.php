<?php
session_start();
if(isset($_POST["id"]) && !empty($_POST["id"])){
  include ('../../vnpftdb.php');
	$reg_team = $_POST["id"];
  $sql  = "DELETE FROM reg_teams";
	$sql .= " WHERE REG_TEAM = '$reg_team'";
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
    <title>Delete Team Record</title>
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
	$reg_team = $_GET["id"];
	?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Delete Team Record: <?php echo $reg_team ?></h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo $reg_team; ?>"/>
                            <p>Are you sure you want to delete this record?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href= <?php echo $_SERVER['HTTP_REFERER']; ?> class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
