<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Progress Dates</title>
  <link rel="icon" type="image/x-icon" href="/vnpftdb/images/favicon.ico" />
</head>

<body>
<?php if($_SESSION['debug'] == 'ON') { echo $_SESSION['call_stack'] . "<br><br>"; } ?>

<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<div class = "form-horizontal">
<div class="form-group">
  <div class = "col-sm-2">
    <?php
    $anchor  = "<a";
    $anchor .= " href='";
    $anchor .= "/vnpftdb/php_code/stack_call.php?";
    $anchor .= "child=";
    $anchor .= "/vnpftdb/app_screens/progress_rpts_admin/progress_dates_add.php";
    $anchor .= "'";
    $anchor .= ' class = "btn btn-success"';
    $anchor .= ">";
    $anchor .= "Add New Measure Date";
    $anchor .= "</a>";
    echo $anchor
    ?>
  </div>
  <div class = "col-sm-2">
    <a
      href  = "/vnpftdb/php_code/stack_return.php"
      class = "btn btn-success pull-right"
      >
      Back
    </a>
  </div>
</div>
<div class = "col-sm-2">
  <br><br><br>
	<h2 class="pull-left">Progress Dates</h2>
</div>
</div>


<?php
$sql  = "SELECT";
$sql .= "  DAYNAME(MEAS_DATE) AS DAY_NAME";
$sql .= ", MEAS_DATE";
$sql .= ", MEAS_WEEK";
$sql .= " FROM progress_dates";
$sql .= " ORDER BY MEAS_DATE";
if($result = mysqli_query($ftdb, $sql)){
  if(mysqli_num_rows($result) > 0){
    echo "<table class='table table-bordered table-striped'>";
		echo "<thead>";
    echo "<tr>";
    echo "<th></th>";
    echo "<th>Week Day</th>";
		echo "<th>Measure Date</th>";
		echo "<th>Measure Week</th>";
    echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		while($row = mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>";
      # update link
      $anchor  = "<a href='/vnpftdb/php_code/stack_call_parms.php?";
      $anchor .= "child=/vnpftdb/app_screens/progress_rpts_admin/progress_dates_update.php";
      $anchor .= "&amp;parm1=meas_date&amp;parm1_value="   . $row['MEAS_DATE'];
      $anchor .= "'";
      $anchor .= ' title="Update Record" data-toggle="tooltip"';
      $anchor .= ">";
      $anchor .= "<span class='glyphicon glyphicon-pencil'></span></a>";
      echo $anchor;
      echo "&emsp;";
      # delete link
      $anchor  = "<a href='/vnpftdb/php_code/stack_call_parms.php?";
      $anchor .= "child=/vnpftdb/app_screens/captains/captains_delete.php";
      $anchor .= "&amp;parm1=meas_date&amp;parm1_value="   . $row['MEAS_DATE'];
      $anchor .= "'";
      $anchor .= ' title="Delete Record" data-toggle="tooltip"';
      $anchor .= ">";
      $anchor .= "<span class='glyphicon glyphicon-trash'></span></a>";
      echo $anchor;
      echo "</td>";
      echo "<td>" . $row['DAY_NAME']     . "</td>";
      echo "<td>" . $row['MEAS_DATE']    . "</td>";
      echo "<td>" . $row['MEAS_WEEK']    . "</td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    mysqli_free_result($result);
  } else{
    echo "<p class='lead'><em>No records were found.</em></p>";
  }
} else{
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($ftdb);
}
mysqli_close($ftdb);
?>

</div>   </div>   </div>   </div>

</body>

</html>
