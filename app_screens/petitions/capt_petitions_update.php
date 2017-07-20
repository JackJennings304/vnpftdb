<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";
if(isset($_POST["petn_num"]) && !empty($_POST["petn_num"])) {
  $petn_num              = $_POST['petn_num'];
  $petn_batch_id         = $_POST['petn_batch_id'];
  $captain_id            = $_POST['captain_id'];
  $circulator            = $_POST['circulator'];
  $sign_cnt              = $_POST['sign_cnt'];
  $phone_cnt             = $_POST['phone_cnt'];
  $email_cnt             = $_POST['email_cnt'];
  $cur_stage_id          = $_POST['cur_stage_id'];
  $stage_id              = $cur_stage_id;
  $original_stage_id     = "";
  $latest_out_to_capt_dt = $_POST['latest_out_to_capt_dt'];
  $latest_out_to_circ_dt = $_POST['latest_out_to_circ_dt'];
  $earliest_completed_dt = $_POST['earliest_completed_dt'];
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
      $latest_out_to_circ_dt = date('Y-m-d');
      $earliest_completed_dt = '';
  } elseif ( $stage_id == 5                  ) {
      # Stage 5: Captain, completed, on hand - captain recieving completed petitions from circulator
      # Set earliest_completed_dt to today
      $earliest_completed_dt = date('Y-m-d');
  } elseif ( $stage_id == 6                  ) {
      # Stage 6: Regional Director, completed, on hand - captain sending completed petitions to RD
      # Update cur_stage_dt to today
      # Set earliest_completed_dt to today if it is currently null
      if ( $earliest_completed_dt == '') {
        $earliest_completed_date = date('Y-m-d');
      }
  } elseif ( $stage_id == 8                  ) {
      # Stage 8: VNP, Signer Verification - captain sending completed petitions back to VNP
      # Set earliest_completed_dt to today if it is currently null
      if ( $earliest_completed_dt == '') {
        $earliest_completed_date = date('Y-m-d');
      }
  } else {
      # should never get here
  }
  $reg_team        			 = $_SESSION["reg_team_filter"];
  $region                = substr($reg_team,0,stripos($reg_team,"-"));
	if ($captain_id     			 === "") { $sql_captain_id            = "NULL"; } else { $sql_captain_id            =  $captain_id;            }
	if ($circulator     			 === "") { $sql_circulator            = "NULL"; } else { $sql_circulator            = "'" . $circulator . "'"; }
  if ($sign_cnt              === "") { $sql_sign_cnt              = "NULL"; } else { $sql_sign_cnt              =  $sign_cnt;              }
  if ($phone_cnt             === "") { $sql_phone_cnt             = "NULL"; } else { $sql_phone_cnt             =  $phone_cnt;             }
  if ($email_cnt             === "") { $sql_email_cnt             = "NULL"; } else { $sql_email_cnt             =  $email_cnt;             }
  if ($latest_out_to_capt_dt === "") { $sql_latest_out_to_capt_dt = "NULL"; } else { $sql_latest_out_to_capt_dt = "'" . $latest_out_to_capt_dt . "'"; }
  if ($latest_out_to_circ_dt === "") { $sql_latest_out_to_circ_dt = "NULL"; } else { $sql_latest_out_to_circ_dt = "'" . $latest_out_to_circ_dt . "'"; }
  if ($earliest_completed_dt === "") { $sql_earliest_completed_dt = "NULL"; } else { $sql_earliest_completed_dt = "'" . $earliest_completed_dt . "'"; }
  $sql  = " UPDATE petitions";
  $sql .= " SET";
  $sql .= "  region                =  $region";
  $sql .= ", reg_team              = '$reg_team'";
  $sql .= ", petn_batch_id         =  $petn_batch_id";
  $sql .= ", captain_id            =  $sql_captain_id";
  $sql .= ", circulator            =  $sql_circulator";
  $sql .= ", sign_cnt              =  $sql_sign_cnt";
  $sql .= ", phone_cnt             =  $sql_phone_cnt";
  $sql .= ", email_cnt             =  $sql_email_cnt";
  $sql .= ", cur_stage_id          =  $stage_id";
  $sql .= ", cur_stage_dt          =  '" . date('Y-m-d') . "'";
  $sql .= ", latest_out_to_capt_dt =  $sql_latest_out_to_capt_dt";
  $sql .= ", latest_out_to_circ_dt =  $sql_latest_out_to_circ_dt";
  $sql .= ", earliest_completed_dt =  $sql_earliest_completed_dt";
  $sql .= " WHERE petn_num  =  $petn_num";
  if(mysqli_query($ftdb, $sql)) {
  } else{
	  echo "ERROR: Could not able to execute $sql. " . mysqli_error($ftdb);
    exit();
  }
  mysqli_close($ftdb);
  include "$php_root/stack_return_within_php.php";
  exit();
}
$petn_num = $_GET['petn_num'];
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Upd Single Petn</title>
  <link rel="icon" type="image/x-icon" href="/vnpftdb/images/favicon.ico" />

  <script>
  function validateForm() {
      var sign_cnt     = document.forms["mainForm"]["sign_cnt"].value;
      var phone_cnt    = document.forms["mainForm"]["phone_cnt"].value;
      var email_cnt    = document.forms["mainForm"]["email_cnt"].value;
      var cur_stage_id = document.forms["mainForm"]["cur_stage_id"].value;
      // sign_cnt must be >= phone_cnt and email_cnt
      // if (sign_cnt < phone_cnt || sign_cnt < email_cnt) {
      //  alert("Signer Count must be equal or larger than both Phone Count and Email Count");
      //  return false;
      //}
      // sign_cnt must be > 0 if cur_stage is past Captain, complete, on hand
      if ( (cur_stage_id == 6 || cur_stage_id == 8) && (sign_cnt == 0 || sign_cnt == "") ) {
        alert("Signer Count must be filled in if you are sending petitions past the Captain's stages");
        return false;
      }
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
  <div class = "form-group">
    <h1> VNP Field Team Database</h1>
    <h1>Update Single Petition</h1>
  </div>
</div>

<?php
$sql  = "SELECT ";
$sql .= " petn_num";
$sql .= ", reg_team";
$sql .= ", petn_batch_id";
$sql .= ", captain_id";
$sql .= ", captain";
$sql .= ", circulator";
$sql .= ", sign_cnt";
$sql .= ", phone_cnt";
$sql .= ", email_cnt";
$sql .= ", cur_stage_id";
$sql .= ", cur_stage";
$sql .= ", cur_stage_dt";
$sql .= ", latest_out_to_capt_dt";
$sql .= ", latest_out_to_circ_dt";
$sql .= ", earliest_completed_dt";
$sql .= " FROM petitions_v01";
$sql .= " WHERE petn_num = " . $petn_num;
if ($result = mysqli_query($ftdb, $sql)) {
  if (mysqli_num_rows($result) == 1 ) {
    $row = mysqli_fetch_array($result);
    $petn_num              = $row['petn_num'];
    $reg_team              = $row['reg_team'];
    $petn_batch_id         = $row['petn_batch_id'];
    $captain_id            = $row['captain_id'];
    $captain               = $row['captain'];
    $circulator            = $row['circulator'];
    $sign_cnt              = $row['sign_cnt'];
    $phone_cnt             = $row['phone_cnt'];
    $email_cnt             = $row['email_cnt'];
    $cur_stage_id          = $row['cur_stage_id'];
    $original_stage_id     = $cur_stage_id;
    $cur_stage             = $row['cur_stage'];
    $cur_stage_dt          = $row['cur_stage_dt'];
    $latest_out_to_capt_dt = $row['latest_out_to_capt_dt'];
    $latest_out_to_circ_dt = $row['latest_out_to_circ_dt'];
    $earliest_completed_dt = $row['earliest_completed_dt'];
  } else {
    echo $sql;
    header("location: petitions_error.php");
    exit();
  }
} else {
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($ftdb);
}
mysqli_close($ftdb);
?>


<form
  name     = "mainForm"
  class    = "form-horizontal"
  method   = "post"
  onsubmit = "return validateForm()"
>
<div class="form-group">
  <label
    class="control-label col-sm-2"
    for="petn_num"
    >
    Petition #:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "petn_num"
        class = "form-control"
        value = <?php echo $petn_num; ?>
        readonly
      >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-2"
    for="petn_batch_id"
    >
    Batch #:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "petn_batch_id"
        class = "form-control"
        value = <?php echo $petn_batch_id; ?>
      >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-2"
    for="captain"
    >
    Captain:
  </label>
  <div class="col-sm-3">
	  <select
      name  = "captain_id"
      class = "form-control"
      value = "<?php echo $captain_id; ?>"
      >
	    <?php
	    $sql  = "SELECT NB_ID, NAME, REG_TEAM FROM captains_v01 ORDER BY NAME";
      include "$php_root/db_config_ftdb.php";
	    $result = mysqli_query($ftdb, $sql);
	    echo "<option value ='$captain_id'>$captain</option>";
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
    class="control-label col-sm-2"
    for="circulator"
    >
    Circulator:
  </label>
  <div class="col-sm-3">
	  <select
      name  = "circulator"
      class = "form-control"
      value = "<?php echo $circulator; ?>"
      >
	  <?php
	  $sql  = "SELECT nb_id, name, reg_team FROM circulators_v01";
    $sql .= " ORDER BY name";
    include "$php_root/db_config_ftdb.php";
	  $result = mysqli_query($ftdb, $sql);
	  echo "<option value ='$circulator'>$circulator</option>";
	  while($row = mysqli_fetch_array($result)){
		  $string  = "<option value='" . $row['name'] . "'>";
		  $string .= $row['name'] . "," . $row['reg_team'] . "</option>";
		  echo $string . "\n";
	  }
	  mysqli_close($ftdb);
	  ?>
	 </select>
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-2"
    for="sign_cnt"
    >
    Signer Count:
  </label>
  <div class="col-sm-3">
      <input
        type  = "number"
        name  = "sign_cnt"
        class = "form-control"
        value = "<?php echo $sign_cnt; ?>"
        min   = "1"
        max   = "10"
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-2"
    for="phone_cnt"
    >
    Phone Count:
  </label>
  <div class="col-sm-3">
      <input
        type  = "number"
        name  = "phone_cnt"
        class = "form-control"
        value = "<?php echo $phone_cnt; ?>"
        min   = "0"
        max   = "10"
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-2"
    for="email_cnt"
    >
    Email Count:
  </label>
  <div class="col-sm-3">
      <input
        type  = "number"
        name  = "email_cnt"
        class = "form-control"
        value = "<?php echo $email_cnt; ?>"
        min   = "0"
        max   = "10"
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-2"
    for="cur_stage_id"
    >
    Stage:
  </label>
  <div class="col-sm-3">
    <select
      name  = "cur_stage_id"
      class = "form-control"
      value = "<?php echo $cur_stage_id; ?>"
      required
      >
      <?php
      $sql  = "SELECT id, stage_name FROM petition_stages";
      $sql .= " WHERE id IN (2,3,4,5,6,8)";
      $sql .= " ORDER BY sort_num";
      include "$php_root/db_config_ftdb.php";
      $result = mysqli_query($ftdb, $sql);
      echo "<option value ='$cur_stage_id'>$cur_stage</option>";
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
  name  = "latest_out_to_capt_dt"
  value = "<?php echo $latest_out_to_capt_dt; ?>"
  >

<input
  type  = "hidden"
  name  = "latest_out_to_circ_dt"
  value = "<?php echo $latest_out_to_circ_dt; ?>"
  >

<input
  type  = "hidden"
  name  = "earliest_completed_dt"
  value = "<?php echo $earliest_completed_dt; ?>"
  >

<div class="form-group">

  <div class = "col-sm-2">
  </div>

  <div class="col-sm-1">
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
