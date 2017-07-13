<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";

$reg_team              = "";
$week                  = "";
$start_date            = "";
$end_date              = "";
$shifts_scheduled      = "";
$shifts_fulfilled      = "";
$recruiting_calls_made = "";
$volunteers_recruited  = "";
$volunteers_trained    = "";
$petitions_on_hand     = "";
$clipboards_on_hand    = "";
$buttons_on_hand       = "";

if(isset($_POST["reg_team"]) && !empty($_POST["reg_team"])){
  $reg_team               = $_SESSION["reg_team_filter"];
  $week                   = trim($_POST["week"]);
  $shifts_scheduled       = trim($_POST["shifts_scheduled"]);
  $shifts_fulfilled       = trim($_POST["shifts_fulfilled"]);
  $recruiting_calls_made  = trim($_POST["recruiting_calls_made"]);
  $volunteers_recruited   = trim($_POST["volunteers_recruited"]);
  $volunteers_trained     = trim($_POST["volunteers_trained"]);
  $petitions_on_hand      = trim($_POST["petitions_on_hand"]);
  $clipboards_on_hand     = trim($_POST["clipboards_on_hand"]);
  $buttons_on_hand        = trim($_POST["buttons_on_hand"]);

  $sql  = "UPDATE captains_weekly_tbl SET";
  $sql .= " SHIFTS_SCHEDULED=";       if ($shifts_scheduled      ==="") { $sql .= "NULL,"; } else { $sql .= " $shifts_scheduled,";       }
  $sql .= " SHIFTS_FULFILLED=";       if ($shifts_fulfilled      ==="") { $sql .= "NULL,"; } else { $sql .= " $shifts_fulfilled,";       }
  $sql .= " RECRUITING_CALLS_MADE=";  if ($recruiting_calls_made ==="") { $sql .= "NULL,"; } else { $sql .= " $recruiting_calls_made,";  }
  $sql .= " VOLUNTEERS_RECRUITED=";   if ($volunteers_recruited  ==="") { $sql .= "NULL,"; } else { $sql .= " $volunteers_recruited,";   }
  $sql .= " VOLUNTEERS_TRAINED=";     if ($volunteers_trained    ==="") { $sql .= "NULL,"; } else { $sql .= " $volunteers_trained,";     }
  $sql .= " INV_ITEM_01=";            if ($petitions_on_hand     ==="") { $sql .= "NULL,"; } else { $sql .= " $petitions_on_hand,";      }
  $sql .= " INV_ITEM_02=";            if ($clipboards_on_hand    ==="") { $sql .= "NULL,"; } else { $sql .= " $clipboards_on_hand,";     }
  $sql .= " INV_ITEM_03=";            if ($buttons_on_hand       ==="") { $sql .= "NULL";  } else { $sql .= " $buttons_on_hand";         }
  $sql .= " WHERE ";
  $sql .= " REG_TEAM='" . $reg_team . "'";
  $sql .= " AND WEEK=" . $week;
  if(mysqli_query($ftdb, $sql)){
    include "$php_root/stack_return_within_php.php";
    exit();
  } else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($db);
  }
  mysqli_close($db);
}
?>

<html>
<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Update Capt Wkly Rpt</title>
  <link rel="icon" type="image/x-icon" href="/vnpftdb/images/favicon.ico" />
</head>

<body>
<?php if($_SESSION['debug'] == 'ON') { echo $_SESSION['call_stack'] . "<br><br>"; } ?>

<?php
include "$php_root/db_config_ftdb.php";
$reg_team   = $_GET["reg_team"];
$week       = $_GET["week"];
$sql  = "SELECT REG_TEAM, WEEK, START_DATE, END_DATE,";
$sql .= " SHIFTS_SCHEDULED, SHIFTS_FULFILLED, RECRUITING_CALLS_MADE,";
$sql .= " VOLUNTEERS_RECRUITED, VOLUNTEERS_TRAINED,";
$sql .= " PETITIONS_ON_HAND, CLIPBOARDS_ON_HAND, BUTTONS_ON_HAND";
$sql .= " FROM captains_weekly_rpt";
$sql .= ' WHERE REG_TEAM = "' . $reg_team . '"';
$sql .= " AND WEEK = "        . $week;
$result    = mysqli_query($ftdb, $sql);
$row       = mysqli_fetch_array($result);
$reg_team              = $row["REG_TEAM"];
$week                  = $row["WEEK"];
$start_date            = $row["START_DATE"];
$end_date              = $row["END_DATE"];
$shifts_scheduled      = $row["SHIFTS_SCHEDULED"];
$shifts_fulfilled      = $row["SHIFTS_FULFILLED"];
$recruiting_calls_made = $row["RECRUITING_CALLS_MADE"];
$volunteers_recruited  = $row["VOLUNTEERS_RECRUITED"];
$volunteers_trained    = $row["VOLUNTEERS_TRAINED"];
$petitions_on_hand     = $row["PETITIONS_ON_HAND"];
$clipboards_on_hand    = $row["CLIPBOARDS_ON_HAND"];
$buttons_on_hand       = $row["BUTTONS_ON_HAND"];
mysqli_close($ftdb);
?>

