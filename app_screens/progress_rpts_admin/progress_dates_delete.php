<?php
session_start();
if(isset($_POST["meas_date"]) && !empty($_POST["meas_date"])) {
  include ('../../vnpftdb.php');
	$meas_date = $_POST["meas_date"];
  $sql  = "DELETE FROM progress_dates";
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
  <title>Delete Progress Dt</title>
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
$meas_date = $_GET["meas_date"];
?>
<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="page-header">
  <h1>Delete Progress Date: <?php echo $meas_date; ?></h1>
</div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <div class="alert alert-danger fade in">
    <input
      type="hidden"
      name="meas_date"
      value="<?php echo $meas_date; ?>"/>
    <p>Are you sure you want to delete this record?</p><br>
    <p>
    <input
      type="submit"
      value="Yes"
      class="btn btn-danger"
    >
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
