<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";
?>
<?php
$region       = "";
$name         = "";
$dir_01_name  = "";
$dir_01_city  = "";
$dir_01_nb_id = "";
$dir_02_name  = "";
$dir_02_city  = "";
$dir_02_nb_id = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $region        = trim($_POST["region"]);
	$name          = trim($_POST["name"]);
	$dir_01_name   = trim($_POST["dir_01_name"]);
  $dir_01_city   = trim($_POST["dir_01_city"]);
  $dir_01_nb_id  = trim($_POST["dir_01_nb_id"]);
	$dir_02_name   = trim($_POST["dir_02_name"]);
  $dir_02_city   = trim($_POST["dir_02_city"]);
  $dir_02_nb_id  = trim($_POST["dir_02_nb_id"]);
	$sql  = "INSERT INTO regions (";
  $sql .= "  REGION";
  $sql .= ", NAME";
  $sql .= ", DIR_01_NAME";
  $sql .= ", DIR_01_CITY";
  $sql .= ", DIR_01_NB_ID";
  $sql .= ", DIR_02_NAME";
  $sql .= ", DIR_02_CITY";
  $sql .= ", DIR_02_NB_ID";
  $sql .= ") VALUES (";
	$sql .= "  '$region'";
  if ($name          === "") { $sql .= ", NULL";  } else { $sql .= ", '$name'";          }
	if ($dir_01_name   === "") { $sql .= ", NULL";  } else { $sql .= ", '$dir_01_name'";   }
	if ($dir_01_city   === "") { $sql .= ", NULL";  } else { $sql .= ", '$dir_01_city'";   }
	if ($dir_01_nb_id  === "") { $sql .= ", NULL";  } else { $sql .= ", '$dir_01_nb_id'";  }
	if ($dir_02_name   === "") { $sql .= ", NULL";  } else { $sql .= ", '$dir_02_name'";   }
	if ($dir_02_city   === "") { $sql .= ", NULL";  } else { $sql .= ", '$dir_02_city'";   }
	if ($dir_02_nb_id  === "") { $sql .= ", NULL";  } else { $sql .= ", '$dir_02_nb_id'";  }
	$sql .= ")";
  echo $sql;
	if(mysqli_query($ftdb, $sql)){
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($ftdb);
	}
  mysqli_close($ftdb);
  include "$php_root/stack_return_within_php.php";
  exit();
}
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Create Region</title>
  <link rel="icon" type="image/x-icon" href="/vnpftdb/images/favicon.ico" />

  <script>
  function validateForm() {
      /*var start_petn_num = document.forms["mainForm"]["starting_petition_num"].value;
      var end_petn_num   = document.forms["mainForm"]["ending_petition_num"].value;
      if (end_petn_num < start_petn_num) {
        alert("Ending Petition number must be greater than Starting Petition number");
        return false;
      }
      */
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
    <h1>VNP Field Team Database</h1>
    <h2>Create Region</h2>
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
  <div class="col-sm-1">
      <input
        type  = "number"
        name  = "region"
        class = "form-control"
        value = "<?php echo $region; ?>";
        >
  </div>
</div>

<div class = "form-group">
  <label
    class = "control-label col-sm-3"
    for   = "name"
    >
    Region Name:
  </label>
  <div class = "col-sm-2">
      <input
        type  = "text"
        name  = "name"
        class = "form-control"
        value = "<?php echo $name; ?>";
        >
  </div>
</div>

<div class = "form-group">
  <label
    class = "control-label col-sm-3"
    for   = "dir_01_name"
    >
    Director #1 Name:
  </label>
  <div class="col-sm-2">
      <input
        type  = "text"
        name  = "dir_01_name"
        class = "form-control"
        value = "<?php echo $dir_01_name; ?>";
        >
  </div>
</div>

<div class = "form-group">
  <label
    class = "control-label col-sm-3"
    for   = "dir_01_city"
    >
    Director #1 City:
  </label>
  <div class="col-sm-2">
      <input
        type  = "text"
        name  = "dir_01_city"
        class = "form-control"
        value = "<?php echo $dir_01_city; ?>";
        >
  </div>
</div>

<div class = "form-group">
  <label
    class = "control-label col-sm-3"
    for   = "dir_01_nb_id"
    >
    Dir #1 Nation Builder ID:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "dir_01_nb_id"
        class = "form-control"
        value = "<?php echo $dir_01_nb_id; ?>";
        >
  </div>
</div>


<div class = "form-group">
  <label
    class = "control-label col-sm-3"
    for   = "dir_02_name"
    >
    Director #2 Name:
  </label>
  <div class="col-sm-2">
      <input
        type  = "text"
        name  = "dir_02_name"
        class = "form-control"
        value = "<?php echo $dir_02_name; ?>";
        >
  </div>
</div>

<div class = "form-group">
  <label
    class = "control-label col-sm-3"
    for   = "dir_02_city"
    >
    Director #2 City:
  </label>
  <div class="col-sm-2">
      <input
        type  = "text"
        name  = "dir_02_city"
        class = "form-control"
        value = "<?php echo $dir_02_city; ?>";
        >
  </div>
</div>

<div class = "form-group">
  <label
    class = "control-label col-sm-3"
    for   = "dir_02_nb_id"
    >
    Dir #2 Nation Builder ID:
  </label>
  <div class="col-sm-2">
      <input
        type  = "number"
        name  = "dir_02_nb_id"
        class = "form-control"
        value = "<?php echo $dir_02_nb_id; ?>";
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
