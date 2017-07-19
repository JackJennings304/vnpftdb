<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Nation Builder tbl Load</title>
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
	<h2>Nation Builder tbl load program</h2>
</div>
<form
  class="form-horizontal"
  method="post"
>

<div class="form-group">
  <p class = "col-sm-8">
    Make sure the exported Nation Builder file is in C:\wamp\tmp<br>
    Is named synch_to_vnpftdb.csv.<br>
    Is encoded with Windows line endings (cr-lf)<br>
    Is encoded as UTF-8.
  </p>
</div>

<div class = "form-group">
<div class = "col-sm-2">
<input
  type="submit"
  class="btn btn-primary"
  value="Load"
  >
</div>
<div class = "col-sm-2">
  <a
    href  = "/vnpftdb/php_code/stack_return.php"
    class = "btn btn-default"
    >
    Cancel
  </a>
</div>

</div>


</form>

</body>


<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {


$sql  = "TRUNCATE nation_builder_tbl";
if ( mysqli_query($ftdb, $sql) ) {
} else {
  echo "ERROR: Could not execute $sql <br>";
  echo mysqli_error($ftdb);
}


$sql  = "LOAD DATA LOCAL INFILE 'c:/wamp/tmp/synch_to_vnpftdb.csv'";
$sql .= " INTO TABLE nation_builder_tbl";
$sql .= " CHARACTER SET utf8";
$sql .= " FIELDS TERMINATED BY ','";
$sql .= " OPTIONALLY ENCLOSED BY '" . '"' . "'";
$sql .= " LINES TERMINATED BY '\\r\\n'";
$sql .= " IGNORE 1 LINES";
$sql .= " (";
$sql .= " nationbuilder_id,";
$sql .= " external_id,";
$sql .= " civicrm_id,";
$sql .= " salesforce_id,";
$sql .= " nbec_guid,";
$sql .= " state_file_id,";
$sql .= " county_file_id,";
$sql .= " dw_id,";
$sql .= " van_id,";
$sql .= " ngp_id,";
$sql .= " rnc_id,";
$sql .= " rnc_regid,";
$sql .= " datatrust_id,";
$sql .= " pf_strat_id,";
$sql .= " prefix,";
$sql .= " first_name,";
$sql .= " middle_name,";
$sql .= " last_name,";
$sql .= " suffix,";
$sql .= " full_name,";
$sql .= " legal_name,";
$sql .= " email,";
$sql .= " email_opt_in,";
$sql .= " email1,";
$sql .= " email1_is_bad,";
$sql .= " email2,";
$sql .= " email2_is_bad,";
$sql .= " email3,";
$sql .= " email3_is_bad,";
$sql .= " email4,";
$sql .= " email4_is_bad,";
$sql .= " unsubscribed_at,";
$sql .= " phone_number,";
$sql .= " work_phone_number,";
$sql .= " mobile_number,";
$sql .= " mobile_opt_in,";
$sql .= " is_mobile_bad,";
$sql .= " fax_number,";
$sql .= " do_not_call,";
$sql .= " do_not_contact,";
$sql .= " federal_donotcall,";
$sql .= " website,";
$sql .= " facebook_username,";
$sql .= " twitter_login,";
$sql .= " meetup_id,";
$sql .= " primary_address1,";
$sql .= " primary_address2,";
$sql .= " primary_address3,";
$sql .= " primary_city,";
$sql .= " primary_county,";
$sql .= " primary_state,";
$sql .= " primary_zip,";
$sql .= " primary_country_code,";
$sql .= " primary_country,";
$sql .= " primary_fips,";
$sql .= " primary_submitted_address,";
$sql .= " address_address1,";
$sql .= " address_address2,";
$sql .= " address_address3,";
$sql .= " address_city,";
$sql .= " address_county,";
$sql .= " address_state,";
$sql .= " address_zip,";
$sql .= " address_country_code,";
$sql .= " address_country,";
$sql .= " address_fips,";
$sql .= " address_submitted_address,";
$sql .= " registered_address1,";
$sql .= " registered_address2,";
$sql .= " registered_address3,";
$sql .= " registered_city,";
$sql .= " registered_county,";
$sql .= " registered_state,";
$sql .= " registered_zip,";
$sql .= " registered_country_code,";
$sql .= " registered_country,";
$sql .= " registered_street_number,";
$sql .= " registered_street_prefix,";
$sql .= " registered_street_name,";
$sql .= " registered_street_type,";
$sql .= " registered_street_suffix,";
$sql .= " registered_unit_number,";
$sql .= " registered_zip5,";
$sql .= " registered_zip4,";
$sql .= " registered_fips,";
$sql .= " registered_sort_sequence,";
$sql .= " registered_delivery_point,";
$sql .= " registered_lot,";
$sql .= " registered_carrier_route,";
$sql .= " registered_submitted_address,";
$sql .= " billing_address1,";
$sql .= " billing_address2,";
$sql .= " billing_address3,";
$sql .= " billing_city,";
$sql .= " billing_county,";
$sql .= " billing_state,";
$sql .= " billing_zip,";
$sql .= " billing_country_code,";
$sql .= " billing_country,";
$sql .= " billing_fips,";
$sql .= " billing_submitted_address,";
$sql .= " work_address1,";
$sql .= " work_address2,";
$sql .= " work_address3,";
$sql .= " work_city,";
$sql .= " work_county,";
$sql .= " work_state,";
$sql .= " work_zip,";
$sql .= " work_country_code,";
$sql .= " work_country,";
$sql .= " work_fips,";
$sql .= " work_submitted_address,";
$sql .= " mailing_address1,";
$sql .= " mailing_address2,";
$sql .= " mailing_address3,";
$sql .= " mailing_city,";
$sql .= " mailing_county,";
$sql .= " mailing_state,";
$sql .= " mailing_zip,";
$sql .= " mailing_country_code,";
$sql .= " mailing_country,";
$sql .= " mailing_street_number,";
$sql .= " mailing_street_prefix,";
$sql .= " mailing_street_name,";
$sql .= " mailing_street_type,";
$sql .= " mailing_street_suffix,";
$sql .= " mailing_unit_number,";
$sql .= " mailing_zip5,";
$sql .= " mailing_zip4,";
$sql .= " mailing_fips,";
$sql .= " mailing_sort_sequence,";
$sql .= " mailing_delivery_point,";
$sql .= " mailing_lot,";
$sql .= " mailing_carrier_route,";
$sql .= " mailing_submitted_address,";
$sql .= " user_submitted_address1,";
$sql .= " user_submitted_address2,";
$sql .= " user_submitted_address3,";
$sql .= " user_submitted_city,";
$sql .= " user_submitted_county,";
$sql .= " user_submitted_state,";
$sql .= " user_submitted_zip,";
$sql .= " user_submitted_country_code,";
$sql .= " user_submitted_country,";
$sql .= " user_submitted_fips,";
$sql .= " user_submitted_submitted_address,";
$sql .= " supranational_district,";
$sql .= " federal_district,";
$sql .= " state_upper_district,";
$sql .= " state_lower_district,";
$sql .= " county_district,";
$sql .= " city_district,";
$sql .= " city_sub_district,";
$sql .= " village_district,";
$sql .= " judicial_district,";
$sql .= " school_district,";
$sql .= " school_sub_district,";
$sql .= " fire_district,";
$sql .= " precinct_name,";
$sql .= " precinct_code,";
$sql .= " media_market_name,";
$sql .= " signup_type,";
$sql .= " tag_list,";
$sql .= " note,";
$sql .= " employer,";
$sql .= " occupation,";
$sql .= " marital_status,";
$sql .= " sex,";
$sql .= " demo,";
$sql .= " ethnicity,";
$sql .= " language,";
$sql .= " religion,";
$sql .= " church,";
$sql .= " born_at,";
$sql .= " is_deceased,";
$sql .= " is_prospect,";
$sql .= " is_supporter,";
$sql .= " support_level,";
$sql .= " inferred_support_level,";
$sql .= " priority_level,";
$sql .= " created_at,";
$sql .= " updated_at,";
$sql .= " recruiter_name_or_email,";
$sql .= " recruiter_id,";
$sql .= " point_person_name_or_email,";
$sql .= " parent_id,";
$sql .= " capital_amount,";
$sql .= " spent_capital_amount,";
$sql .= " received_capital_amount,";
$sql .= " party,";
$sql .= " previous_party,";
$sql .= " inferred_party,";
$sql .= " party_member,";
$sql .= " registered_at,";
$sql .= " is_active_voter,";
$sql .= " is_early_voter,";
$sql .= " is_absentee_voter,";
$sql .= " is_permanent_absentee_voter,";
$sql .= " support_probability_score,";
$sql .= " turnout_probability_score,";
$sql .= " is_volunteer,";
$sql .= " availability,";
$sql .= " membership_names,";
$sql .= " county,";
$sql .= " city,";
$sql .= " experience,";
$sql .= " agree_vetting";
$sql .= " )";
if (mysqli_query($ftdb, $sql)) {
} else {
  echo "ERROR: Could not execute <br>";
  echo "$sql<br>";
  echo mysqli_error($ftdb);
}

$sql  = "UPDATE globals";
$sql .= " SET DATE_01 = NOW()";
$sql .= " WHERE KEY_NAME = 'nb_to_vnpftdb_synch_steps'";
$sql .= " AND   KEY_02   = '2'";
if (mysqli_query($ftdb, $sql)) {
} else {
  echo "ERROR: Could not execute <br>";
  echo "$sql<br>";
  echo mysqli_error($ftdb);
}

include "$php_root/stack_return_within_php.php";
exit();
}
?>

</html>
