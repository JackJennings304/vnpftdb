<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";

$descr_01       = "";
$last_upd_dt_01 = "";
$descr_02       = "";
$last_upd_dt_02 = "";
$descr_03       = "";
$last_upd_dt_03 = "";
$descr_04       = "";
$last_upd_dt_04 = "";
$descr_05       = "";
$last_upd_dt_05 = "";
$descr_06       = "";
$last_upd_dt_06 = "";
$descr_07       = "";
$last_upd_dt_07 = "";
$descr_08       = "";
$last_upd_dt_08 = "";

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
    } else if ( $row['Step_Num'] == 2  ) {
      $descr_02       = $row['Step_Description'];
      $last_upd_dt_02 = $row['Last_Performed_Date'];
    } else if ( $row['Step_Num'] == 3  ) {
      $descr_03       = $row['Step_Description'];
      $last_upd_dt_03 = $row['Last_Performed_Date'];
    } else if ( $row['Step_Num'] == 4  ) {
      $descr_04       = $row['Step_Description'];
      $last_upd_dt_04 = $row['Last_Performed_Date'];
    } else if ( $row['Step_Num'] == 5  ) {
      $descr_05       = $row['Step_Description'];
      $last_upd_dt_05 = $row['Last_Performed_Date'];
    } else if ( $row['Step_Num'] == 6  ) {
      $descr_06       = $row['Step_Description'];
      $last_upd_dt_06 = $row['Last_Performed_Date'];
    } else if ( $row['Step_Num'] == 7  ) {
      $descr_07       = $row['Step_Description'];
      $last_upd_dt_07 = $row['Last_Performed_Date'];
    } else if ( $row['Step_Num'] == 8  ) {
      $descr_08       = $row['Step_Description'];
      $last_upd_dt_08 = $row['Last_Performed_Date'];
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
    <?php
    # Step 1, Export from Nation Builder
    $anchor  = "<a";
    $anchor .= " href='";
    $anchor .= "/vnpftdb/php_code/stack_call.php?";
    $anchor .= "child=";
    $anchor .= "/vnpftdb/php_programs/export_NB_people.php";
    $anchor .= "'";
    $anchor .= ' class = "btn btn-default"';
    $anchor .= ' style = "background-color: buttonface"';
    $anchor .= ">";
    $anchor .= "Perform Step 1";
    $anchor .= "</a>";
    echo $anchor
    ?>
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
    <?php
    # Step 2, Load into nation_builder_tbl process
    $anchor  = "<a";
    $anchor .= " href='";
    $anchor .= "/vnpftdb/php_code/stack_call.php?";
    $anchor .= "child=";
    $anchor .= "/vnpftdb/php_programs/nation_builder_tbl_load.php";
    $anchor .= "'";
    $anchor .= ' class = "btn btn-default"';
    $anchor .= ' style = "background-color: buttonface"';
    $anchor .= ">";
    $anchor .= "Perform Step 2";
    $anchor .= "</a>";
    echo $anchor
    ?>
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
    <?php
    # Step 3, Rebuild NB_TAGS table process
    $anchor  = "<a";
    $anchor .= " href='";
    $anchor .= "/vnpftdb/php_code/stack_call.php?";
    $anchor .= "child=";
    $anchor .= "/vnpftdb/php_programs/NB_TAGS_Rebuild.php";
    $anchor .= "'";
    $anchor .= ' class = "btn btn-default"';
    $anchor .= ' style = "background-color: buttonface"';
    $anchor .= ">";
    $anchor .= "Perform Step 3";
    $anchor .= "</a>";
    echo $anchor
    ?>
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
    <?php
    # Step 4, Merge NB_TAGS into NB_TAG_MAP
    $anchor  = "<a";
    $anchor .= " href='";
    $anchor .= "/vnpftdb/php_code/stack_call.php?";
    $anchor .= "child=";
    $anchor .= "/vnpftdb/php_programs/Merge_NB_TAGS_into_NB_TAG_MAP.php";
    $anchor .= "'";
    $anchor .= ' class = "btn btn-default"';
    $anchor .= ' style = "background-color: buttonface"';
    $anchor .= ">";
    $anchor .= "Perform Step 4";
    $anchor .= "</a>";
    echo $anchor
    ?>
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
    <?php
    $anchor  = "<a";
    $anchor .= " href='";
    $anchor .= "/vnpftdb/php_code/stack_call.php?";
    $anchor .= "child=";
    $anchor .= "/vnpftdb/php_programs/Review_NB_TAG_MAP.php";
    $anchor .= "'";
    $anchor .= ' class = "btn btn-default"';
    $anchor .= ' style = "background-color: buttonface"';
    $anchor .= ">";
    $anchor .= "Perform Step 5";
    $anchor .= "</a>";
    echo $anchor
    ?>
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
    <?php
    $anchor  = "<a";
    $anchor .= " href='";
    $anchor .= "/vnpftdb/php_code/stack_call.php?";
    $anchor .= "child=";
    $anchor .= "/vnpftdb/php_programs/Merge_Reg_Team_table.php";
    $anchor .= "'";
    $anchor .= ' class = "btn btn-default"';
    $anchor .= ' style = "background-color: buttonface"';
    $anchor .= ">";
    $anchor .= "Perform Step 6";
    $anchor .= "</a>";
    echo $anchor
    ?>
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
    <?php
    $anchor  = "<a";
    $anchor .= " href='";
    $anchor .= "/vnpftdb/php_code/stack_call.php?";
    $anchor .= "child=";
    $anchor .= "/vnpftdb/php_programs/Merge_captain_table.php";
    $anchor .= "'";
    $anchor .= ' class = "btn btn-default"';
    $anchor .= ' style = "background-color: buttonface"';
    $anchor .= ">";
    $anchor .= "Perform Step 7";
    $anchor .= "</a>";
    echo $anchor
    ?>
  </div>
</div>

<!-- Line 8  -->
<div class="form-group">
  <label
    class = "col-sm-1"
    >
    8
  </label>
  <label
    class = "col-sm-3"
    >
    <?php echo $descr_08 ?>
  </label>
  <div class="col-sm-2">
    <input
      type  = "date"
      name  = "last_upd_dt_08"
      class = "form-control"
      value = "<?php echo $last_upd_dt_08 ?>"
      readonly
      >
  </div>
  <div class = "col-sm-2">
    <?php
    $anchor  = "<a";
    $anchor .= " href='";
    $anchor .= "/vnpftdb/php_code/stack_call.php?";
    $anchor .= "child=";
    $anchor .= "/vnpftdb/php_programs/Merge_circulator_table.php";
    $anchor .= "'";
    $anchor .= ' class = "btn btn-default"';
    $anchor .= ' style = "background-color: buttonface"';
    $anchor .= ">";
    $anchor .= "Perform Step 8";
    $anchor .= "</a>";
    echo $anchor
    ?>
  </div>
</div>


<div class = "form-group"> </div>

<div class = "form-group">
  <div class = "col-sm-1"> </div>

  <div = class = "col-sm-2">
    <a
      href="/vnpftdb/php_code/stack_return.php"
      class="btn btn-default"
      >
      Back
    </a>
  </div>
</div>

</form>

</div>  </div>  </div>  </div>

</body>

</html>
