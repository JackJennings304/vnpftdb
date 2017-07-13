<?php session_start(); ?>
<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/vnpftdb/php_code/call_stack_functions.php";
include "$root/vnpftdb/php_code/db_config_mvdb.php";
$partition = $_GET["partition"];
$last_name = $_GET["last_name"];
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>MI VotersRegions</title>
    <?php include "$root/vnpftdb/php_code/bootstrap_external_refs.php"; ?>
    <link rel="icon" type="image/x-icon" href="/vnpftdb/images/favicon.ico" />
</head>

<body>
<?php if($_SESSION['debug'] == 'ON') { echo $_SESSION['call_stack'] . "<br><br>"; } ?>

<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<div class="page-header clearfix">
  <a
    href="../../menus/mvmain_menu.php"
    class="btn btn-success pull-right"
  >
  Back
  </a>
  <a
    href="mvlookup_get_parms.php"
    class="btn btn-success"
  >
  Another Search
  </a>
	<br><br><br>
  <h2 class="pull-left">MI Voters</h2><br><br><br><br>
  <p>County = <?php echo $partition; ?></p>
  <p>Last Name starts with: <?php echo $last_name; ?> </p>
</div>
<?php
$sql  = "SELECT";
$sql .= " last_name, first_name,";
$sql .= ' middle_name, name_suffix, birthyear, gender, date_of_registration,';
$sql .= ' house_number_character, residence_street_number, house_suffix, pre_direction,';
$sql .= ' street_name, street_type, suffix_direction, residence_extension, city, state,';
$sql .= ' zip, mail_address_1, mail_address_2, mail_address_3, mail_address_4, mail_address_5,';
$sql .= ' voter_id, county_code, jurisdiction, ward_precinct, school_code, state_house,';
$sql .= ' state_senate, us_congress, county_commissioner, village_code, village_precinct,';
$sql .= ' school_precinct, permanent_absentee_ind, status_type, uocava_status';
$sql .= " FROM mi_voters";
$sql .= " PARTITION(" . $partition . ")";
$sql .= ' WHERE last_name like "' . $last_name . '%"';
$sql .= ' ORDER BY last_name, first_name';
if($result = mysqli_query($mvdb, $sql)){
  if(mysqli_num_rows($result) > 0){
    echo "<table class='table table-bordered table-striped'>";
		echo "<thead>";
    echo "<tr>";
    echo "<th></th>";
    echo "<th>Last Name</th>";
    echo "<th>First Name</th>";
    echo "<th>middle_name</th>";
    echo "<th>name_suffix</th>";
    echo "<th>birthyear</th>";
    echo "<th>gender</th>";
    echo "<th>date_of_registration</th>";
    echo "<th>house_number_character</th>";
    echo "<th>residence_street_number</th>";
    echo "<th>house_suffix</th>";
    echo "<th>pre_direction</th>";
    echo "<th>street_name</th>";
    echo "<th>street_type</th>";
    echo "<th>suffix_direction</th>";
    echo "<th>residence_extension</th>";
    echo "<th>city</th>";
    echo "<th>state</th>";
    echo "<th>zip</th>";
    echo "<th>mail_address_1</th>";
    echo "<th>mail_address_2</th>";
    echo "<th>mail_address_3</th>";
    echo "<th>mail_address_4</th>";
    echo "<th>mail_address_5</th>";
    echo "<th>voter_id</th>";
    echo "<th>county_code</th>";
    echo "<th>jurisdiction</th>";
    echo "<th>ward_precinct</th>";
    echo "<th>school_code</th>";
    echo "<th>state_house</th>";
    echo "<th>state_senate</th>";
    echo "<th>us_congress</th>";
    echo "<th>county_commissioner</th>";
    echo "<th>village_code</th>";
    echo "<th>village_precinct</th>";
    echo "<th>school_precinct</th>";
    echo "<th>permanent_absentee_ind</th>";
    echo "<th>status_type</th>";
    echo "<th>uocava_status</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while($row = mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>";
      #echo "<a href='regions_read.php?id="  . $row['last_name'] ."' title='View Record'   data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
      echo "</td>";
      echo "<td>" . $row['last_name']                . "</td>";
      echo "<td>" . $row['first_name']               . "</td>";
      echo "<td>" . $row['middle_name']              . "</td>";
      echo "<td>" . $row['name_suffix']              . "</td>";
      echo "<td>" . $row['birthyear']                . "</td>";
      echo "<td>" . $row['gender']                   . "</td>";
      echo "<td>" . $row['date_of_registration']     . "</td>";
      echo "<td>" . $row['house_number_character']   . "</td>";
      echo "<td>" . $row['residence_street_number']  . "</td>";
      echo "<td>" . $row['house_suffix']             . "</td>";
      echo "<td>" . $row['pre_direction']            . "</td>";
      echo "<td>" . $row['street_name']              . "</td>";
      echo "<td>" . $row['street_type']              . "</td>";
      echo "<td>" . $row['suffix_direction']         . "</td>";
      echo "<td>" . $row['residence_extension']      . "</td>";
      echo "<td>" . $row['city']                     . "</td>";
      echo "<td>" . $row['state']                    . "</td>";
      echo "<td>" . $row['zip']                      . "</td>";
      echo "<td>" . $row['mail_address_1']           . "</td>";
      echo "<td>" . $row['mail_address_2']           . "</td>";
      echo "<td>" . $row['mail_address_3']           . "</td>";
      echo "<td>" . $row['mail_address_4']           . "</td>";
      echo "<td>" . $row['mail_address_5']           . "</td>";
      echo "<td>" . $row['voter_id']                 . "</td>";
      echo "<td>" . $row['county_code']              . "</td>";
      echo "<td>" . $row['jurisdiction']             . "</td>";
      echo "<td>" . $row['ward_precinct']            . "</td>";
      echo "<td>" . $row['school_code']              . "</td>";
      echo "<td>" . $row['state_house']              . "</td>";
      echo "<td>" . $row['state_senate']             . "</td>";
      echo "<td>" . $row['us_congress']              . "</td>";
      echo "<td>" . $row['county_commissioner']      . "</td>";
      echo "<td>" . $row['village_code']             . "</td>";
      echo "<td>" . $row['village_precinct']         . "</td>";
      echo "<td>" . $row['school_precinct']          . "</td>";
      echo "<td>" . $row['permanent_absentee_ind']   . "</td>";
      echo "<td>" . $row['status_type']              . "</td>";
      echo "<td>" . $row['uocava_status']            . "</td>";
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
mysqli_close($mvdb);
?>
</div>
</div>
</div>
</div>
</body>
</html>
