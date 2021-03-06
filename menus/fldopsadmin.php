<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
$_SESSION['debug'] = 'OFF';
?>
<?php call_stack_clear(); ?>
<?php call_stack_add(who_am_i()); ?>
<?php $_SESSION['Cur_top_menu'] = "/vnpftdb/menus/fldopsadmin.php"; ?>


<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Fld Ops Administrator</title>
  <link rel="icon" type="image/x-icon" href="/vntftdb/images/favicon.ico" />
</head>

<body>
<?php if($_SESSION['debug'] == 'ON') { echo $_SESSION['call_stack'] . "<br><br>"; } ?>

<?php include "$php_root/header_logo.php" ?>

<h1>Voters Not Politicians Field Team Database</h1>
<h2>Field Operations Administrator Menu</h2>

<nav
  class="navbar navbar-default"
  style = "background-color:#33D"
>

<div class="container-fluid">
<div class="row" style="background-color:#33D; padding-top:5px">

<div class="col-sm-2">
  <button
    class="btn btn-sm dropdown-toggle"
    type="button"
    data-toggle="dropdown"
    >
    Progress Reports
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li>
      <?php
      # Statewide Report
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/app_screens/progress_rpts/statewide.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Statewide Progress";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>
    <li class="divider"></li>
    <li>
      <?php
      # Region 1 Report
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/app_screens/progress_rpts/region_01.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Region 1  Progress";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>
    <li>
      <?php
      # Region 2 Report
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/app_screens/progress_rpts/region_02.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Region 2  Progress";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>
    <li>
      <?php
      # Region 3 Report
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/app_screens/progress_rpts/region_03.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Region 3  Progress";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>
    <li>
      <?php
      # Region 4 Report
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/app_screens/progress_rpts/region_04.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Region 4  Progress";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>
    <li>
      <?php
      # Region 5 Report
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/app_screens/progress_rpts/region_05.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Region 5  Progress";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>
    <li>
      <?php
      # Region 6 Report
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/app_screens/progress_rpts/region_06.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Region 6  Progress";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>
    <li>
      <?php
      # Region 7 Report
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/app_screens/progress_rpts/region_07.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Region 7  Progress";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>
    <li>
      <?php
      # Region 8 Report
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/app_screens/progress_rpts/region_08.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Region 8  Progress";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>
    <li>
      <?php
      # Region 9 Report
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/app_screens/progress_rpts/region_09.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Region 9  Progress";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>
    <li>
      <?php
      # Region 10 Report
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/app_screens/progress_rpts/region_10.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Region 10 Progress";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>
    <li>
      <?php
      # Region 11 Report
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/app_screens/progress_rpts/region_11.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Region 11 Progress";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>
    <li>
      <?php
      # Region 12 Report
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/app_screens/progress_rpts/region_12.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Region 12 Progress";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>
    <li>
      <?php
      # Region 13 Report
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/app_screens/progress_rpts/region_13.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Region 13 Progress";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>
    <li>
      <?php
      # Region 14 Report - Statewide events
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/app_screens/progress_rpts/region_14.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Region 14 Progress - Statewide events";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>
    <li>
      <?php
      # Region 99 Report
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/app_screens/progress_rpts/region_99.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Region 99 Progress - Unassigned Captains";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>
  </ul>
</li>
</div>

<div class="col-sm-3">
  <div class="dropdown">
    <button
      class       = "btn btn-sm dropdown-toggle"
      type        = "button"
      data-toggle = "dropdown"
      >
      Fld Ops Administration
    <span class = "caret"></span>
  </button>

  <ul class = "dropdown-menu">

    <li>
      <?php
      # Refresh Checklist
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/app_screens/progress_rpts_admin/synch_nb_to_vnpftdb_list.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Refresh vnpftdb from Nation Builder";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>

    <li class="divider"></li>

    <li class="dropdown-header">Progress Goal Administration</li>

    <li>
      <?php
      # Rebuild Progress Reports Data
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/php_programs/progress_reports_rebuild.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Rebuild Progress Reports";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>
    <li>
      <?php
      # Progress Dates
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/app_screens/progress_rpts_admin/progress_dates_list.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Progress Dates";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>
    <li>
      <?php
      # Progress Weekly Goals
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/app_screens/progress_rpts_admin/progress_wkly_goal_list.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Progress Weekly Goals";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>
  </ul>
</div>
</div>

<div class="col-sm-2">
  <button
    class="btn btn-sm dropdown-toggle"
    type="button"
    data-toggle="dropdown"
    >
    Leaderboard Reports
    <span class="caret"></span>
  </button>

  <ul class = "dropdown-menu">

    <li class="dropdown-header">Gross Counts (unverified)</li>

    <li>
      <?php
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/reports/leaderboard/ldrbrd_statewide_gross.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Statewide Leaderboard Report";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>

    <li>
      <?php
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/reports/leaderboard/ldrbrd_region_gross.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Regional Leaderboard Report";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>

    <li>
      <?php
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/reports/leaderboard/ldrbrd_captain_gross.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Captain Leaderboard Report";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>

    <li>
      <?php
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/reports/leaderboard/ldrbrd_circulator_gross.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Circulator Leaderboard Report";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>

    <li class="divider"></li>

    <li class="dropdown-header">Net Counts (verified.  <b>The real count!</b>)</li>

    <li>
      <?php
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/reports/leaderboard/ldrbrd_statewide_net.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Statewide Leaderboard Report";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>

    <li>
      <?php
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/reports/leaderboard/ldrbrd_region_net.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Regional Leaderboard Report";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>

    <li>
      <?php
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/reports/leaderboard/ldrbrd_captain_net.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Captain Leaderboard Report";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>

    <li>
      <?php
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/reports/leaderboard/ldrbrd_circulator_net.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Circulator Leaderboard Report";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>

  </ul>

</div>


</body>
</html>
