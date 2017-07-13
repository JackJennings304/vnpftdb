<?php
session_start();
include ('../../vnpftdb.php');

$meas_date       		   = $meas_date_err       			= "";
$meas_week       			 = $meas_week_err       			= "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $meas_date       			 = trim($_POST["meas_date"]);
  $meas_week       			 = trim($_POST["meas_week"]);

	$sql  = "INSERT INTO progress_dates";
	$sql .= " (MEAS_DATE, MEAS_WEEK)";
	$sql .= " VALUES (";
	$sql .= " '$meas_date',";
	$sql .= " $meas_week";
	$sql .= ")";
	echo "Executing " . $sql;
	if(mysqli_query($db, $sql)){
    header('location: progress_dates.php');
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
  <title>New Progress Dt</title>
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
  <h2>Create new Progress Date</h2>
</div>
<p>VNP Field Team Database</p>
<p>Progress Dates define the weeks of the Campaign.</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

<div class="form-group <?php echo (!empty($_err)) ? 'has-error' : ''; ?>">
	<label>Measure Date</label>
	<input
    type="date"
    name="meas_date"
    class="form-control"
    value="<?php echo $meas_date; ?>"
    required
  >
	<span class="help-block"><?php echo $meas_date_err;?></span>
</div>

<div class="form-group <?php echo (!empty($meas_week_err)) ? 'has-error' : ''; ?>">
	<label>Measure Week</label>
  <input
    type="number"
    name="meas_week"
    class="form-control"
    value="<?php echo $meas_week; ?>"
    required
  >
	<span class="help-block"><?php echo $meas_week_err;?></span>
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
