<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";

$id              		   = "";
$reg_team        			 = "";
$captain_id      			 = "";
$captain_name          = "";
$circulator_team       = "";
$circulator_all  			 = "";
$starting_petition_num = "";
$ending_petition_num   = "";
$stage_id              = "";
$stage_name            = "";
$CREATE_DT             = date('Y-m-d');
?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $id              			 = trim($_POST["id"]);
  $reg_team        			 = $_SESSION["reg_team_filter"];
  $region                = substr($reg_team,0,(stripos($reg_team,"-")));
  $captain_id      			 = trim($_POST["captain_id"]);
  $circulator_team 			 = trim($_POST["circulator_team"]);
  $circulator_all   		 = trim($_POST["circulator_all"]);
  if ($circulator_team != "") { $circulator = $circulator_team; } elseif
     ($circulator_all  != "") { $circulator = $circulator_all;  } else
     {$circulator       = ""; }
	$starting_petition_num = trim($_POST["starting_petition_num"]);
	$ending_petition_num   = trim($_POST["ending_petition_num"]);
  $stage_id        			 = trim($_POST["stage_id"]);
  $CREATE_DT       			 = trim($_POST["CREATE_DT"]);

	if ($captain_id     			 === "") { $sql_captain_id            = "NULL"; } else { $sql_captain_id            =  $captain_id;            }
	if ($circulator     			 === "") { $sql_circulator            = "NULL"; } else { $sql_circulator            = "'" . $circulator . "'"; }
	if ($starting_petition_num === "") { $sql_starting_petition_num = "NULL"; } else { $sql_starting_petition_num =  $starting_petition_num; }
	if ($ending_petition_num   === "") { $sql_ending_petition_num   = "NULL"; } else { $sql_ending_petition_num   =  $ending_petition_num;   }
	if ($stage_id       			 === "") { $sql_stage_id              = "NULL"; } else { $sql_stage_id              =  $stage_id;          	   }
	if ($CREATE_DT      			 === "") { $sql_CREATE_DT             = "NULL"; } else { $sql_CREATE_DT             = "'" . $CREATE_DT . "'";  }

	$sql  = "INSERT INTO petition_batches";
  $sql .= " (";
	$sql .= "   REG_TEAM";
  $sql .= ", CAPTAIN_ID";
  $sql .= ", CIRCULATOR";
	$sql .= ", STARTING_PETITION_NUM";
  $sql .= ", ENDING_PETITION_NUM";
  $sql .= ", STAGE_ID";
  $sql .= ", CREATE_DT";
	$sql .= " )";
	$sql .= " VALUES";
  $sql .= " (";
	$sql .= " '$reg_team'";
  $sql .= ", $sql_captain_id";
  $sql .= ", $sql_circulator";
  $sql .= ", $sql_starting_petition_num";
  $sql .= ", $sql_ending_petition_num";
  $sql .= ", $sql_stage_id";
  $sql .= ", $sql_CREATE_DT";
	$sql .= " )";
	if(mysqli_query($ftdb, $sql)) {
	} else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($ftdb);
	}
  # Get last petition_batch id
  $sql  = "SELECT max(ID) as last_batch_id from petition_batches WHERE REG_TEAM = '$reg_team'";
  if ($result = mysqli_query($ftdb, $sql)) {
 	  $row = mysqli_fetch_array($result);
  } else { exit(); }
  $petn_batch_id = $row['last_batch_id'];

  # Now update the associated petition rows
  for ($petn_num = $starting_petition_num; $petn_num <= $ending_petition_num ; $petn_num ++) {
    #  $latest_out_to_capt_dt
    #  $latest_out_to_circ_dt
    #  $earliest_completed_dt
    $original_stage_id = "";
    if       ( $original_stage_id == $stage_id ) {
        # don't update any dates.  Nothing has changed.
    } elseif ( $stage_id == 2                  ) {
        # Stage 2: Regional Director, blank, on hand - captain returning blank petitions back to RD
        # Set latest_out_to_capt_dt to null
        # Set latest_out_to_circ_dt to null
        # Set earliest_completed_dt to null
        $latest_out_to_capt_dt = '';
        $latest_out_to_circ_dt = '';
        $earliest_completed_dt = '';
    } elseif ( $stage_id == 3                  ) {
        # Stage 3: Captain, blank, on hand - captain accepting blank petitions back from circulator
        # Set latest_out_to_capt_dt to today
        # Set latest_out_to_circ_dt to null
        # Set earliest_completed_dt to null
        $latest_out_to_capt_dt = date('Y-m-d');
        $latest_out_to_circ_dt = '';
        $earliest_completed_dt = '';
    } elseif ( $stage_id == 4                  ) {
        # Stage 4: Circulator, on hand - captain sending petitions out to circulator
        # Set latest_out_to_circ_dt to today
        # Set earliest_completed_dt to null
        # get latest_out_to_capt_dt from record.  If null then set = today
        $latest_out_to_capt_dt = mysqli_fetch_array(mysqli_query($ftdb,"SELECT IFNULL(latest_out_to_capt_dt,'') as col1 FROM petitions WHERE petn_num = '$petn_num'"))['col1'];
        if ($latest_out_to_capt_dt === "") { $latest_out_to_capt_dt = date('Y-m-d'); }
        $latest_out_to_circ_dt = date('Y-m-d');
        $earliest_completed_dt = '';
    } elseif ( $stage_id == 5                  ) {
        # Stage 5: Captain, completed, on hand - captain recieving completed petitions from circulator
        $latest_out_to_capt_dt = mysqli_fetch_array(mysqli_query($ftdb,"SELECT IFNULL(latest_out_to_capt_dt,'') as col1 FROM petitions WHERE petn_num = '$petn_num'"))['col1'];
        if ($latest_out_to_capt_dt === "") { $latest_out_to_capt_dt = date('Y-m-d'); }
        $latest_out_to_circ_dt = mysqli_fetch_array(mysqli_query($ftdb,"SELECT IFNULL(latest_out_to_circ_dt,'') as col1 FROM petitions WHERE petn_num = '$petn_num'"))['col1'];
        if ($latest_out_to_circ_dt === "") { $latest_out_to_circ_dt = date('Y-m-d'); }
        # Set earliest_completed_dt to today
        $earliest_completed_dt = date('Y-m-d');
    } elseif ( $stage_id == 6                  ) {
        # Stage 6: Regional Director, completed, on hand - captain sending completed petitions to RD
        $latest_out_to_capt_dt = mysqli_fetch_array(mysqli_query($ftdb,"SELECT IFNULL(latest_out_to_capt_dt,'') as col1 FROM petitions WHERE petn_num = '$petn_num'"))['col1'];
        if ($latest_out_to_capt_dt === "") { $latest_out_to_capt_dt = date('Y-m-d'); }
        $latest_out_to_circ_dt = mysqli_fetch_array(mysqli_query($ftdb,"SELECT IFNULL(latest_out_to_circ_dt,'') as col1 FROM petitions WHERE petn_num = '$petn_num'"))['col1'];
        if ($latest_out_to_circ_dt === "") { $latest_out_to_circ_dt = date('Y-m-d'); }
        $earliest_completed_dt = mysqli_fetch_array(mysqli_query($ftdb,"SELECT IFNULL(earliest_completed_dt,'') as col1 FROM petitions WHERE petn_num = '$petn_num'"))['col1'];
        if ($earliest_completed_dt === "") { $earliest_completed_dt = date('Y-m-d'); }
        # Set earliest_completed_dt to today if it is currently null
    } elseif ( $stage_id == 8                  ) {
        # Stage 8: VNP, Signer Verification - captain sending completed petitions back to VNP
        # Set earliest_completed_dt to today if it is currently null
        $latest_out_to_capt_dt = mysqli_fetch_array(mysqli_query($ftdb,"SELECT IFNULL(latest_out_to_capt_dt,'') as col1 FROM petitions WHERE petn_num = '$petn_num'"))['col1'];
        if ($latest_out_to_capt_dt === "") { $latest_out_to_capt_dt = date('Y-m-d'); }
        $latest_out_to_circ_dt = mysqli_fetch_array(mysqli_query($ftdb,"SELECT IFNULL(latest_out_to_circ_dt,'') as col1 FROM petitions WHERE petn_num = '$petn_num'"))['col1'];
        if ($latest_out_to_circ_dt === "") { $latest_out_to_circ_dt = date('Y-m-d'); }
        $earliest_completed_dt = mysqli_fetch_array(mysqli_query($ftdb,"SELECT IFNULL(earliest_completed_dt,'') as col1 FROM petitions WHERE petn_num = '$petn_num'"))['col1'];
        if ($earliest_completed_dt === "") { $earliest_completed_dt = date('Y-m-d'); }
    } else {
        # should never get here
    }

    if ($latest_out_to_capt_dt === "") { $sql_latest_out_to_capt_dt = "NULL"; } else { $sql_latest_out_to_capt_dt = "'" . $latest_out_to_capt_dt . "'"; }
    if ($latest_out_to_circ_dt === "") { $sql_latest_out_to_circ_dt = "NULL"; } else { $sql_latest_out_to_circ_dt = "'" . $latest_out_to_circ_dt . "'"; }
    if ($earliest_completed_dt === "") { $sql_earliest_completed_dt = "NULL"; } else { $sql_earliest_completed_dt = "'" . $earliest_completed_dt . "'"; }

    $sql  = " UPDATE petitions";
    $sql .= " SET";
    $sql .= "  region         =  $region";
    $sql .= ", reg_team       = '$reg_team'";
    $sql .= ", petn_batch_id  =  $petn_batch_id";
    # If user doesn't fill in captain or circulator, leave those fields alone in petitions
  	if ($captain_id  === "") { } else { $sql .= ", captain_id =  $captain_id" ;  }
	  if ($circulator  === "") { } else { $sql .= ", circulator = '$circulator'";  }
    $sql .= ", cur_stage_id   =  $sql_stage_id";
    $sql .= ", cur_stage_dt   =  '" . date('Y-m-d') . "'";
    $sql .= ", latest_out_to_capt_dt =  $sql_latest_out_to_capt_dt";
    $sql .= ", latest_out_to_circ_dt =  $sql_latest_out_to_circ_dt";
    $sql .= ", earliest_completed_dt =  $sql_earliest_completed_dt";
    $sql .= " WHERE petn_num  =  $petn_num";
    $sql .= " AND cur_stage_id NOT IN (6,7,8,9)";
    if(mysqli_query($ftdb, $sql)) {
    } else{
  	  echo "ERROR: Could not able to execute $sql. " . mysqli_error($ftdb);
      exit();
    }
  }
  mysqli_close($ftdb);
  include "$php_root/stack_return_within_php.php";
  exit();
}
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Inp/Upd Mult Petns</title>
  <link rel="icon" type="image/x-icon" href="/vnpftdb/images/favicon.ico" />

  <script>
  function validateForm() {
    var start_petn_num = document.forms["mainForm"]["starting_petition_num"].value;
    var end_petn_num   = document.forms["mainForm"]["ending_petition_num"].value;
    if (end_petn_num < start_petn_num) {
      alert("Ending Petition number must be greater than Starting Petition number");
      return false;
    }
    var x = Number(start_petn_num) + Number(99);
    if ( end_petn_num > x ) {
      alert("Can only update at most 100 petitions at a time");
      return false;
    }
    return true;
  }
  </script>

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
    <h2>
      Input/Update Multiple Petitions
      <?php
      $reg_team_filter = $_SESSION["reg_team_filter"];
      if (isset($reg_team_filter)) { echo ", Region-Team set to " . $reg_team_filter; }
      ?>
    </h2>
  </div>
