<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";
# Step_Num, Step_Desription, Last_Performed_Date
# 1, Export all records from NB, 2017-07-06
# 2, Load into “nation_builder_tbl” in the database, 2017-07-06
# 3, Rebuild NB_TAGS table.   Normalizes tags, 2017-07-06
# 4, Merge NB_TAGS into NB_TAG_MAP.  Maps tags to structured fields, 2017-07-06
# 5, Merge Reg_Team Table., 2017-07-06
# 6, Merge Captains Table., 2017-07-06
# 7, Merge Circulators Table., 2017-07-06

$descr_01       = "";
$last_upd_dt_01 = "";
$done_01        = "";
$descr_02       = "";
$last_upd_dt_02 = "";
$done_02        = "";
$descr_03       = "";
$last_upd_dt_03 = "";
$done_03        = "";
$descr_04       = "";
$last_upd_dt_04 = "";
$done_04        = "";
$descr_05       = "";
$last_upd_dt_05 = "";
$done_05        = "";
$descr_06       = "";
$last_upd_dt_06 = "";
$done_06        = "";
$descr_07       = "";
$last_upd_dt_07 = "";
$done_07        = "";

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
  $last_upd_dt_01 = "";
  $done_01        = "";
  $last_upd_dt_02 = "";
  $done_02        = "";
  $last_upd_dt_03 = "";
  $done_03        = "";
  $last_upd_dt_04 = "";
  $done_04        = "";
  $last_upd_dt_05 = "";
  $done_05        = "";
  $last_upd_dt_06 = "";
  $done_06        = "";
  $last_upd_dt_07 = "";
  $done_07        = "";

/*
    $sql  = "UPDATE petitions SET";
    $sql .= "  sign_cnt  = $sign_cnt";
    $sql .= ", phone_cnt = $phone_cnt";
    $sql .= ", email_cnt = $email_cnt";
    $sql .= " WHERE petn_num = $petn_num";
  	if(mysqli_query($ftdb, $sql)) {
    } else {
  		echo "ERROR: Could not execute $sql. " . mysqli_error($ftdb);
  	}

  # Update line 1
  $sql  = "UPDATE petition_signers SET";
	$sql .= "  name      = "; if ($name_01  === "" ) { $sql .= "NULL"; } else { $sql .= "'$name_01'";  }
	$sql .= ", phone_num = ";	if ($phone_01 === "" ) { $sql .= "NULL"; } else { $sql .= "'$phone_01'"; }
  $sql .= ", email     = "; if ($email_01 === "" ) { $sql .= "NULL"; } else { $sql .= "'$email_01'"; }
	$sql .= " WHERE petn_num = $petn_num";
  $sql .= " AND   line_num = 1";
	if(mysqli_query($ftdb, $sql)) {
  } else {
		echo "ERROR: Could not execute $sql. " . mysqli_error($ftdb);
	}
  mysqli_close($ftdb);
  include "$php_root/stack_return_within_php.php";
  exit();
*/
}
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Synch NB to vnpftdb</title>
  <link rel="icon" type="image/x-icon" href="/vnpftdb/images/favicon.ico" />
</head>

<body>
<?php if($_SESSION['debug'] == 'ON') { echo $_SESSION['call_stack'] . "<br><br>"; } ?>

<?php
include "$php_root/db_config_ftdb.php";
$sql  = "SELECT";
$sql .= " Step_Num";
$sql .= ", Step_Description";
$sql .= ", Last_Performed_Date";
$sql .= " FROM glb_nb_to_vnpftdb_synch_steps";
if ( $result = mysqli_query($ftdb, $sql) )   {
  while($row = mysqli_fetch_array($result) ) {
    if        ( $row['Step_Num'] == 1  ) {
      $descr_01       = $row['Step_Description'];
      $last_upd_dt_01 = $row['Last_Performed_Date'];
      $done_01        = "";
    } else if ( $row['Step_Num'] == 2  ) {
      $descr_02       = $row['Step_Description'];
      $last_upd_dt_02 = $row['Last_Performed_Date'];
      $done_02        = "";
    } else if ( $row['Step_Num'] == 3  ) {
      $descr_03       = $row['Step_Description'];
      $last_upd_dt_03 = $row['Last_Performed_Date'];
      $done_03        = "";
    } else if ( $row['Step_Num'] == 4  ) {
      $descr_04       = $row['Step_Description'];
      $last_upd_dt_04 = $row['Last_Performed_Date'];
      $done_04        = "";
    } else if ( $row['Step_Num'] == 5  ) {
      $descr_05       = $row['Step_Description'];
      $last_upd_dt_05 = $row['Last_Performed_Date'];
      $done_05        = "";
    } else if ( $row['Step_Num'] == 6  ) {
      $descr_06       = $row['Step_Description'];
      $last_upd_dt_06 = $row['Last_Performed_Date'];
      $done_06        = "";
    } else if ( $row['Step_Num'] == 7  ) {
      $descr_07       = $row['Step_Description'];
      $last_upd_dt_07 = $row['Last_Performed_Date'];
      $done_07        = "";
    }
  }
} else {
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($ftdb);
}
mysqli_close($ftdb);
?>

<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<form
  class  = "form-horizontal"
  method = "post"
  >

  <div class = "form-group">
    <div class="col-sm-2">
      <a
        href  = "/vnpftdb/php_code/stack_return.php"
        class = "btn btn-default"
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
  <br><br>
  <div class = "form-group">
    <h2>Synchronize Nation Builder to vnpftdb process</h2>
  </div>

