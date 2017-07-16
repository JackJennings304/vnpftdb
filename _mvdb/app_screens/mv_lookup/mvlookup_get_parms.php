<?php session_start(); ?>
<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/vnpftdb/php_code/call_stack_functions.php";
include "$root/vnpftdb/php_code/db_config_mvdb.php";

$partition_name         = "";
$last_name_starts_with  = "";

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
  $partition_name         = trim($_POST["partition_name"]);
  $last_name_starts_with  = trim($_POST["last_name_starts_with"]);
  $header_str  = "?";
  $header_str .= "partition="  . $partition_name;
  $header_str .= "&last_name=" . $last_name_starts_with;
  mysqli_close($mvdb);
  header("Location: mvlookup.php" . $header_str);
}
?>

<html>

<head>
  <title>MI Voter Lookup</title>
  <?php include "$root/vnpftdb/php_code/bootstrap_external_refs.php"; ?>
  <link rel="icon" type="image/x-icon" href="/vntftdb/images/favicon.ico" />
</head>

<body>
<?php if($_SESSION['debug'] == 'ON') { echo $_SESSION['call_stack'] . "<br><br>"; } ?>

<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<div class="page-header">
  <h2>MI Voter Lookup, get Parameters</h2>
</div>

<form
  class  = "form-horizontal"
  method = "post"
>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="partition_name"
  >
    County:
  </label>
  <div class="col-sm-3">
	  <select
      required
      type        = "text"
      name        = "partition_name"
      class       = "form-control"
      placeholder = "Enter County Code"
    >
	  <?php
    $sql  = "SELECT";
    $sql .= "  county_name";
    $sql .= ", code";
    $sql .= ", partition_name";
    $sql .= " FROM mi_counties";
    $sql .= " WHERE enable_display = 'Y'";
    $slq .= " ORDER BY county_name";
	  $result = mysqli_query($mvdb, $sql);
	  echo "<option value =''></option>";
	  while ($row = mysqli_fetch_array($result)) {
		  $string  = "<option value='" . $row['partition_name'] . "'>";
		  $string .= $row['county_name'];
      $string .= " (" . $row['code'] . ")";
      $string .= "</option>";
		  echo $string . "\n";
	  }
	  mysqli_close($mvdb);
	  ?>
	 </select>
  </div>
</div>

<div class="form-group">
  <label
    class="control-label col-sm-3"
    for="last_name_starts_with"
  >
    Last Name starts with:
  </label>
  <div class = "col-sm-3">
    <input
      type        = "text"
      class       = "form-control"
      name        = "last_name_starts_with"
      placeholder = "Enter the beginning of the last name"
      required
    >
  </div>
</div>

<div class = "form-group"> </div>

<div class = "form-group">
  <div class = "col-sm-3"> </div>
  <div class = "col-sm-2">
    <button
      type  = "submit"
      class = "btn btn-default"
      >
      Submit
    </button>
  </div>
  <div class="col-sm-2">
    <a
      href  = "/vnpftdb/php_code/stack_return.php"
      class = "btn btn-default"
      >
      Cancel
    </a>
  </div>
</div>

</form>

</div>  </div>  </div>  </div>

</body>
</html>