<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-8">

<div class="page-header">
  <h2>Update Captains Weekly Report Record</h2>
  <h3>For week <?php echo $week . ", from " . $start_date . " to " . $end_date; ?>
  </h3>
</div>

<form
  class = "form-horizontal"
  method = "post"
  >

<div class="form-group">
  <label
    class = "control-label col-sm-2"
    for   = "reg_team"
    >
    Region-Team (pre-set)
  </label>
  <div class = "col-sm-2">
    <input
      type  = "text"
      name  = "reg_team"
      class = "form-control"
      value = "<?php echo $reg_team; ?>"
      readonly
      >
    </div>
</div>

<div class="form-group">
  <label
    class = "control-label col-sm-2"
    for   = "week"
    >
    Week (pre-set)
  </label>
  <div class = "col-sm-2">
    <input
      type  = "text"
      name  = "week"
      class = "form-control"
      value = "<?php echo $week; ?>"
      readonly
      >
    </div>
</div>

<div class="form-group">
  <label
    class = "control-label col-sm-2"
    for   = "shifts_scheduled"
    >
    Shifts Scheduled
  </label>
  <div class = "col-sm-2">
    <input
      type  = "number"
      name  = "shifts_scheduled"
      class = "form-control"
      value = "<?php echo $shifts_scheduled; ?>"
      >
    </div>
</div>

<div class="form-group">
  <label
    class = "control-label col-sm-2"
    for   = "shifts_fulfilled"
    >
    Shifts Fulfilled
  </label>
  <div class = "col-sm-2">
    <input
      type  = "number"
      name  = "shifts_fulfilled"
      class = "form-control"
      value = "<?php echo $shifts_fulfilled; ?>"
      >
    </div>
</div>

<div class="form-group">
  <label
    class = "control-label col-sm-2"
    for   = "recruiting_calls_made"
    >
    Recruiting Calls Made
  </label>
  <div class = "col-sm-2">
    <input
      type  = "number"
      name  = "recruiting_calls_made"
      class = "form-control"
      value = "<?php echo $recruiting_calls_made; ?>"
      >
    </div>
</div>

<div class="form-group">
  <label
    class = "control-label col-sm-2"
    for   = "volunteers_recruited"
    >
    Volunteers Recruited
  </label>
  <div class = "col-sm-2">
    <input
      type  = "number"
      name  = "volunteers_recruited"
      class = "form-control"
      value = "<?php echo $volunteers_recruited; ?>"
      >
    </div>
</div>

<div class="form-group">
  <label
    class = "control-label col-sm-2"
    for   = "volunteers_trained"
    >
    Volunteers Trained
  </label>
  <div class = "col-sm-2">
    <input
      type  = "number"
      name  = "volunteers_trained"
      class = "form-control"
      value = "<?php echo $volunteers_trained; ?>"
      >
    </div>
</div>

<div class="form-group">
  <label
    class = "control-label col-sm-2"
    for   = "petitions_on_hand"
    >
    Petitions on hand
  </label>
  <div class = "col-sm-2">
    <input
      type  = "number"
      name  = "petitions_on_hand"
      class = "form-control"
      value = "<?php echo $petitions_on_hand; ?>"
      >
    </div>
</div>

<div class="form-group">
  <label
    class = "control-label col-sm-2"
    for   = "clipboards_on_hand"
    >
    Clipboards on hand
  </label>
  <div class = "col-sm-2">
    <input
      type  = "number"
      name  = "clipboards_on_hand"
      class = "form-control"
      value = "<?php echo $clipboards_on_hand; ?>"
      >
    </div>
</div>

<div class="form-group">
  <label
    class = "control-label col-sm-2"
    for   = "buttons_on_hand"
    >
    Buttons on hand
  </label>
  <div class = "col-sm-2">
    <input
      type  = "number"
      name  = "buttons_on_hand"
      class = "form-control"
      value = "<?php echo $buttons_on_hand; ?>"
      >
    </div>
</div>

<div class = "Form-group">
  <div class = "col-sm-2">
  </div>
  <div class = "col-sm-2">
    <input
      type  = "submit"
      class = "btn btn-primary"
      value = "Submit"
      >
  </div>

  <div class = "col-sm-2">
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
