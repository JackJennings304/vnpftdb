<?php session_start(); ?>
<?php
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
?>
<?php call_stack_clear(); ?>
<?php call_stack_add(who_am_i()); ?>

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
<div class="row" style="background-color:#33D; padding-top:5px">

<div class="col-sm-2">
  <button
    class="btn btn-sm dropdown-toggle"
    type="button"
    data-toggle="dropdown">
  Petitions
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
<!--    <li><a href="#">Petition batches</a></li>   -->
    <li>
      <?php
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/app_screens/petitions/capt_petitions_list.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ">";
      $anchor .= "Petitions List";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>
    <li class="divider"></li>
    <li class="dropdown-header">Petion Batch Functions</li>
    <li>
      <?php
      $anchor  = "<a";
      $anchor .= " href='";
      $anchor .= "/vnpftdb/php_code/stack_call.php?";
      $anchor .= "child=";
      $anchor .= "/vnpftdb/app_screens/petition_batches/capt_petn_batch_list.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ">";
      $anchor .= "List Petition Batches";
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
      $anchor .= "/vnpftdb/app_screens/petition_batches/capt_petn_batch_add.php";
      $anchor .= "'";
      $anchor .= ' class = ""';
      $anchor .= ">";
      $anchor .= "Create Petition Batch";
      $anchor .= "</a>";
      echo $anchor
      ?>
    </li>
  </ul>
</div>

<div class="col-sm-2">
  <a
    href="/vnpftdb/php_code/stack_call.php?child=/vnpftdb/app_screens/circulators/circulators_add.php"
    class="btn btn-sm btn-default"
    style="background-color: buttonface">
    Add Circulator
  </a>
</div>

<div class="col-sm-3">
  <a
    href="/vnpftdb/php_code/stack_call.php?child=/vnpftdb/app_screens/capt_wkly_rpt/capt_wkly_rpt.php"
    class="btn btn-sm btn-default"
    style="background-color: buttonface">
    Captains Weekly Report
  </a>
</div>

<div class="col-sm-2">
  <a
    href="captain_get_team.php"
    class="btn btn-sm btn-default"
    style="background-color: buttonface">
    Reset Reg-Team
  </a>
</div>

</div>
</div>
</div>

</body>

</html>
