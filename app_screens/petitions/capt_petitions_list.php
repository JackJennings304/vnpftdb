<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Petitions</title>
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
    $anchor .= "/vnpftdb/app_screens/petition_batches/capt_petn_batch_add.php";
    $anchor .= "'";
    $anchor .= ' class = "btn btn-success"';
    $anchor .= ">";
    $anchor .= "Input/Update Multiple Petitions";
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
</div>
  <br><br>
  <h2 class = "pull-left">
    Petitions List
    <?php
	  $reg_team_filter = $_SESSION["reg_team_filter"];
	  if (isset($reg_team_filter)) { echo ", Region-Team set to " . $reg_team_filter; }
	  ?>
  </h2>

<?php
$sql  = "SELECT ";
$sql .= " petn_num, reg_team,";
$sql .= " petn_batch_id,";
$sql .= " captain_id, captain, circulator,";
$sql .= " sign_cnt, phone_cnt, email_cnt,";
$sql .= " cur_stage_id, cur_stage,";
$sql .= " cur_stage_dt,";
$sql .= " latest_out_to_capt_dt, latest_out_to_circ_dt,";
$sql .= " earliest_completed_dt";
$sql .= " FROM petitions_v01";
$sql .= " WHERE reg_team = '" . $_SESSION["reg_team_filter"] . "'";
$sql .= " AND captain_viewable = 'X'";
$sql .= " ORDER BY petn_num";
if($result = mysqli_query($ftdb, $sql)){
  if(mysqli_num_rows($result) > 0){
    echo "<table class='table table-bordered table-striped'>";
		echo "<thead>";
    echo "<tr>";
    echo "<th></th>";
    echo "<th>Petition#</th>";
    echo "<th>Batch#</th>";
    echo "<th>Captain</th>";
    echo "<th>Circulator</th>";
    echo "<th>Signer Count</th>";
    echo "<th>Phone Count</th>";
    echo "<th>Email Count</th>";
    echo "<th>Current Stage</th>";
    echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		while($row = mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>";
      # read link
      $anchor  = "<a href='/vnpftdb/php_code/stack_call_parms.php?";
      $anchor .= "child=/vnpftdb/app_screens/petitions/capt_petitions_read.php";
      $anchor .= "&amp;parm1=petn_num&amp;parm1_value="   . $row['petn_num'];
      $anchor .= "'";
      $anchor .= ' title="View Single Petition" data-toggle="tooltip"';
      $anchor .= ">";
      $anchor .= "<span class='glyphicon glyphicon-eye-open'></span></a>";
      echo $anchor;
      echo "&emsp;";
      # update link
      $anchor  = "<a href='/vnpftdb/php_code/stack_call_parms.php?";
      $anchor .= "child=/vnpftdb/app_screens/petitions/capt_petitions_update.php";
      $anchor .= "&amp;parm1=petn_num&amp;parm1_value="   . $row['petn_num'];
      $anchor .= "'";
      $anchor .= ' title="Update Single Petition" data-toggle="tooltip"';
      $anchor .= ">";
      $anchor .= "<span class='glyphicon glyphicon-pencil'></span></a>";
      echo $anchor;
      echo "&emsp;";
      # petition_signers link
      $anchor  = "<a href='/vnpftdb/php_code/stack_call_parms.php?";
      $anchor .= "child=/vnpftdb/app_screens/petition_signers/petn_signer_update.php";
      $anchor .= "&amp;parm1=petn_num&amp;parm1_value="   . $row['petn_num'];
      $anchor .= "'";
      $anchor .= ' title="Edit Petition Signers, Phones, Emails" data-toggle="tooltip"';
      $anchor .= ">";
      $anchor .= "<span class='glyphicon glyphicon-envelope'></span></a>";
      echo $anchor;
      echo "</td>";
      echo "<td>" . $row['petn_num']              . "</td>";
      echo "<td>" . $row['petn_batch_id']         . "</td>";
      echo "<td>" . $row['captain']               . "</td>";
			echo "<td>" . $row['circulator']            . "</td>";
      echo "<td>" . $row['sign_cnt']              . "</td>";
      echo "<td>" . $row['phone_cnt']             . "</td>";
			echo "<td>" . $row['email_cnt']             . "</td>";
			echo "<td>" . $row['cur_stage']             . "</td>";
			# echo "<td>" . $row['cur_stage_dt']          . "</td>";
			# echo "<td>" . $row['latest_out_to_circ_dt'] . "</td>";
			# echo "<td>" . $row['earliest_completed_dt'] . "</td>";
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

</div>  </div>  </div>  </div>

</body>
</html>
