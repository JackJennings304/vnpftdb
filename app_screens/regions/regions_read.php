<?php
session_start();
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
  include ('../../vnpftdb.php');
  $sql = "SELECT REGION, NAME, DIRECTOR_NAME FROM regions WHERE REGION = ?";
  if($stmt = mysqli_prepare($db, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_id);
        $param_id = trim($_GET["id"]);
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result) == 1){
				$row           = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$region        = $row["REGION"];
                $name          = $row["NAME"];
                $director_name = $row["DIRECTOR_NAME"];
            } else{
                header("location: regions_error.php");
                exit();
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($db);
} else{
    header("location: regions_error.php");
    exit();
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>View Region Record</title>
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
                        <h1>View Region</h1>
                    </div>
					<p> VNP Field Team Database</p>
                    <div class="form-group">
                        <label>Region</label>
                        <p class="form-control-static"><?php echo $row["REGION"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"><?php echo $row["NAME"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Director Name</label>
                        <p class="form-control-static"><?php echo $row["DIRECTOR_NAME"]; ?></p>
                    </div>
                    <p><a href= <?php echo $_SERVER['HTTP_REFERER']; ?> class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
