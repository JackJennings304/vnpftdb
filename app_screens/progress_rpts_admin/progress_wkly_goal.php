<?php
session_start();
include ($_SERVER['DOCUMENT_ROOT'] . '/vnpftdb/vnpftdb.php');
?>
<html>
<head>
<meta charset="UTF-8">
<title>Progress Wkly Goal</title>
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
	<h2 class="pull-left">Progress Weekly Goals</h2>
</div>
<?php
$total_wk_01_goal = 0;
$total_wk_02_goal = 0;
$total_wk_03_goal = 0;
$total_wk_04_goal = 0;
$total_wk_05_goal = 0;
$total_wk_06_goal = 0;
$total_wk_07_goal = 0;
$total_wk_08_goal = 0;
$total_wk_09_goal = 0;
$total_wk_10_goal = 0;
$total_wk_11_goal = 0;
$total_wk_12_goal = 0;
$total_wk_13_goal = 0;
$total_wk_14_goal = 0;
$total_wk_15_goal = 0;
$total_wk_16_goal = 0;
$total_wk_17_goal = 0;
$total_wk_18_goal = 0;
$total_wk_19_goal = 0;
$total_wk_20_goal = 0;
$total_wk_21_goal = 0;
$total_wk_22_goal = 0;
$total_wk_23_goal = 0;
$total_wk_24_goal = 0;
$total_wk_25_goal = 0;
$total_wk_26_goal = 0;
$sql  = "SELECT REGION,";
$sql .= " WK_01_GOAL, WK_02_GOAL, WK_03_GOAL, WK_04_GOAL, WK_05_GOAL,";
$sql .= " WK_06_GOAL, WK_07_GOAL, WK_08_GOAL, WK_09_GOAL, WK_10_GOAL,";
$sql .= " WK_11_GOAL, WK_12_GOAL, WK_13_GOAL, WK_14_GOAL, WK_15_GOAL,";
$sql .= " WK_16_GOAL, WK_17_GOAL, WK_18_GOAL, WK_19_GOAL, WK_20_GOAL,";
$sql .= " WK_21_GOAL, WK_22_GOAL, WK_23_GOAL, WK_24_GOAL, WK_25_GOAL,";
$sql .= " WK_26_GOAL";
$sql .= " FROM progress_weekly_goal";
$sql .= " ORDER BY REGION";
if($result = mysqli_query($db, $sql)){
  if(mysqli_num_rows($result) > 0){
    echo "<table class='table table-bordered table-striped'>";
		echo "<thead>";
    echo "<tr>";
    echo "<th></th>";
    echo "<th>Region</th>";
		echo "<th>Wk 1 Goal</th>";
    echo "<th>Wk 2 Goal</th>";
    echo "<th>Wk 3 Goal</th>";
    echo "<th>Wk 4 Goal</th>";
    echo "<th>Wk 5 Goal</th>";
    echo "<th>Wk 6 Goal</th>";
    echo "<th>Wk 7 Goal</th>";
    echo "<th>Wk 8 Goal</th>";
    echo "<th>Wk 9 Goal</th>";
    echo "<th>Wk 10 Goal</th>";
    echo "<th>Wk 11 Goal</th>";
    echo "<th>Wk 12 Goal</th>";
    echo "<th>Wk 13 Goal</th>";
    echo "<th>Wk 14 Goal</th>";
    echo "<th>Wk 15 Goal</th>";
    echo "<th>Wk 16 Goal</th>";
    echo "<th>Wk 17 Goal</th>";
    echo "<th>Wk 18 Goal</th>";
    echo "<th>Wk 19 Goal</th>";
    echo "<th>Wk 20 Goal</th>";
    echo "<th>Wk 21 Goal</th>";
    echo "<th>Wk 22 Goal</th>";
    echo "<th>Wk 23 Goal</th>";
    echo "<th>Wk 24 Goal</th>";
    echo "<th>Wk 25 Goal</th>";
    echo "<th>Wk 26 Goal</th>";
    echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		while($row = mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>";
      echo "<a href='progress_wkly_goal_update.php?region="  . $row['REGION'] . "' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
      echo "</td>";
      echo "<td>" . $row['REGION']       . "</td>";
      echo "<td>" . $row['WK_01_GOAL']   . "</td>";
      echo "<td>" . $row['WK_02_GOAL']   . "</td>";
      echo "<td>" . $row['WK_03_GOAL']   . "</td>";
      echo "<td>" . $row['WK_04_GOAL']   . "</td>";
      echo "<td>" . $row['WK_05_GOAL']   . "</td>";
      echo "<td>" . $row['WK_06_GOAL']   . "</td>";
      echo "<td>" . $row['WK_07_GOAL']   . "</td>";
      echo "<td>" . $row['WK_08_GOAL']   . "</td>";
      echo "<td>" . $row['WK_09_GOAL']   . "</td>";
      echo "<td>" . $row['WK_10_GOAL']   . "</td>";
      echo "<td>" . $row['WK_11_GOAL']   . "</td>";
      echo "<td>" . $row['WK_12_GOAL']   . "</td>";
      echo "<td>" . $row['WK_13_GOAL']   . "</td>";
      echo "<td>" . $row['WK_14_GOAL']   . "</td>";
      echo "<td>" . $row['WK_15_GOAL']   . "</td>";
      echo "<td>" . $row['WK_16_GOAL']   . "</td>";
      echo "<td>" . $row['WK_17_GOAL']   . "</td>";
      echo "<td>" . $row['WK_18_GOAL']   . "</td>";
      echo "<td>" . $row['WK_19_GOAL']   . "</td>";
      echo "<td>" . $row['WK_20_GOAL']   . "</td>";
      echo "<td>" . $row['WK_21_GOAL']   . "</td>";
      echo "<td>" . $row['WK_22_GOAL']   . "</td>";
      echo "<td>" . $row['WK_23_GOAL']   . "</td>";
      echo "<td>" . $row['WK_24_GOAL']   . "</td>";
      echo "<td>" . $row['WK_25_GOAL']   . "</td>";
      echo "<td>" . $row['WK_26_GOAL']   . "</td>";
      echo "</tr>";
      $total_wk_01_goal += $row['WK_01_GOAL'];
      $total_wk_02_goal += $row['WK_02_GOAL'];
      $total_wk_03_goal += $row['WK_03_GOAL'];
      $total_wk_04_goal += $row['WK_04_GOAL'];
      $total_wk_05_goal += $row['WK_05_GOAL'];
      $total_wk_06_goal += $row['WK_06_GOAL'];
      $total_wk_07_goal += $row['WK_07_GOAL'];
      $total_wk_08_goal += $row['WK_08_GOAL'];
      $total_wk_09_goal += $row['WK_09_GOAL'];
      $total_wk_10_goal += $row['WK_10_GOAL'];
      $total_wk_11_goal += $row['WK_11_GOAL'];
      $total_wk_12_goal += $row['WK_12_GOAL'];
      $total_wk_13_goal += $row['WK_13_GOAL'];
      $total_wk_14_goal += $row['WK_14_GOAL'];
      $total_wk_15_goal += $row['WK_15_GOAL'];
      $total_wk_16_goal += $row['WK_16_GOAL'];
      $total_wk_17_goal += $row['WK_17_GOAL'];
      $total_wk_18_goal += $row['WK_18_GOAL'];
      $total_wk_19_goal += $row['WK_19_GOAL'];
      $total_wk_20_goal += $row['WK_20_GOAL'];
      $total_wk_21_goal += $row['WK_21_GOAL'];
      $total_wk_22_goal += $row['WK_22_GOAL'];
      $total_wk_23_goal += $row['WK_23_GOAL'];
      $total_wk_24_goal += $row['WK_24_GOAL'];
      $total_wk_25_goal += $row['WK_25_GOAL'];
      $total_wk_26_goal += $row['WK_26_GOAL'];
    }
    echo "<tr>";
    echo "<td></td>";
    echo "<td>TOTAL</td>";
    echo "<td>" . $total_wk_01_goal   . "</td>";
    echo "<td>" . $total_wk_02_goal   . "</td>";
    echo "<td>" . $total_wk_03_goal   . "</td>";
    echo "<td>" . $total_wk_04_goal   . "</td>";
    echo "<td>" . $total_wk_05_goal   . "</td>";
    echo "<td>" . $total_wk_06_goal   . "</td>";
    echo "<td>" . $total_wk_07_goal   . "</td>";
    echo "<td>" . $total_wk_08_goal   . "</td>";
    echo "<td>" . $total_wk_09_goal   . "</td>";
    echo "<td>" . $total_wk_10_goal   . "</td>";
    echo "<td>" . $total_wk_11_goal   . "</td>";
    echo "<td>" . $total_wk_12_goal   . "</td>";
    echo "<td>" . $total_wk_13_goal   . "</td>";
    echo "<td>" . $total_wk_14_goal   . "</td>";
    echo "<td>" . $total_wk_15_goal   . "</td>";
    echo "<td>" . $total_wk_16_goal   . "</td>";
    echo "<td>" . $total_wk_17_goal   . "</td>";
    echo "<td>" . $total_wk_18_goal   . "</td>";
    echo "<td>" . $total_wk_19_goal   . "</td>";
    echo "<td>" . $total_wk_20_goal   . "</td>";
    echo "<td>" . $total_wk_21_goal   . "</td>";
    echo "<td>" . $total_wk_22_goal   . "</td>";
    echo "<td>" . $total_wk_23_goal   . "</td>";
    echo "<td>" . $total_wk_24_goal   . "</td>";
    echo "<td>" . $total_wk_25_goal   . "</td>";
    echo "<td>" . $total_wk_26_goal   . "</td>";
    echo "</tr>";
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
