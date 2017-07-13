<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <!-- Begin Standard Bootstrap header code -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- End Standard Bootstrap header code -->
  <title>VNP Field Team DB</title>
  <link rel="icon" type="image/x-icon" href="../images/favicon.ico" />
</head>

<body>
<?php $_SESSION["user_role"] = "fldopsadmin"; ?>
<?php $_SESSION["called_by"] = "/vnpftdb/menus/fldopsadmin.php"; ?>

<div
  style="background-color:#33D"
  overflow="hidden"
  display="block"
>
  <img src="../images/vnp_logo_400a.png">
</div>

<h1>Voters Not Politicians Field Team Database</h1>
<h2>Field Operations Administrator Menu</h2>

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
  >Dropdown 1
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="/vnpftdb/app_screens/">Option 1</a></li>
    <li class="divider"></li>
    <li><a href="/vnpftdb/app_screens/">Option 2</a></li>
  </ul>
</div>

<div class="col-sm-2">
  <div class="dropdown">
    <button
      class="btn btn-sm dropdown-toggle"
      type ="button"
      data-toggle = "dropdown"
    >Dropdown 2
      <span class = "caret"></span>
    </button>
    <ul class = "dropdown-menu">
      <li><a href="/vnpftdb/app_screens/">Option 1</a></li>
    </ul>
  </div>

</div>

<div class="col-sm-1">
  <a
    href="/vnpftdb/app_screens"
    class="btn btn-sm btn-default"
    style="background-color: buttonface">Main Menu Opt 1</a>
</div>

<div class="col-sm-1"></div>

<div class="col-sm-1"></div>

<div class="col-sm-1"></div>
<!------------------------------------------------------------->
</div>
</div>
</body>
</html>
