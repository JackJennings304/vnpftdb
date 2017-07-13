<?php
session_start();
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
  include ('../../vnpftdb.php');
  $sql = "SELECT NAME, CITY, REG_TEAM, CIRC_NUM, CIRC_TRAINED FROM circulators WHERE NAME = ?";
  if($stmt = mysqli_prepare($db, $sql)){
    mysqli_stmt_bind_param($stmt, "s", $param_id);
    $param_id = trim($_GET["id"]);
    if(mysqli_stmt_execute($stmt)){
      $result = mysqli_stmt_get_result($stmt);
      if(mysqli_num_rows($result) == 1){
    		$row      		= mysqli_fetch_array($result, MYSQLI_ASSOC);
		    $name     		= $row["NAME"];
        $city     		= $row["CITY"];
        $reg_team 		= $row["REG_TEAM"];
        $circ_num 		= $row["CIRC_NUM"];
				$circ_trained = $row["CIRC_TRAINED"];
      } else{
        header("location: circulators_error.php");
        exit();
      }
    } else{
      echo "Oops! Something went wrong. Please try again later.";
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($db);
} else{
    header("location: circulators_error.php");
    exit();
}
?>
<html>
<head>
  <meta charset="UTF-8">
  <title>View Circulators Record</title>
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
  <h1>View Circulator</h1>
</div>
<p> VNP Field Team Database</p>

<div class="form-group">
  <label>Name</label>
  <p class="form-control-static"><?php echo $row["NAME"]; ?></p>
</div>

<div class="form-group">
  <label>City</label>
  <p class="form-control-static"><?php echo $row["CITY"]; ?></p>
</div>

<div class="form-group">
  <label>Region-Team</label>
  <p class="form-control-static"><?php echo $row["REG_TEAM"]; ?></p>
</div>

<div class="form-group">
  <label>NationBuilder ID or 0 (zero) for Guest Circulator</label>
  <p class="form-control-static"><?php echo $row["CIRC_NUM"]; ?></p>
</div>

<div class="form-group <?php echo (!empty($circ_trained_err)) ? 'has-error' : ''; ?>">
  <label>Circulator Trained</label>
  <p class="form-control-static">
	<?php 	if ($circ_trained === 1) {echo "&#10004"; }	?>
	</p>
</div>


<p><a href= <?php echo $_SESSION["called_by"]; ?> class="btn btn-primary">Back</a></p>
</div>
</div>
</div>
</div>
</body>
</html>
