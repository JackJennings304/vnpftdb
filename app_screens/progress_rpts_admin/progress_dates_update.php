<?php
session_start();
include ('../../vnpftdb.php');

$meas_date       		   = $meas_date_err       			= "";
$meas_week       			 = $meas_week_err       			= "";

if(isset($_POST["meas_date"]) && !empty($_POST["meas_date"])){
  $meas_date       			 = trim($_POST["meas_date"]);
  $meas_week       			 = trim($_POST["meas_week"]);

  $sql  = "UPDATE progress_dates SET";
	$sql .= " MEAS_WEEK = " .  $meas_week;
	$sql .= " WHERE MEAS_DATE = '$meas_date'";
	if(mysqli_query($db, $sql)){
    header('location: progress_dates.php');
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
  <title>Update Progress Dt</title>
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
$meas_date   = $_GET["meas_date"];
$sql  = "SELECT MEAS_WEEK";
$sql .= " FROM progress_dates";
$sql .= " WHERE MEAS_DATE = ";
$sql .= "'$meas_date'";
$result    = mysqli_query($db, $sql);
$row       = mysqli_fetch_array($result);
$meas_week       = $row["MEAS_WEEK"];
mysqli_close($db);
?>
<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="page-header">
	<h2>Update Progress Date: <?php echo $meas_date; ?></h2>
</div>
<form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

	<div class="form-group <?php echo (!empty($meas_date_err)) ? 'has-error' : ''; ?>">
    <label>Measure Date</label>
    <input
      type="date"
      name="meas_date"
      class="form-control"
      value="<?php echo $meas_date; ?>"
      readonly
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
    >
    <span class="help-block"><?php echo $meas_week_err;?></span>
  </div>

  <input
    type  = "submit"
    class = "btn btn-primary"
    value = "Submit"
  >
  <a href= <?php echo $_SERVER['HTTP_REFERER']; ?> class="btn btn-default">Cancel</a>
</form>
</div>
</div>
</div>
</div>
</body>
</html>