</div>

<form
  name     = "mainForm"
  class    = "form-horizontal"
  method   = "post"
  onsubmit = "return validateForm()"
  >

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="id"
  >
    Batch# (gets automatically assigned):
  </label>
  <div class="col-sm-1">
      <input
        type  = "number"
        name  = "id"
        class = "form-control"
        value = "";
        readonly
      >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="reg_team"
    >
    Region-Team (pre-set):
  </label>
  <div class="col-sm-1">
      <input
        type  = "text"
        name  = "reg_team"
        class = "form-control"
        value = "<?php echo $_SESSION["reg_team_filter"] ?>";
        readonly
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="captain_id"
  >
    Captain:
  </label>
  <div class="col-sm-3">
	  <select
      name="captain_id"
      class="form-control"
      value=""
      >
	  <?php
	  $sql  = "SELECT NB_ID, NAME, REG_TEAM FROM captains_v01 ORDER BY NAME";
    include "$php_root/db_config_ftdb.php";
	  $result = mysqli_query($ftdb, $sql);
	  echo "<option value =''></option>";
	  while($row = mysqli_fetch_array($result)){
		  $string  = "<option value=" . $row['NB_ID'];
		  $string .= ">" . $row['NAME'] . "," . $row['REG_TEAM'] . "</option>";
		  echo $string . "\n";
	  }
	  mysqli_close($ftdb);
	  ?>
	</select>
  </div>
