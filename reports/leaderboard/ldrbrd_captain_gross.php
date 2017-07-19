<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Capt Ldrbrd</title>
  <link rel="icon" type="image/x-icon" href="/vnpftdb/images/favicon.ico" />
</head>

<body>
<?php if($_SESSION['debug'] == 'ON') { echo $_SESSION['call_stack'] . "<br><br>"; } ?>

<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class = "col-md-12">

<div class = "form-horizontal">
  <div class="form-group">
    <div class = "col-sm-2">
      <a
        href  = "/vnpftdb/php_code/stack_return.php"
        class = "btn btn-success pull-right"
        >
        Back
      </a>
    </div>
  </div>
</div>

<br><br>
<h1>Captain Leaderboard Report - Unverified Signatures<br></h1>

<div class = "col-md-6">
  <?php
  $sql  = "SELECT";
  $sql .= "  captain";
  $sql .= ", unverified_signers";
  $sql .= " FROM ldrbrd_rpt_captain";
  $sql .= " order by";
  $sql .= " unverified_signers desc";
  if($result = mysqli_query($ftdb, $sql)){
    if(mysqli_num_rows($result) > 0){
      echo "<table class='table table-bordered table-striped'>";
  		echo "<thead>";
      echo "<tr>";
      echo "<th>Rank</th>";
      echo "<th>Captain</th>";
      echo "<th>Campaign-to-date Unverified Signatures</th>";
      echo "</tr>";
  		echo "</thead>";
  		echo "<tbody>";
      $row_num = 0;
  		while($row = mysqli_fetch_array($result)){
        echo "<tr>";
        $row_num += 1;
        echo "<td>" . $row_num                   . "</td>";
        echo "<td>" . $row['captain']            . "</td>";
        echo "<td>" . $row['unverified_signers'] . "</td>";
        echo "</tr>";
      }
      echo "</tbody>";
      echo "</table>";
      mysqli_free_result($result);
    } else{
      echo "<p class='lead'><em>No records were found.</em></p>";
    }
  } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($ftdb);
  }
  mysqli_close($ftdb);
  ?>
</div>


</div> </div> </div>
</body>
</html>
