<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Teams List</title>
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
    <div class = "col-sm-2">
      <?php
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/app_screens/teams/teams_add.php";
      $anchor .= "'";
      $anchor .= ' class = "btn btn-success"';
      $anchor .= ">";
      $anchor .= "Add New Team";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </div>
    <div class="col-sm-2">
      <a
        href  = "/vnpftdb/php_code/stack_return.php"
        class = "btn btn-default"
        >
        Back
      </a>
    </div>
  </div>
	<br><br><br>
  <div class = "form-group">
    <h2 class="pull-left">Teams (Region-Team)</h2>
  </div>
</div>

<?php
$sql  = "SELECT";
$sql .= "  REG_TEAM";
$sql .= ", TERRITORY_NAME";
$sql .= " FROM reg_teams_v01";
$sql .= " ORDER BY REGION, TEAM_NUM";
if($result = mysqli_query($ftdb, $sql)) {
  if(mysqli_num_rows($result) > 0){
    echo '<div class = "col-sm-6">';
    echo "<table class='table table-bordered table-striped'>";
		echo "<thead>";
    echo "<tr>";
    //echo "<th style = 'width: 20px'></th>";
    echo "<th></th>";
    echo "<th style = 'width:20px'>Reg-Team</th>";
    echo "<th style = 'width:20px'>Territory Name</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while($row = mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>";
      # read link
      $anchor  = "<a href='/vnpftdb/php_code/stack_call_parms.php?";
      $anchor .= "child=/vnpftdb/app_screens/teams/teams_read.php";
      $anchor .= "&amp;parm1=REG_TEAM&amp;parm1_value="   . $row['REG_TEAM'];
      $anchor .= "'";
      $anchor .= ' title="View Team Record" data-toggle="tooltip"';
      $anchor .= ">";
      $anchor .= "<span class='glyphicon glyphicon-eye-open'></span></a>";
      echo $anchor;
      echo "&emsp;";
      # update link
      $anchor  = "<a href='/vnpftdb/php_code/stack_call_parms.php?";
      $anchor .= "child=/vnpftdb/app_screens/teams/teams_update.php";
      $anchor .= "&amp;parm1=REG_TEAM&amp;parm1_value="   . $row['REG_TEAM'];
      $anchor .= "'";
      $anchor .= ' title="Update Team Record" data-toggle="tooltip"';
      $anchor .= ">";
      $anchor .= "<span class='glyphicon glyphicon-pencil'></span></a>";
      echo $anchor;
      echo "&emsp;";
      # delete link
      $anchor  = "<a href='/vnpftdb/php_code/stack_call_parms.php?";
      $anchor .= "child=/vnpftdb/app_screens/teams/teams_delete.php";
      $anchor .= "&amp;parm1=REG_TEAM&amp;parm1_value="   . $row['REG_TEAM'];
      $anchor .= "'";
      $anchor .= ' title="Delete Team Record" data-toggle="tooltip"';
      $anchor .= ">";
      $anchor .= "<span class='glyphicon glyphicon-trash'></span></a>";
      echo $anchor;
      echo "</td>";
      echo "<td>" . $row['REG_TEAM']       . "</td>";
      echo "<td>" . $row['TERRITORY_NAME'] . "</td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
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