</div>

<div class="form-group">

  <label
    class="control-label col-sm-3"
    for="circulator_team"
    >
    Team Circulators:
  </label>
  <div class="col-sm-3">
	  <select
      name="circulator_team"
      class="form-control"
      value=""
      >
	  <?php
	  $sql  = "SELECT nb_id, name, reg_team FROM circulators_v01";
    $sql .= " WHERE reg_team = '" . $_SESSION["reg_team_filter"] . "'";
    $sql .= " ORDER BY name";
    include "$php_root/db_config_ftdb.php";
	  $result = mysqli_query($ftdb, $sql);
	  echo "<option value =''></option>";
	  while($row = mysqli_fetch_array($result)){
		  $string  = "<option value='" . $row['name'] . "'>";
		  $string .= $row['name'] . "," . $row['reg_team'] . "</option>";
		  echo $string . "\n";
	  }
	  mysqli_close($ftdb);
	  ?>
	 </select>
  </div>

  <label
    class="control-label col-sm-2"
    for="circulator_all"
    >
    All Circulators:
  </label>

  <div class="col-sm-3">
	  <select
      name  = "circulator_all"
      class = "form-control"
      value = ""
      >
	  <?php
	  $sql  = "SELECT nb_id, name, reg_team FROM circulators_v01";
    $sql .= " ORDER BY name";
    include "$php_root/db_config_ftdb.php";
	  $result = mysqli_query($ftdb, $sql);
	  echo "<option value =''></option>";
	  while($row = mysqli_fetch_array($result)){
		  $string  = "<option value='" . $row['name'] . "'>";
		  $string .= $row['name'] . "," . $row['reg_team'] . "</option>";
		  echo $string . "\n";
	  }
	  mysqli_close($ftdb);
	  ?>
	 </select>
  </div>

  <div class="col-sm-1">
    <?php
    $anchor  = "<a";
    $anchor .= " href='";
    $anchor .= "/vnpftdb/php_code/stack_call.php?";
    $anchor .= "child=";
    $anchor .= "/vnpftdb/app_screens/circulators/circulators_add.php";
    $anchor .= "'";
    $anchor .= ' class = "btn btn-success"';
    $anchor .= ">";
    $anchor .= "Add Circ";
    $anchor .= "</a>";
    echo $anchor
    ?>
  </div>