<div class="form-group">
  <label
    class = "col-sm-1"
    >
    Step
  </label>
  <label
    class = "col-sm-3"
    >
    Description
  </label>
  <label
    class = "col-sm-2"
    >
    Last Updated Date
  </label>
  <label
    class = "col-sm-2"
    >
    Perform
  </label>
  <label
    class = "col-sm-1"
    >
    Completed
  </label>
</div>

<!-- Line 1  -->
<div class="form-group">
  <label
    class = "col-sm-1"
    >
    1
  </label>
  <label
    class = "col-sm-3"
    >
    <?php echo $descr_01 ?>
  </label>
  <div class="col-sm-2">
    <input
      type  = "date"
      name  = "last_upd_dt_01"
      class = "form-control"
      value = "<?php echo $last_upd_dt_01 ?>"
      readonly
      >
  </div>
  <div class = "col-sm-2">
    <label>
      Manual
    </label>
  </div>
  <div class = "col-sm-1">
    <input
      type  = "checkbox"
      name  = "done_01"
      class = "form-control"
      value = "<?php echo $done_01 ?>"
      >
  </div>
</div>

<!-- Line 2  -->
<div class="form-group">
  <label
    class = "col-sm-1"
    >
    2
  </label>
  <label
    class = "col-sm-3"
    >
    <?php echo $descr_02 ?>
  </label>
  <div class="col-sm-2">
    <input
      type  = "date"
      name  = "last_upd_dt_02"
      class = "form-control"
      value = "<?php echo $last_upd_dt_02 ?>"
      readonly
      >
  </div>
  <div class = "col-sm-2">
    <label>
      Manual
    </label>
  </div>
  <div class="col-sm-1">
    <input
      type  = "checkbox"
      name  = "done_02"
      class = "form-control"
      value = "<?php echo $done_02 ?>"
      >
  </div>
</div>

<!-- Line 3  -->
<div class="form-group">
  <label
    class = "col-sm-1"
    >
    3
  </label>
  <label
    class = "col-sm-3"
    >
    <?php echo $descr_03 ?>
  </label>
  <div class="col-sm-2">
    <input
      type  = "date"
      name  = "last_upd_dt_03"
      class = "form-control"
      value = "<?php echo $last_upd_dt_03 ?>"
      readonly
      >
  </div>
  <div class = "col-sm-2">
    <label>
      Manual
    </label>
  </div>
  <div class="col-sm-1">
    <input
      type  = "checkbox"
      name  = "done_02"
      class = "form-control"
      value = "<?php echo $done_03 ?>"
      >
  </div>
</div>

<!-- Line 4  -->
<div class="form-group">
  <label
    class = "col-sm-1"
    >
    4
  </label>
  <label
    class = "col-sm-3"
    >
    <?php echo $descr_04 ?>
  </label>
  <div class="col-sm-2">
    <input
      type  = "date"
      name  = "last_upd_dt_04"
      class = "form-control"
      value = "<?php echo $last_upd_dt_04 ?>"
      readonly
      >
  </div>
  <div class = "col-sm-2">
    <label>
      Manual
    </label>
  </div>
  <div class="col-sm-1">
    <input
      type  = "checkbox"
      name  = "done_04"
      class = "form-control"
      value = "<?php echo $done_04 ?>"
      >
  </div>
</div>

<!-- Line 5  -->
<div class="form-group">
  <label
    class = "col-sm-1"
    >
    5
  </label>
  <label
    class = "col-sm-3"
    >
    <?php echo $descr_05 ?>
  </label>
  <div class="col-sm-2">
    <input
      type  = "date"
      name  = "last_upd_dt_05"
      class = "form-control"
      value = "<?php echo $last_upd_dt_05 ?>"
      readonly
      >
  </div>
  <div class = "col-sm-2">
    <label>
      Manual
    </label>
  </div>
  <div class="col-sm-1">
    <input
      type  = "checkbox"
      name  = "done_05"
      class = "form-control"
      value = "<?php echo $done_05 ?>"
      >
  </div>
</div>

<!-- Line 6  -->
<div class="form-group">
  <label
    class = "col-sm-1"
    >
    6
  </label>
  <label
    class = "col-sm-3"
    >
    <?php echo $descr_06 ?>
  </label>
  <div class="col-sm-2">
    <input
      type  = "date"
      name  = "last_upd_dt_06"
      class = "form-control"
      value = "<?php echo $last_upd_dt_06 ?>"
      readonly
      >
  </div>
  <div class = "col-sm-2">
    <label>
      Manual
    </label>
  </div>
  <div class="col-sm-1">
    <input
      type  = "checkbox"
      name  = "done_06"
      class = "form-control"
      value = "<?php echo $done_06 ?>"
      >
  </div>
</div>

<!-- Line 7  -->
<div class="form-group">
  <label
    class = "col-sm-1"
    >
    7
  </label>
  <label
    class = "col-sm-3"
    >
    <?php echo $descr_07 ?>
  </label>
  <div class="col-sm-2">
    <input
      type  = "date"
      name  = "last_upd_dt_07"
      class = "form-control"
      value = "<?php echo $last_upd_dt_07 ?>"
      readonly
      >
  </div>
  <div class = "col-sm-2">
    <label>
      Manual
    </label>
  </div>
  <div class="col-sm-1">
    <input
      type  = "checkbox"
      name  = "done_07"
      class = "form-control"
      value = "<?php echo $done_07 ?>"
      >
  </div>
</div>

<input
  type  = "hidden"
  name  = "step_completed"
  value = ""
  >

<div class = "form-group"> </div>

<div class = "form-group">
  <div class = "col-sm-1"> </div>
  <div class = "col-sm-2">
    <input
      type  = "submit"
      class = "btn btn-primary"
      value = "Submit"
      >
  </div>

  <div = class = "col-sm-2">
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
