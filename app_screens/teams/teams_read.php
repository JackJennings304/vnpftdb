<?php
session_start();
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
  include ('../../vnpftdb.php');

  $sql = "SELECT REG_TEAM, TERRITORY_NAME FROM reg_teams WHERE REG_TEAM = ?";
  if($stmt = mysqli_prepare($db, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_id);
        $param_id = trim($_GET["id"]);
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result) == 1){
                $row       = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $reg_team       = $row["REG_TEAM"];
                $territory_name = $row["TERRITORY_NAME"];
            } else{
                header("location: teams_error.php");
                exit();
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($db);
} else{
    header("location: teams_error.php");
    exit();
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>View Team Record</title>
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
                        <h1>View Team</h1>
                    </div>
					<p> VNP Field Team Database</p>
                    <div class="form-group">
                        <label>Region-Team</label>
                        <p class="form-control-static"><?php echo $row["REG_TEAM"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Territory Name</label>
                        <p class="form-control-static"><?php echo $row["TERRITORY_NAME"]; ?></p>
                    </div>
                    <p><a href= <?php echo $_SERVER['HTTP_REFERER']; ?> class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>