<?php
session_start();
include ($_SERVER['DOCUMENT_ROOT'] . '/vnpftdb/vnpftdb.php');
?>
<html>
<head>
<meta charset="UTF-8">
<title>Progress Dates</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<link rel="stylesheet" href="/vnpftdb/stylesheets/bootstrap.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
<style type="text/css">
  .wrapper{
      width: 650px;
      margin: 0 auto;
  }
  .page-header h2{
      margin-top: 0;
  }
  table tr td:last-child a{
      margin-right: 15px;
  }
</style>
<script type="text/javascript">
  $(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
  });
</script>
</head>
<body>
<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="page-header clearfix">
  <a href="/vnpftdb/menus/fldopsadmin.php" class="btn btn-success pull-right">Back</a>
  <br><br><br>
	<h2 class="pull-left">Progress Dates</h2>
</div>
<a href="progress_dates_add.php" class="btn btn-success pull-right">Add New Measure Date</a>
<?php
$sql  = "SELECT DAYNAME(MEAS_DATE) AS DAY_NAME,";
$sql .= " MEAS_DATE, MEAS_WEEK";
$sql .= " FROM progress_dates";
$sql .= " ORDER BY MEAS_DATE";
if($result = mysqli_query($db, $sql)){
  if(mysqli_num_rows($result) > 0){
    echo "<table class='table table-bordered table-striped'>";
		echo "<thead>";
    echo "<tr>";
    echo "<th>Week Day</th>";
		echo "<th>Measure Date</th>";
		echo "<th>Measure Week</th>";
    echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		while($row = mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>" . $row['DAY_NAME']     . "</td>";
      echo "<td>" . $row['MEAS_DATE']    . "</td>";
      echo "<td>" . $row['MEAS_WEEK']    . "</td>";
      echo "<td>";
      echo "<a href='progress_dates_update.php?meas_date="  . $row['MEAS_DATE'] . "' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
      echo "<a href='progress_dates_delete.php?meas_date="  . $row['MEAS_DATE'] . "' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
      echo "</td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    mysqli_free_result($result);
  } else{
    echo "<p class='lead'><em>No records were found.</em></p>";
  }
} else{
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
mysqli_close($db);
?>
</div>
</div>
</div>
</div>
</body>
</html>
