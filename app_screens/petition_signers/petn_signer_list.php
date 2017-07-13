<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";
?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $petn_num = trim($_POST['select_petn_num']);
  $target  = "/vnpftdb/php_code/stack_call_parms.php?";
  $target .= "child=/vnpftdb/app_screens/petition_signers/petn_signer_update.php";
  $target .= "&amp;parm1=petn_num&amp;parm1_value=$petn_num";
  echo "<meta";
  echo ' http-equiv = "refresh"';
  echo ' content="0;';
  echo " URL='$target'";
  echo '"';
  echo "/>";
}
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Petition Signers</title>
  <link rel="icon" type="image/x-icon" href="/vnpftdb/images/favicon.ico" />
</head>

<body>
<?php if($_SESSION['debug'] == 'ON') { echo $_SESSION['call_stack'] . "<br><br>"; } ?>


<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<div class = "page-header">
  <div class = "form-group">
    <div class = "col-sm-1">
      <a
        href  = "<?php echo $_SESSION['Cur_top_menu']; ?>"
        class = "btn btn-success"
      >
      Main Menu
      </a>
    </div>
  </div>
  <br>
  <h2>Petition Signers, Phones, Emails
  <?php
  $reg_team_filter = $_SESSION["reg_team_filter"];
  if (isset($reg_team_filter)) { echo ", Region-Team set to " . $reg_team_filter; }
  echo "</h2>"
  ?>
</div>

<form
  class  = "form-horizontal"
  method = "post"
  >
<div class="form-group">
  <label
    class = "col-sm-2"
    for   = "select-petn_num"
    >
    Select Petition #
  </label>
  <div class="col-sm-2">
    <input
      type  = "text"
      name  = "select_petn_num"
      class = "form-control"
      value = ""
      >
  </div>
  <div class="col-sm-1">
    <input
      type="submit"
      class="btn btn-primary"
      value="Edit"
      >
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
</form>


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
$sql .= " AND cur_stage_id >= 5";
$sql .= " ORDER BY petn_num";
if($result = mysqli_query($ftdb, $sql)){
  if(mysqli_num_rows($result) > 0){
    echo "<div class = 'col-sm-3'>";
    echo "<table class='table table-bordered table-striped'>";
		echo "<thead>";
    echo "<tr>";
    echo "<th></th>";
    echo "<th>Petition#</th>";
    echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		while($row = mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>";
      # petition_signers link
      $anchor  = "<a href='/vnpftdb/php_code/stack_call_parms.php?";
      $anchor .= "child=/vnpftdb/app_screens/petition_signers/petn_signer_update.php";
      $anchor .= "&amp;parm1=petn_num&amp;parm1_value="   . $row['petn_num'];
      $anchor .= "'";
      $anchor .= ' title="Petition Signers" data-toggle="tooltip"';
      $anchor .= ">";
      $anchor .= "<span class='glyphicon glyphicon-envelope'></span></a>";
      echo $anchor;
      echo "</td>";
      echo "<td>" . $row['petn_num']              . "</td>";
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

</div>  </div>  </div>  </div>

</body>
</html>
