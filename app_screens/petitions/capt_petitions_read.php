<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";
$petn_num = $_GET['petn_num'];
?>
<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Petitions Detail View</title>
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
    <h1>View Petition Record</h1>
  </div>
</div>

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
$sql .= " WHERE petn_num = " . $petn_num;
if ($result = mysqli_query($ftdb, $sql)) {
} else {
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($ftdb);
}
$row = mysqli_fetch_array($result);
mysqli_close($ftdb);
?>


<form
  class="form-horizontal"
  method="post"
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
        value = <?php echo $row['petn_num']; ?>
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
        value = <?php echo $row['petn_batch_id']; ?>
        readonly
        disabled
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
  <div class="col-sm-2">
      <input
        type  = "text"
        name  = "captain"
        class = "form-control"
        value = "<?php echo $row['captain']; ?>"
        readonly
      >
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-2"
    for="circulator"
  >
    Circulator:
  </label>
  <div class="col-sm-2">
      <input
        type  = "text"
        name  = "circulator"
        class = "form-control"
        value = "<?php echo $row['circulator']; ?>"
        readonly
      >
  </div>
</div>

<div class="form-group">
<label
  class="control-label col-sm-2"
  for="sign_cnt"
>
  Signer Count:
</label>
<div class="col-sm-2">
    <input
      type  = "number"
      name  = "sign_cnt"
      class = "form-control"
      value = <?php echo $row['sign_cnt']; ?>
      readonly
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
<div class="col-sm-2">
    <input
      type  = "number"
      name  = "phone_cnt"
      class = "form-control"
      value = <?php echo $row['phone_cnt']; ?>
      readonly
    >
</div>
  <label
    class="control-label col-sm-2"
    for="latest_out_to_circ_dt"
  >
    Latest out to Circulator Date:
  </label>
  <div class="col-sm-2">
      <input
        type  = "date"
        name  = "latest_out_to_circ_dt"
        class = "form-control"
        value = "<?php echo $row['latest_out_to_circ_dt']; ?>"
        readonly
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
<div class="col-sm-2">
    <input
      type  = "number"
      name  = "email_cnt"
      class = "form-control"
      value = <?php echo $row['email_cnt']; ?>
      readonly
    >
</div>

  <label
    class="control-label col-sm-2"
    for="earliest_completed_dt"
  >
    Completed Date:
  </label>
  <div class="col-sm-2">
      <input
        type  = "date"
        name  = "earliest_completed_dt"
        class = "form-control"
        value = "<?php echo $row['earliest_completed_dt']; ?>"
        readonly
      >
  </div>

</div>

<div class="form-group">
  <label
    class="control-label col-sm-2"
    for="cur_stage"
  >
    Current stage:
  </label>
  <div class="col-sm-2">
      <input
        type  = "text"
        name  = "cur_stage"
        class = "form-control"
        value = "<?php echo $row['cur_stage']; ?>"
        readonly
      >
  </div>

  <label
    class="control-label col-sm-2"
    for="cur_stage_dt"
  >
    Current stage Date:
  </label>
  <div class="col-sm-2">
      <input
        type  = "date"
        name  = "cur_stage_dt"
        class = "form-control"
        value = "<?php echo $row['cur_stage_dt']; ?>"
        readonly
      >
  </div>
</div>

</form>
</div>  </div>  </div>  </div>

</body>
</html>
