<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";
?>
<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Petitions Load</title>
  <link rel="icon" type="image/x-icon" href="/vnpftdb/images/favicon.ico" />
</head>

<body>
<?php if($_SESSION['debug'] == 'ON') { echo $_SESSION['call_stack'] . "<br><br>"; } ?>
<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<h1>VNP Field Team Database</h1>

<div class="page-header">
	<h2>Petitions_load program</h2>
</div>
<form
  class="form-horizontal"
  method="post"
>

<div class="form-group">
  <label
    class="control-label col-sm-2"
    for="start_petn_num"
  >
    Starting Petition #:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "start_petn_num"
        class = "form-control"
        value = ""
      >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-2"
    for="end_petn_num"
  >
    Ending Petition #:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "end_petn_num"
        class = "form-control"
        value = ""
      >
  </div>
</div>

<input
  type="submit"
  class="btn btn-primary"
  value="Submit"
  >

</form>

</body>


<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
$start_petn_num = trim($_POST["start_petn_num"]);
$end_petn_num   = trim($_POST["end_petn_num"]);

for ($petn_num = $start_petn_num; $petn_num <= $end_petn_num; $petn_num++) {

#$region         = "NULL";
#$reg_team       = "NULL";
#$circ_batch_id  = "NULL";
#$captain_id     = "NULL";
#$circulator     = "NULL";
#$sign_cnt       = "NULL";
#$phone_cnt      = "NULL";
#$email_cnt      = "NULL";
$cur_stage_id   = 0;
$cur_stage_dt   = "DATE(NOW())";


$stmt  = " INSERT INTO petitions";
$stmt .= " (";
$stmt .= "  petn_num";
#$stmt .= " ,region";
#$stmt .= " ,reg_team";
#$stmt .= " ,circ_batch_id";
#$stmt .= " ,captain_id";
#$stmt .= " ,circulator";
#$stmt .= " ,sign_cnt";
#$stmt .= " ,phone_cnt";
#$stmt .= " ,email_cnt";
$stmt .= " ,cur_stage_id";
$stmt .= " ,cur_stage_dt";
$stmt .= ")";
$stmt .= " VALUES";
$stmt .= " (";
$stmt .= "  $petn_num";
#$stmt .= " ,$region";
#$stmt .= " ,$reg_team";
#$stmt .= " ,$circ_batch_id";
#$stmt .= " ,$captain_id";
#$stmt .= " ,$circulator";
#$stmt .= " ,$sign_cnt";
#$stmt .= " ,$phone_cnt";
#$stmt .= " ,$email_cnt";
$stmt .= " ,$cur_stage_id";
$stmt .= " ,$cur_stage_dt";
$stmt .= ")";
#echo "running $stmt<br>";
if (mysqli_query($ftdb, $stmt)) {

} else {
  echo "ERROR: Could not execute <br>";
  echo "$stmt<br>";
  echo mysqli_error($ftdb);
}

}

}
?>
</html>
