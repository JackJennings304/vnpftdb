<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";

$region     = "";
$wk_01_goal = "";
$wk_02_goal = "";
$wk_03_goal = "";
$wk_04_goal = "";
$wk_05_goal = "";
$wk_06_goal = "";
$wk_07_goal = "";
$wk_08_goal = "";
$wk_09_goal = "";
$wk_10_goal = "";
$wk_11_goal = "";
$wk_12_goal = "";
$wk_13_goal = "";
$wk_14_goal = "";
$wk_15_goal = "";
$wk_16_goal = "";
$wk_17_goal = "";
$wk_18_goal = "";
$wk_19_goal = "";
$wk_20_goal = "";
$wk_21_goal = "";
$wk_22_goal = "";
$wk_23_goal = "";
$wk_24_goal = "";
$wk_25_goal = "";
$wk_26_goal = "";

if ( isset($_POST["region"]) && !empty($_POST["region"]) ) {
  $region    	 = trim($_POST["region"]);
  $wk_01_goal	 = trim($_POST["wk_01_goal"]);
  $wk_02_goal	 = trim($_POST["wk_02_goal"]);
  $wk_03_goal	 = trim($_POST["wk_03_goal"]);
  $wk_04_goal	 = trim($_POST["wk_04_goal"]);
  $wk_05_goal	 = trim($_POST["wk_05_goal"]);
  $wk_06_goal	 = trim($_POST["wk_06_goal"]);
  $wk_07_goal	 = trim($_POST["wk_07_goal"]);
  $wk_08_goal	 = trim($_POST["wk_08_goal"]);
  $wk_09_goal	 = trim($_POST["wk_09_goal"]);
  $wk_10_goal	 = trim($_POST["wk_10_goal"]);
  $wk_11_goal	 = trim($_POST["wk_11_goal"]);
  $wk_12_goal	 = trim($_POST["wk_12_goal"]);
  $wk_13_goal	 = trim($_POST["wk_13_goal"]);
  $wk_14_goal	 = trim($_POST["wk_14_goal"]);
  $wk_15_goal	 = trim($_POST["wk_15_goal"]);
  $wk_16_goal	 = trim($_POST["wk_16_goal"]);
  $wk_17_goal	 = trim($_POST["wk_17_goal"]);
  $wk_18_goal	 = trim($_POST["wk_18_goal"]);
  $wk_19_goal	 = trim($_POST["wk_19_goal"]);
  $wk_20_goal	 = trim($_POST["wk_20_goal"]);
  $wk_21_goal	 = trim($_POST["wk_21_goal"]);
  $wk_22_goal	 = trim($_POST["wk_22_goal"]);
  $wk_23_goal	 = trim($_POST["wk_23_goal"]);
  $wk_24_goal	 = trim($_POST["wk_24_goal"]);
  $wk_25_goal	 = trim($_POST["wk_25_goal"]);
  $wk_26_goal	 = trim($_POST["wk_26_goal"]);

  $sql  = "UPDATE progress_weekly_goal SET";
  $sql .= "  WK_01_GOAL = ";	if ($wk_01_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_01_goal"; }
  $sql .= ", WK_02_GOAL = ";	if ($wk_02_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_02_goal"; }
  $sql .= ", WK_03_GOAL = ";	if ($wk_03_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_03_goal"; }
  $sql .= ", WK_04_GOAL = ";	if ($wk_04_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_04_goal"; }
  $sql .= ", WK_05_GOAL = ";	if ($wk_05_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_05_goal"; }
  $sql .= ", WK_06_GOAL = ";	if ($wk_06_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_06_goal"; }
  $sql .= ", WK_07_GOAL = ";	if ($wk_07_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_07_goal"; }
  $sql .= ", WK_08_GOAL = ";	if ($wk_08_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_08_goal"; }
  $sql .= ", WK_09_GOAL = ";	if ($wk_09_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_09_goal"; }
  $sql .= ", WK_10_GOAL = ";	if ($wk_10_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_10_goal"; }
  $sql .= ", WK_11_GOAL = ";	if ($wk_11_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_11_goal"; }
  $sql .= ", WK_12_GOAL = ";	if ($wk_12_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_12_goal"; }
  $sql .= ", WK_13_GOAL = ";	if ($wk_13_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_13_goal"; }
  $sql .= ", WK_14_GOAL = ";	if ($wk_14_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_14_goal"; }
  $sql .= ", WK_15_GOAL = ";	if ($wk_15_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_15_goal"; }
  $sql .= ", WK_16_GOAL = ";	if ($wk_16_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_16_goal"; }
  $sql .= ", WK_17_GOAL = ";	if ($wk_17_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_17_goal"; }
  $sql .= ", WK_18_GOAL = ";	if ($wk_18_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_18_goal"; }
  $sql .= ", WK_19_GOAL = ";	if ($wk_19_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_19_goal"; }
  $sql .= ", WK_20_GOAL = ";	if ($wk_20_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_20_goal"; }
  $sql .= ", WK_21_GOAL = ";	if ($wk_21_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_21_goal"; }
  $sql .= ", WK_22_GOAL = ";	if ($wk_22_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_22_goal"; }
  $sql .= ", WK_23_GOAL = ";	if ($wk_23_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_23_goal"; }
  $sql .= ", WK_24_GOAL = ";	if ($wk_24_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_24_goal"; }
  $sql .= ", WK_25_GOAL = ";	if ($wk_25_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_25_goal"; }
  $sql .= ", WK_26_GOAL = ";	if ($wk_26_goal === "") { $sql .= "NULL"; } else { $sql .= " $wk_26_goal"; }
	$sql .= " WHERE REGION = $region";
	if(mysqli_query($ftdb, $sql)){
	} else{
		echo "ERROR: Could not execute $sql. " . mysqli_error($ftdb);
	}
  mysqli_close($ftdb);
  include "$php_root/stack_return_within_php.php";
  exit();
}
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Update Progress Dt</title>
  <link rel="icon" type="image/x-icon" href="/vnpftdb/images/favicon.ico" />

  <script>
  function validateForm() {
  }
  </script>
</head>

<body>
<?php if($_SESSION['debug'] == 'ON') { echo $_SESSION['call_stack'] . "<br><br>"; } ?>

<?php
$region = $_GET["region"];
$sql  = "SELECT";
$sql .= " REGION";
$sql .= ", WK_01_GOAL, WK_02_GOAL, WK_03_GOAL, WK_04_GOAL, WK_05_GOAL";
$sql .= ", WK_06_GOAL, WK_07_GOAL, WK_08_GOAL, WK_09_GOAL, WK_10_GOAL";
$sql .= ", WK_11_GOAL, WK_12_GOAL, WK_13_GOAL, WK_14_GOAL, WK_15_GOAL";
$sql .= ", WK_16_GOAL, WK_17_GOAL, WK_18_GOAL, WK_19_GOAL, WK_20_GOAL";
$sql .= ", WK_21_GOAL, WK_22_GOAL, WK_23_GOAL, WK_24_GOAL, WK_25_GOAL";
$sql .= ", WK_26_GOAL";
$sql .= " FROM progress_weekly_goal";
$sql .= " WHERE REGION = " . $region;
$result    = mysqli_query($ftdb, $sql);
$row       = mysqli_fetch_array($result);
$region     = $row["REGION"];
$wk_01_goal = $row['WK_01_GOAL'];
$wk_02_goal = $row['WK_02_GOAL'];
$wk_03_goal = $row['WK_03_GOAL'];
$wk_04_goal = $row['WK_04_GOAL'];
$wk_05_goal = $row['WK_05_GOAL'];
$wk_06_goal = $row['WK_06_GOAL'];
$wk_07_goal = $row['WK_07_GOAL'];
$wk_08_goal = $row['WK_08_GOAL'];
$wk_09_goal = $row['WK_09_GOAL'];
$wk_10_goal = $row['WK_10_GOAL'];
$wk_11_goal = $row['WK_11_GOAL'];
$wk_12_goal = $row['WK_12_GOAL'];
$wk_13_goal = $row['WK_13_GOAL'];
$wk_14_goal = $row['WK_14_GOAL'];
$wk_15_goal = $row['WK_15_GOAL'];
$wk_16_goal = $row['WK_16_GOAL'];
$wk_17_goal = $row['WK_17_GOAL'];
$wk_18_goal = $row['WK_18_GOAL'];
$wk_19_goal = $row['WK_19_GOAL'];
$wk_20_goal = $row['WK_20_GOAL'];
$wk_21_goal = $row['WK_21_GOAL'];
$wk_22_goal = $row['WK_22_GOAL'];
$wk_23_goal = $row['WK_23_GOAL'];
$wk_24_goal = $row['WK_24_GOAL'];
$wk_25_goal = $row['WK_25_GOAL'];
$wk_26_goal = $row['WK_26_GOAL'];
mysqli_close($ftdb);
?>

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
    <h1>VNP Field Team Database</h1>
    <h2>Update Progress Weekly Goal: Region =  <?php echo $region; ?></h2>
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
    for="region"
    >
    Region:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "region"
        class = "form-control"
        value = "<?php echo $region; ?>";
        readonly
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_01_goal"
    >
    Week 1 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_01_goal"
        class = "form-control"
        value = "<?php echo $wk_01_goal; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_02_goal"
    >
    Week 2 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_02_goal"
        class = "form-control"
        value = "<?php echo $wk_02_goal; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_03_goal"
    >
    Week 3 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_03_goal"
        class = "form-control"
        value = "<?php echo $wk_03_goal; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_04_goal"
    >
    Week 4 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_04_goal"
        class = "form-control"
        value = "<?php echo $wk_04_goal; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_05_goal"
    >
    Week 5 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_05_goal"
        class = "form-control"
        value = "<?php echo $wk_05_goal; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_06_goal"
    >
    Week 6 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_06_goal"
        class = "form-control"
        value = "<?php echo $wk_06_goal; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_07_goal"
    >
    Week 7 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_07_goal"
        class = "form-control"
        value = "<?php echo $wk_07_goal; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_08_goal"
    >
    Week 8 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_08_goal"
        class = "form-control"
        value = "<?php echo $wk_08_goal; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_09_goal"
    >
    Week 9 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_09_goal"
        class = "form-control"
        value = "<?php echo $wk_09_goal; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_10_goal"
    >
    Week 10 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_10_goal"
        class = "form-control"
        value = "<?php echo $wk_10_goal; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_11_goal"
    >
    Week 11 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_11_goal"
        class = "form-control"
        value = "<?php echo $wk_11_goal; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_12_goal"
    >
    Week 12 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_12_goal"
        class = "form-control"
        value = "<?php echo $wk_12_goal; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_13_goal"
    >
    Week 13 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_13_goal"
        class = "form-control"
        value = "<?php echo $wk_13_goal; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_14_goal"
    >
    Week 14 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_14_goal"
        class = "form-control"
        value = "<?php echo $wk_14_goal; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_15_goal"
    >
    Week 15 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_15_goal"
        class = "form-control"
        value = "<?php echo $wk_15_goal; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_16_goal"
    >
    Week 16 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_16_goal"
        class = "form-control"
        value = "<?php echo $wk_16_goal; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_17_goal"
    >
    Week 17 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_17_goal"
        class = "form-control"
        value = "<?php echo $wk_17_goal; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_18_goal"
    >
    Week 18 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_18_goal"
        class = "form-control"
        value = "<?php echo $wk_18_goal; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_19_goal"
    >
    Week 19 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_19_goal"
        class = "form-control"
        value = "<?php echo $wk_19_goal; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_20_goal"
    >
    Week 20 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_20_goal"
        class = "form-control"
        value = "<?php echo $wk_20_goal; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_21_goal"
    >
    Week 21 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_21_goal"
        class = "form-control"
        value = "<?php echo $wk_21_goal; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_22_goal"
    >
    Week 22 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_22_goal"
        class = "form-control"
        value = "<?php echo $wk_22_goal; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_23_goal"
    >
    Week 23 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_23_goal"
        class = "form-control"
        value = "<?php echo $wk_23_goal; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_24_goal"
    >
    Week 24 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_24_goal"
        class = "form-control"
        value = "<?php echo $wk_24_goal; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_25_goal"
    >
    Week 25 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_25_goal"
        class = "form-control"
        value = "<?php echo $wk_25_goal; ?>";
        >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="wk_26_goal"
    >
    Week 26 Goal:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "wk_26_goal"
        class = "form-control"
        value = "<?php echo $wk_26_goal; ?>";
        >
  </div>
</div>

<div class="form-group">

  <div class = "col-sm-3">    </div>
  <div class="col-sm-2">
    <input
      type  = "submit"
      class = "btn btn-primary"
      value = "Submit"
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