</div>

<div class="form-group">
  <div class = "col-sm-3">
  </div>
  <div class = "col-sm-8">
    <p>Pick either dropdown to find your Circulator.  Start with the Circulators assigned to your team.
      If you can't find him/her on the team list, try the "All Circulators" list.  If your circulator is not in the
      system, use the "Add Circ" button and return to this screen.
    </p>
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="starting_petition_num"
  >
    Starting Petition #:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "starting_petition_num"
        class = "form-control"
        value = "<?php echo $row['starting_petition_num']; ?>"
        min   = "200001"
        max   = "350000"
        required
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="ending_petition_num"
  >
    Ending Petition #:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "ending_petition_num"
        class = "form-control"
        value = "<?php echo $row['ending_petition_num']; ?>"
        min   = "200001"
        max   = "350000"
        required
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="stage_id"
  >
    Stage:
  </label>
  <div class="col-sm-3">
	  <select
      name="stage_id"
      class="form-control"
      value=""
      required
      >
	  <?php
	  $sql  = "SELECT id, stage_name FROM petition_stages";
    $sql .= " WHERE id IN (2,3,4,5,6,8)";
    $sql .= " ORDER BY sort_num";
    include "$php_root/db_config_ftdb.php";
	  $result = mysqli_query($ftdb, $sql);
	  echo "<option value =''></option>";
	  while($row = mysqli_fetch_array($result)){
		  $string  = "<option value=" . $row['id'];
		  $string .= ">" . $row['stage_name'] . "</option>";
		  echo $string . "\n";
	  }
	  mysqli_close($ftdb);
	  ?>
	</select>
  </div>
</div>

<input
  type  = "hidden"
  name  = "CREATE_DT"
  value = "<?php echo $CREATE_DT; ?>"
  >

<div class="form-group">

  <div class = "col-sm-3">
  </div>

  <div class="col-sm-2">
    <input
      type="submit"
      class="btn btn-primary"
      value="Submit"
      >
  </div>

  <div class="col-sm-2">
    <a
      href="/vnpftdb/php_code/stack_return.php"
      class="btn btn-default"
      >
      Cancel
    </a>
  </div>
</div>

</form>

</div>  </div>  </div>  </div>
</body>

</html>
