<?php
session_start();
include ('../../vnpftdb.php');
?>
<html>
<head>
  <meta charset="UTF-8">
  <title>Captains</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <!-- <link rel="stylesheet" href="/vnpftdb/stylesheets/bootstrap.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script> -->
  <script src="/vnpftdb/javascripts/bootstrap.js"></script>
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
      $(document).ready(function()  {
        $('[data-toggle="tooltip"]').tooltip();
      }
			);
    </script>
</head>
<body>
<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="page-header clearfix">
	<?php include ("../role_router.php"); ?>
	<br><br><br>
	<h2 class="pull-left">Captains</h2>
	<a href="captains_add.php" class="btn btn-success pull-right">Add New Captain</a>
</div>
<?php
$sql  = "SELECT NAME, REG_TEAM FROM captains ORDER BY NAME";
if($result = mysqli_query($db, $sql)){
  if(mysqli_num_rows($result) > 0){
    echo "<table class='table table-bordered table-striped'>";
		echo "<col width='20' />";
		echo "<col width='100' />";
		echo "<col width='40' />";
		echo "<col width='120' />";
		echo "<thead>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Reg-Team</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while($row = mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>" . $row['NAME'] . "</td>";
      echo "<td>" . $row['REG_TEAM'] . "</td>";
      echo "<td>";
      echo "<a href='captains_read.php?id=". $row['NAME'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
      echo "<a href='captains_update.php?id=". $row['NAME'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
      echo "<a href='captains_delete.php?id=". $row['NAME'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
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