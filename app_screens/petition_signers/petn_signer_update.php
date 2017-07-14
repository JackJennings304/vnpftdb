<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";

$petn_num  = "";
$line_num  = "";
$name_01   = "";
$phone_01  = "";
$email_01  = "";
$name_02   = "";
$phone_02  = "";
$email_02  = "";
$name_03   = "";
$phone_03  = "";
$email_03  = "";
$name_04   = "";
$phone_04  = "";
$email_04  = "";
$name_05   = "";
$phone_05  = "";
$email_05  = "";
$name_06   = "";
$phone_06  = "";
$email_06  = "";
$name_07   = "";
$phone_07  = "";
$email_07  = "";
$name_08   = "";
$phone_08  = "";
$email_08  = "";
$name_09   = "";
$phone_09  = "";
$email_09  = "";
$name_10   = "";
$phone_10  = "";
$email_10  = "";

if(isset($_POST["petn_num"]) && !empty($_POST["petn_num"])){
  $petn_num  =      $_POST["petn_num"];
  $name_01   = trim($_POST["name_01"]);
  $phone_01  = trim($_POST["phone_01"]);
  $email_01  = trim($_POST["email_01"]);
  $name_02   = trim($_POST["name_02"]);
  $phone_02  = trim($_POST["phone_02"]);
  $email_02  = trim($_POST["email_02"]);
  $name_03   = trim($_POST["name_03"]);
  $phone_03  = trim($_POST["phone_03"]);
  $email_03  = trim($_POST["email_03"]);
  $name_04   = trim($_POST["name_04"]);
  $phone_04  = trim($_POST["phone_04"]);
  $email_04  = trim($_POST["email_04"]);
  $name_05   = trim($_POST["name_05"]);
  $phone_05  = trim($_POST["phone_05"]);
  $email_05  = trim($_POST["email_05"]);
  $name_06   = trim($_POST["name_06"]);
  $phone_06  = trim($_POST["phone_06"]);
  $email_06  = trim($_POST["email_06"]);
  $name_07   = trim($_POST["name_07"]);
  $phone_07  = trim($_POST["phone_07"]);
  $email_07  = trim($_POST["email_07"]);
  $name_08   = trim($_POST["name_08"]);
  $phone_08  = trim($_POST["phone_08"]);
  $email_08  = trim($_POST["email_08"]);
  $name_09   = trim($_POST["name_09"]);
  $phone_09  = trim($_POST["phone_09"]);
  $email_09  = trim($_POST["email_09"]);
  $name_10   = trim($_POST["name_10"]);
  $phone_10  = trim($_POST["phone_10"]);
  $email_10  = trim($_POST["email_10"]);
  if(isset($_POST["copy_cnts_to_petn"]) && !empty($_POST["copy_cnts_to_petn"])) {
    $copy_cnts_to_petn = trim($_POST["copy_cnts_to_petn"]);
  } else {
    $copy_cnts_to_petn = "";
  }
  if ($copy_cnts_to_petn == "1") {
    $sign_cnt   = 0;
    $phone_cnt  = 0;
    $email_cnt  = 0;
    if ( $name_01   != "") { $sign_cnt++;   }
    if ( $name_02   != "") { $sign_cnt++;   }
    if ( $name_03   != "") { $sign_cnt++;   }
    if ( $name_04   != "") { $sign_cnt++;   }
    if ( $name_05   != "") { $sign_cnt++;   }
    if ( $name_06   != "") { $sign_cnt++;   }
    if ( $name_07   != "") { $sign_cnt++;   }
    if ( $name_08   != "") { $sign_cnt++;   }
    if ( $name_09   != "") { $sign_cnt++;   }
    if ( $name_10   != "") { $sign_cnt++;   }
    if ( $sign_cnt  == 0)  { $sign_cnt  = "NULL"; }

    if ( $phone_01  != "") { $phone_cnt++;  }
    if ( $phone_02  != "") { $phone_cnt++;  }
    if ( $phone_03  != "") { $phone_cnt++;  }
    if ( $phone_04  != "") { $phone_cnt++;  }
    if ( $phone_05  != "") { $phone_cnt++;  }
    if ( $phone_06  != "") { $phone_cnt++;  }
    if ( $phone_07  != "") { $phone_cnt++;  }
    if ( $phone_08  != "") { $phone_cnt++;  }
    if ( $phone_91  != "") { $phone_cnt++;  }
    if ( $phone_10  != "") { $phone_cnt++;  }
    if ( $phone_cnt == 0)  { $phone_cnt = "NULL"; }

    if ( $email_01  != "") { $email_cnt++;  }
    if ( $email_02  != "") { $email_cnt++;  }
    if ( $email_03  != "") { $email_cnt++;  }
    if ( $email_04  != "") { $email_cnt++;  }
    if ( $email_05  != "") { $email_cnt++;  }
    if ( $email_06  != "") { $email_cnt++;  }
    if ( $email_07  != "") { $email_cnt++;  }
    if ( $email_08  != "") { $email_cnt++;  }
    if ( $email_09  != "") { $email_cnt++;  }
    if ( $email_10  != "") { $email_cnt++;  }
    if ( $email_cnt == 0)  { $email_cnt = "NULL"; }

    $sql  = "UPDATE petitions SET";
    $sql .= "  sign_cnt  = $sign_cnt";
    $sql .= ", phone_cnt = $phone_cnt";
    $sql .= ", email_cnt = $email_cnt";
    $sql .= " WHERE petn_num = $petn_num";
  	if(mysqli_query($ftdb, $sql)) {
    } else {
  		echo "ERROR: Could not execute $sql. " . mysqli_error($ftdb);
  	}
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

  # Update line 2
  $sql  = "UPDATE petition_signers SET";
	$sql .= "  name      = "; if ($name_02  === "" ) { $sql .= "NULL"; } else { $sql .= "'$name_02'";  }
	$sql .= ", phone_num = ";	if ($phone_02 === "" ) { $sql .= "NULL"; } else { $sql .= "'$phone_02'"; }
  $sql .= ", email     = "; if ($email_02 === "" ) { $sql .= "NULL"; } else { $sql .= "'$email_02'"; }
	$sql .= " WHERE petn_num = $petn_num";
  $sql .= " AND   line_num = 2";
	if(mysqli_query($ftdb, $sql)) {
  } else {
		echo "ERROR: Could not execute $sql. " . mysqli_error($ftdb);
	}
  # Update line 3
  $sql  = "UPDATE petition_signers SET";
	$sql .= "  name      = "; if ($name_03  === "" ) { $sql .= "NULL"; } else { $sql .= "'$name_03'";  }
	$sql .= ", phone_num = ";	if ($phone_03 === "" ) { $sql .= "NULL"; } else { $sql .= "'$phone_03'"; }
  $sql .= ", email     = "; if ($email_03 === "" ) { $sql .= "NULL"; } else { $sql .= "'$email_03'"; }
	$sql .= " WHERE petn_num = $petn_num";
  $sql .= " AND   line_num = 3";
	if(mysqli_query($ftdb, $sql)) {
  } else {
		echo "ERROR: Could not execute $sql. " . mysqli_error($ftdb);
	}
  # Update line 4
  $sql  = "UPDATE petition_signers SET";
	$sql .= "  name      = "; if ($name_04  === "" ) { $sql .= "NULL"; } else { $sql .= "'$name_04'";  }
	$sql .= ", phone_num = ";	if ($phone_04 === "" ) { $sql .= "NULL"; } else { $sql .= "'$phone_04'"; }
  $sql .= ", email     = "; if ($email_04 === "" ) { $sql .= "NULL"; } else { $sql .= "'$email_04'"; }
	$sql .= " WHERE petn_num = $petn_num";
  $sql .= " AND   line_num = 4";
	if(mysqli_query($ftdb, $sql)) {
  } else {
		echo "ERROR: Could not execute $sql. " . mysqli_error($ftdb);
	}
  # Update line 5
  $sql  = "UPDATE petition_signers SET";
	$sql .= "  name      = "; if ($name_05  === "" ) { $sql .= "NULL"; } else { $sql .= "'$name_05'";  }
	$sql .= ", phone_num = ";	if ($phone_05 === "" ) { $sql .= "NULL"; } else { $sql .= "'$phone_05'"; }
  $sql .= ", email     = "; if ($email_05 === "" ) { $sql .= "NULL"; } else { $sql .= "'$email_05'"; }
	$sql .= " WHERE petn_num = $petn_num";
  $sql .= " AND   line_num = 5";
	if(mysqli_query($ftdb, $sql)) {
  } else {
		echo "ERROR: Could not execute $sql. " . mysqli_error($ftdb);
	}
  # Update line 6
  $sql  = "UPDATE petition_signers SET";
	$sql .= "  name      = "; if ($name_06  === "" ) { $sql .= "NULL"; } else { $sql .= "'$name_06'";  }
	$sql .= ", phone_num = ";	if ($phone_06 === "" ) { $sql .= "NULL"; } else { $sql .= "'$phone_06'"; }
  $sql .= ", email     = "; if ($email_06 === "" ) { $sql .= "NULL"; } else { $sql .= "'$email_06'"; }
	$sql .= " WHERE petn_num = $petn_num";
  $sql .= " AND   line_num = 6";
	if(mysqli_query($ftdb, $sql)) {
  } else {
		echo "ERROR: Could not execute $sql. " . mysqli_error($ftdb);
	}
  # Update line 7
  $sql  = "UPDATE petition_signers SET";
	$sql .= "  name      = "; if ($name_07  === "" ) { $sql .= "NULL"; } else { $sql .= "'$name_07'";  }
	$sql .= ", phone_num = ";	if ($phone_07 === "" ) { $sql .= "NULL"; } else { $sql .= "'$phone_07'"; }
  $sql .= ", email     = "; if ($email_07 === "" ) { $sql .= "NULL"; } else { $sql .= "'$email_07'"; }
	$sql .= " WHERE petn_num = $petn_num";
  $sql .= " AND   line_num = 7";
	if(mysqli_query($ftdb, $sql)) {
  } else {
		echo "ERROR: Could not execute $sql. " . mysqli_error($ftdb);
	}
  # Update line 8
  $sql  = "UPDATE petition_signers SET";
	$sql .= "  name      = "; if ($name_08  === "" ) { $sql .= "NULL"; } else { $sql .= "'$name_08'";  }
	$sql .= ", phone_num = ";	if ($phone_08 === "" ) { $sql .= "NULL"; } else { $sql .= "'$phone_08'"; }
  $sql .= ", email     = "; if ($email_08 === "" ) { $sql .= "NULL"; } else { $sql .= "'$email_08'"; }
	$sql .= " WHERE petn_num = $petn_num";
  $sql .= " AND   line_num = 8";
	if(mysqli_query($ftdb, $sql)) {
  } else {
		echo "ERROR: Could not execute $sql. " . mysqli_error($ftdb);
	}
  # Update line 9
  $sql  = "UPDATE petition_signers SET";
	$sql .= "  name      = "; if ($name_09  === "" ) { $sql .= "NULL"; } else { $sql .= "'$name_09'";  }
	$sql .= ", phone_num = ";	if ($phone_09 === "" ) { $sql .= "NULL"; } else { $sql .= "'$phone_09'"; }
  $sql .= ", email     = "; if ($email_09 === "" ) { $sql .= "NULL"; } else { $sql .= "'$email_09'"; }
	$sql .= " WHERE petn_num = $petn_num";
  $sql .= " AND   line_num = 9";
	if(mysqli_query($ftdb, $sql)) {
  } else {
		echo "ERROR: Could not execute $sql. " . mysqli_error($ftdb);
	}
  # Update line 10
  $sql  = "UPDATE petition_signers SET";
	$sql .= "  name      = "; if ($name_10  === "" ) { $sql .= "NULL"; } else { $sql .= "'$name_10'";  }
	$sql .= ", phone_num = ";	if ($phone_10 === "" ) { $sql .= "NULL"; } else { $sql .= "'$phone_10'"; }
  $sql .= ", email     = "; if ($email_10 === "" ) { $sql .= "NULL"; } else { $sql .= "'$email_10'"; }
	$sql .= " WHERE petn_num = $petn_num";
  $sql .= " AND   line_num = 10";
	if(mysqli_query($ftdb, $sql)) {
  } else {
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
  <title>Create Petition Batch</title>
  <link rel="icon" type="image/x-icon" href="/vnpftdb/images/favicon.ico" />
</head>

<body>
<?php if($_SESSION['debug'] == 'ON') { echo $_SESSION['call_stack'] . "<br><br>"; } ?>

<?php
include "$php_root/db_config_ftdb.php";
$petn_num = $_GET["petn_num"];
$sql  = "SELECT";
$sql .= " line_num";
$sql .= ", name";
$sql .= ", phone_num";
$sql .= ", email";
$sql .= " FROM petition_signers";
$sql .= " WHERE petn_num = '$petn_num'";
if ( $result = mysqli_query($ftdb, $sql) )   {
  while($row = mysqli_fetch_array($result) ) {
    if        ( $row['line_num'] == 1  ) {
      $name_01   = $row['name'];
      $phone_01  = $row['phone_num'];
      $email_01  = $row['email'];
    } else if ( $row['line_num'] == 2  ) {
      $name_02   = $row['name'];
      $phone_02  = $row['phone_num'];
      $email_02  = $row['email'];
    } else if ( $row['line_num'] == 3  ) {
      $name_03   = $row['name'];
      $phone_03  = $row['phone_num'];
      $email_03  = $row['email'];
    } else if ( $row['line_num'] == 4  ) {
      $name_04   = $row['name'];
      $phone_04  = $row['phone_num'];
      $email_04  = $row['email'];
    } else if ( $row['line_num'] == 5  ) {
      $name_05   = $row['name'];
      $phone_05  = $row['phone_num'];
      $email_05  = $row['email'];
    } else if ( $row['line_num'] == 6  ) {
      $name_06   = $row['name'];
      $phone_06  = $row['phone_num'];
      $email_06  = $row['email'];
    } else if ( $row['line_num'] == 7  ) {
      $name_07   = $row['name'];
      $phone_07  = $row['phone_num'];
      $email_07  = $row['email'];
    } else if ( $row['line_num'] == 8  ) {
      $name_08   = $row['name'];
      $phone_08  = $row['phone_num'];
      $email_08  = $row['email'];
    } else if ( $row['line_num'] == 9  ) {
      $name_09   = $row['name'];
      $phone_09  = $row['phone_num'];
      $email_09  = $row['email'];
    } else if ( $row['line_num'] == 10 ) {
      $name_10   = $row['name'];
      $phone_10  = $row['phone_num'];
      $email_10  = $row['email'];
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
    <div class = "col-sm-1">
      <a
        href  = "<?php echo $_SESSION['Cur_top_menu']; ?>"
        class = "btn btn-success"
      >
      Main Menu
      </a>
    </div>
    <div class = "col-sm-4"> </div>
    <label
      class   = "control-label col-sm-2"
      for     = "copy_cnts_to_petn"
      >
      Copy Counts to Petitions Record
    </label>
    <div class = "col-sm-1">
      <input
        type    = "checkbox"
        name    = "copy_cnts_to_petn"
        class   = "form-control"
        value   = "1"
        >
    </div>
  </div>
  <br><br>
  <div class = "form-group">
    <h2>Update Signers, Phones, Emails, Petition # <?php echo $petn_num; ?></h2>
  </div>

<div class="form-group">
  <label
    class = "col-sm-1"
    >
    Line
  </label>
  <label
    class = "col-sm-2"
    >
    Name (if available)
  </label>
  <label
    class = "col-sm-2"
    >
    Phone Num
  </label>
  <label
    class = "col-sm-3"
    >
    Email
  </label>
</div>

<!-- Line 1  -->
<div class="form-group">
  <label
    class = "col-sm-1"
    >
    1
  </label>
  <div class="col-sm-2">
    <input
      type  = "text"
      name  = "name_01"
      class = "form-control"
      value = "<?php echo $name_01 ?>"
      >
  </div>
  <div class="col-sm-2">
    <input
      type  = "text"
      name  = "phone_01"
      class = "form-control"
      value = "<?php echo $phone_01 ?>"
      >
  </div>
  <div class="col-sm-3">
    <input
      type  = "text"
      name  = "email_01"
      class = "form-control"
      value = "<?php echo $email_01 ?>"
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
  <div class="col-sm-2">
    <input
      type  = "text"
      name  = "name_02"
      class = "form-control"
      value = "<?php echo $name_02 ?>"
      >
  </div>
  <div class="col-sm-2">
    <input
      type  = "text"
      name  = "phone_02"
      class = "form-control"
      value = "<?php echo $phone_02 ?>"
      >
  </div>
  <div class="col-sm-3">
    <input
      type  = "text"
      name  = "email_02"
      class = "form-control"
      value = "<?php echo $email_02 ?>"
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
  <div class="col-sm-2">
    <input
      type  = "text"
      name  = "name_03"
      class = "form-control"
      value = "<?php echo $name_03 ?>"
      >
  </div>
  <div class="col-sm-2">
    <input
      type  = "text"
      name  = "phone_03"
      class = "form-control"
      value = "<?php echo $phone_03 ?>"
      >
  </div>
  <div class="col-sm-3">
    <input
      type  = "text"
      name  = "email_03"
      class = "form-control"
      value = "<?php echo $email_03 ?>"
      >
  </div>
</div>

<!-- Line 1  -->
<div class="form-group">
  <label
    class = "col-sm-1"
    >
    4
  </label>
  <div class="col-sm-2">
    <input
      type  = "text"
      name  = "name_04"
      class = "form-control"
      value = "<?php echo $name_04 ?>"
      >
  </div>
  <div class="col-sm-2">
    <input
      type  = "text"
      name  = "phone_04"
      class = "form-control"
      value = "<?php echo $phone_04 ?>"
      >
  </div>
  <div class="col-sm-3">
    <input
      type  = "text"
      name  = "email_04"
      class = "form-control"
      value = "<?php echo $email_04 ?>"
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
  <div class="col-sm-2">
    <input
      type  = "text"
      name  = "name_05"
      class = "form-control"
      value = "<?php echo $name_05 ?>"
      >
  </div>
  <div class="col-sm-2">
    <input
      type  = "text"
      name  = "phone_05"
      class = "form-control"
      value = "<?php echo $phone_05 ?>"
      >
  </div>
  <div class="col-sm-3">
    <input
      type  = "text"
      name  = "email_05"
      class = "form-control"
      value = "<?php echo $email_05 ?>"
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
  <div class="col-sm-2">
    <input
      type  = "text"
      name  = "name_06"
      class = "form-control"
      value = "<?php echo $name_06 ?>"
      >
  </div>
  <div class="col-sm-2">
    <input
      type  = "text"
      name  = "phone_06"
      class = "form-control"
      value = "<?php echo $phone_06 ?>"
      >
  </div>
  <div class="col-sm-3">
    <input
      type  = "text"
      name  = "email_06"
      class = "form-control"
      value = "<?php echo $email_06 ?>"
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
  <div class="col-sm-2">
    <input
      type  = "text"
      name  = "name_07"
      class = "form-control"
      value = "<?php echo $name_07 ?>"
      >
  </div>
  <div class="col-sm-2">
    <input
      type  = "text"
      name  = "phone_07"
      class = "form-control"
      value = "<?php echo $phone_07 ?>"
      >
  </div>
  <div class="col-sm-3">
    <input
      type  = "text"
      name  = "email_07"
      class = "form-control"
      value = "<?php echo $email_07 ?>"
      >
  </div>
</div>

<!-- Line 1  -->
<div class="form-group">
  <label
    class = "col-sm-1"
    >
    8
  </label>
  <div class="col-sm-2">
    <input
      type  = "text"
      name  = "name_08"
      class = "form-control"
      value = "<?php echo $name_08 ?>"
      >
  </div>
  <div class="col-sm-2">
    <input
      type  = "text"
      name  = "phone_08"
      class = "form-control"
      value = "<?php echo $phone_08 ?>"
      >
  </div>
  <div class="col-sm-3">
    <input
      type  = "text"
      name  = "email_08"
      class = "form-control"
      value = "<?php echo $email_08 ?>"
      >
  </div>
</div>

<!-- Line 1  -->
<div class="form-group">
  <label
    class = "col-sm-1"
    >
    9
  </label>
  <div class="col-sm-2">
    <input
      type  = "text"
      name  = "name_09"
      class = "form-control"
      value = "<?php echo $name_09 ?>"
      >
  </div>
  <div class="col-sm-2">
    <input
      type  = "text"
      name  = "phone_09"
      class = "form-control"
      value = "<?php echo $phone_09 ?>"
      >
  </div>
  <div class="col-sm-3">
    <input
      type  = "text"
      name  = "email_09"
      class = "form-control"
      value = "<?php echo $email_09 ?>"
      >
  </div>
</div>

<!-- Line 1  -->
<div class="form-group">
  <label
    class = "col-sm-1"
    >
    10
  </label>
  <div class="col-sm-2">
    <input
      type  = "text"
      name  = "name_10"
      class = "form-control"
      value = "<?php echo $name_10 ?>"
      >
  </div>
  <div class="col-sm-2">
    <input
      type  = "text"
      name  = "phone_10"
      class = "form-control"
      value = "<?php echo $phone_10 ?>"
      >
  </div>
  <div class="col-sm-3">
    <input
      type  = "text"
      name  = "email_10"
      class = "form-control"
      value = "<?php echo $email_10 ?>"
      >
  </div>
</div>


<input
  type  = "hidden"
  name  = "petn_num"
  value = <?php echo $petn_num; ?>
  >

<div class = "form-group">
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
