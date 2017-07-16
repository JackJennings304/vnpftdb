<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";
?>
<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Captains Wkly Rpt</title>
  <link rel="icon" type="image/x-icon" href="/vnpftdb/images/favicon.ico" />
</head>

<body>
<?php if($_SESSION['debug'] == 'ON') { echo $_SESSION['call_stack'] . "<br><br>"; } ?>


<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<div class="page-header clearfix">
  <div class = "form-group">
    <div class = "col-sm-1">
      <a
        href  = "/vnpftdb/php_code/stack_return.php"
        class = "btn btn-success"
        >
      Back
      </a>
    </div>
  </div>
  <br>
  <div class = "form-group">
    <h1> VNP Field Team Database</h1>
    <h2 class = "pull-left">
      Captains Weekly Report
	    <?php
    	$reg_team_filter = $_SESSION["reg_team_filter"];
	    if (isset($reg_team_filter)) { echo ", Region-Team set to " . $reg_team_filter; }
    	?>
    </h2>
  </div>
</div>
<?php
$sql  = "SELECT REG_TEAM, WEEK, START_DATE, END_DATE,";
$sql .= " SHIFTS_SCHEDULED, SHIFTS_FULFILLED, RECRUITING_CALLS_MADE,";
$sql .= " VOLUNTEERS_RECRUITED, VOLUNTEERS_TRAINED,";
$sql .= " PETITIONS_ON_HAND, CLIPBOARDS_ON_HAND, BUTTONS_ON_HAND";
$sql .= " FROM captains_weekly_rpt";
$sql .= ' WHERE REG_TEAM = "' . $_SESSION["reg_team_filter"] . '"';
$sql .= " ORDER BY WEEK";
if($result = mysqli_query($ftdb, $sql)){
  if(mysqli_num_rows($result) > 0){
    echo "<table class='table table-bordered table-striped'>";
		echo "<thead>";
    echo "<tr>";
    echo "<th></th>";
		echo "<th>Week</th>";
		echo "<th>Start&nbsp;Date&nbsp;&nbsp;</th>";
		echo "<th>End&nbsp;Date&nbsp;&nbsp;&nbsp;&nbsp;</th>";
		echo "<th>Shifts Scheduled</th>";
		echo "<th>Shifts Fulfilled</th>";
		echo "<th>Recruiting Calls Made</th>";
		echo "<th>Volunteers Recruited</th>";
		echo "<th>Volunteers Trained</th>";
		echo "<th># of Petitions on hand</th>";
    echo "<th># of Clipboards on hand</th>";
    echo "<th># of Buttons on hand</th>";
    echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		while($row = mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>";
      $anchor  = "<a href='/vnpftdb/php_code/stack_call_parms.php?";
      $anchor .= "child=/vnpftdb/app_screens/capt_wkly_rpt/capt_wkly_rpt_update.php";
      $anchor .= "&amp;parm1=reg_team&amp;parm1_value="  . $row['REG_TEAM'];
      $anchor .= "&amp;parm2=week&amp;parm2_value="       . $row['WEEK'];
      $anchor .= "'";
      $anchor .= ' title="Update Record" data-toggle="tooltip"';
      $anchor .= ">";
      $anchor .= "<span class='glyphicon glyphicon-pencil'></span></a>";
      echo $anchor;
      echo "</td>";
      echo "<td>" . $row['WEEK']                        . "</td>";
      echo "<td>" . $row['START_DATE']                  . "</td>";
      echo "<td>" . $row['END_DATE']                    . "</td>";
			echo "<td>" . $row['SHIFTS_SCHEDULED']            . "</td>";
			echo "<td>" . $row['SHIFTS_FULFILLED']            . "</td>";
			echo "<td>" . $row['RECRUITING_CALLS_MADE']       . "</td>";
			echo "<td>" . $row['VOLUNTEERS_RECRUITED']        . "</td>";
      echo "<td>" . $row['VOLUNTEERS_TRAINED']          . "</td>";
			echo "<td>" . $row['PETITIONS_ON_HAND']           . "</td>";
			echo "<td>" . $row['CLIPBOARDS_ON_HAND']          . "</td>";
			echo "<td>" . $row['BUTTONS_ON_HAND']             . "</td>";
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
</div>
</div>
</div>
</div>
</body>
</html>
