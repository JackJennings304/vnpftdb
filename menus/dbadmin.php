<?php session_start(); ?>
<?php
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
$_SESSION['debug'] = 'OFF';
?>

<html>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>DB Admin menu</title>
  <link rel="icon" type="image/x-icon" href="../images/favicon.ico" />
</head>

<body>
<?php include "$php_root/header_logo.php" ?>

<h1>Voters Not Politicians Field Team Database</h1>
<h2>Database Administrators Menu</h2>
<br>

<nav
  class="navbar navbar-default"
  style = "background-color:#33D"
>
<div class="container-fluid">
<div class="row" style="background-color:#33D; padding-top:5px">
<!------------------------------------------------------------->

<div class="col-sm-2">
  <button
    class="btn btn-sm dropdown-toggle"
    type="button"
    data-toggle="dropdown"
    >
    User Menus
    <span class="caret"></span>
  </button>

  <ul class="dropdown-menu">

    <li>
      <a
        href="/vnpftdb/menus/sysadmin.php"
        >
        System Administrators
      </a>
    </li>

    <li>
      <a
        href="/vnpftdb/menus/captain_get_team.php"
        >
        Captains
      </a>
    </li>

    <li>
      <a
        href="/vnpftdb/menus/fldopsadmin.php"
        >
        Field Operations Administrator
      </a>
    </li>

    <li>
      <a
        href="/vnpftdb/_mvdb/menus/mvmain_menu.php"
        >
        MI Voters
      </a>
    </li>

    <li>
      <a
        href="/vnpftdb/menus/shipping.php"
        >
        Shipping
      </a>
    </li>

    <li>
      <a
        href="/vnpftdb/menus/regional_director.php"
        >
        Regional Directors
      </a>
    </li>

    <li>
      <a
        href="/vnpftdb/menus/central_processing.php"
        >
        Central Processing
      </a>
    </li>

    <li class="divider"></li>
    <li class="dropdown-header">Other Possible Menus</li>
  </ul>
</div>

<!-- Single option button
<div class="col-sm-1">
  <a
    href="/vnpftdb/app_screens"
    class="btn btn-sm btn-default"
    style="background-color: buttonface">Main Menu Opt 1</a>
</div>
-->

<!------------------------------------------------------------->
</div>  </div>
</nav>

<br>
<div
  style="background-color:#FFF"
  overflow="hidden"
  display="block"
>

<p><b>Database Adminstrators Menu:</b> This is for running the database.  It contains all of the options
found in the other menus.</p>
<br>
<p><b>System Administrators Menu:</b> Director level personnel.</p>
<br>
<p><b>Captains Menu:</b> Captains.  Mainly is used for keeping track of petitions and Signer counts.<br>
The first screen gets the Region-Team which drives which records the Captain can see.</p>
<br>
<p><b>Field Operations Administrator:</b> The field operations administrator manages goals reporting
  working with the Regional Directors.</p>
<br>
<p><b>MI Voters:</b> Used to query the MI Voters Database</p>
<br>
<p>Other Menus:<b>
  <ul>
    <li>
      Shipping - uses Captain and Circulator Assignment Reports
    </li>
    <li>
      Regional Directors
    </li>
    <li>
      Central Processing
    </li>
  </ul>
</p>


</body>

</html>
