<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Captains List</title>
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
      $anchor .= "/vnpftdb/app_screens/captains/captains_add.php";
      $anchor .= "'";
      $anchor .= ' class = "btn btn-success"';
      $anchor .= ">";
      $anchor .= "Add New Captain";
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
    <h2 class="pull-left">Captains List</h2>
  </div>
</div>

<?php
$sql  = "SELECT";
$sql .= "  NAME";
$sql .= ", REG_TEAM";
$sql .= ", NB_ID";
$sql .= " FROM captains";
$sql .= " ORDER BY NAME";
if($result = mysqli_query($ftdb, $sql)){
  if(mysqli_num_rows($result) > 0) {
    echo '<div class = "col-sm-4">';
    echo "<table class='table table-bordered table-striped'>";
		echo "<thead>";
    echo "<tr>";
    echo '<th style="width:30px"></th>';
    echo "<th style='width:30px'>Name</th>";
    echo "<th>Reg-Team</th>";
    echo "<th>Nation Builder ID</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while($row = mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>";
      # read link
      $anchor  = "<a href='/vnpftdb/php_code/stack_call_parms.php?";
      $anchor .= "child=/vnpftdb/app_screens/captains/captains_read.php";
      $anchor .= "&amp;parm1=NAME&amp;parm1_value="   . $row['NAME'];
      $anchor .= "'";
      $anchor .= ' title="View Captain Record" data-toggle="tooltip"';
      $anchor .= ">";
      $anchor .= "<span class='glyphicon glyphicon-eye-open'></span></a>";
      echo $anchor;
      echo "&emsp;";
      # update link
      $anchor  = "<a href='/vnpftdb/php_code/stack_call_parms.php?";
      $anchor .= "child=/vnpftdb/app_screens/captains/captains_update.php";
      $anchor .= "&amp;parm1=NAME&amp;parm1_value="   . $row['NAME'];
      $anchor .= "'";
      $anchor .= ' title="Update Captain Record" data-toggle="tooltip"';
      $anchor .= ">";
      $anchor .= "<span class='glyphicon glyphicon-pencil'></span></a>";
      echo $anchor;
      echo "&emsp;";
      # delete link
      $anchor  = "<a href='/vnpftdb/php_code/stack_call_parms.php?";
      $anchor .= "child=/vnpftdb/app_screens/captains/captains_delete.php";
      $anchor .= "&amp;parm1=NAME&amp;parm1_value="   . $row['NAME'];
      $anchor .= "'";
      $anchor .= ' title="Delete Captain Record" data-toggle="tooltip"';
      $anchor .= ">";
      $anchor .= "<span class='glyphicon glyphicon-trash'></span></a>";
      echo $anchor;

      echo "</td>";
      echo "<td>" . $row['NAME']     . "</td>";
      echo "<td>" . $row['REG_TEAM'] . "</td>";
      echo "<td>" . $row['NB_ID']    . "</td>";
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
