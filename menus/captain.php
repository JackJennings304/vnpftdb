<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
?>
<?php call_stack_clear(); ?>
<?php call_stack_add(who_am_i()); ?>
<?php $_SESSION['Cur_top_menu'] = "/vnpftdb/menus/captain.php"; ?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Captains Menu</title>
  <link rel="icon" type="image/x-icon" href="../images/favicon.ico" />
</head>

<body>
<?php if($_SESSION['debug'] == 'ON') { echo $_SESSION['call_stack'] . "<br><br>"; } ?>

<?php include "$php_root/header_logo.php" ?>

<h1>Voters Not Politicians Field Team Database</h1>
<?php
echo "<h2>Captains Menu";
$reg_team_filter = $_SESSION["reg_team_filter"];
if (isset($reg_team_filter)) { echo ", Region-Team set to " . $reg_team_filter; }
echo "</h2>"
?>
<br>

<nav
  class="navbar navbar-default"
  style = "background-color:#33D"
  >
<div class="container-fluid">
<div class="row" style="background-color:#33D; padding-top:9px">


<div class="col-sm-2">
  <?php
  $anchor  = "<a";
  $anchor .= " href='";
  $anchor .= "/vnpftdb/php_code/stack_call.php?";
  $anchor .= "child=";
  $anchor .= "/vnpftdb/app_screens/petitions/capt_petitions_list.php";
  $anchor .= "'";
  $anchor .= ' class = "btn btn-sm btn-default"';
  $anchor .= ' style = "background-color: buttonface"';
  $anchor .= ">";
  $anchor .= "Petitions List";
  $anchor .= "</a>";
  echo $anchor
  ?>
</div>

<div class="col-sm-2">
  <?php
  $anchor  = "<a";
  $anchor .= " href='";
  $anchor .= "/vnpftdb/php_code/stack_call.php?";
  $anchor .= "child=";
  $anchor .= "/vnpftdb/app_screens/petition_batches/capt_petn_batch_add.php";
  $anchor .= "'";
  $anchor .= ' class = "btn btn-sm btn-default"';
  $anchor .= ' style = "background-color: buttonface"';
  $anchor .= ">";
  $anchor .= "Input/Update Multiple Petitions";
  $anchor .= "</a>";
  echo $anchor
  ?>
</div>

<div class="col-sm-2">
  <button
    class="btn btn-sm dropdown-toggle"
    type="button"
    data-toggle="dropdown"
    >
    File Maintenance
    <span class="caret"></span>
  </button>
  <ul class = "dropdown-menu">
    <li>
      <?php
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/app_screens/circulators/circulators_add.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Add Circulator";
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
      $anchor .= "/vnpftdb/app_screens/petition_signers/petn_signer_list.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Signers, Phones, Emails";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>
  </ul>
</div>

<div class="col-sm-2">

  <button
    class="btn btn-sm dropdown-toggle"
    type="button"
    data-toggle="dropdown"
    >
    Reports
    <span class="caret"></span>
  </button>

  <ul class = "dropdown-menu">

    <li>
      <?php
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/app_screens/capt_wkly_rpt/capt_wkly_rpt.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ' style = ""';
      $anchor .= ">";
      $anchor .= "Captains Weekly Report";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>

    <li class="dropdown-header">Gross Leaderboard Reports (unverified)</li>

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

    <li class="dropdown-header">Net Leaderboard Counts (verified.  <b>The real count!</b>)</li>

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

<div class="col-sm-2">
  <a
    href="captain_get_team.php"
    class="btn btn-sm btn-default"
    style="background-color: buttonface">
    Change Region-Team
  </a>
</div>

</div>
</div>
</div>

</body>

</html>
