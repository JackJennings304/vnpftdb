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
    <div class="col-sm-2">
      <button
        class="btn btn-sm dropdown-toggle"
        type="button"
        data-toggle="dropdown"
      >Progress Reports
      <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li><a href="/vnpftdb/app_screens/progress_rpts/statewide.php">Statewide Progress</a></li>
        <li class="divider"></li>
        <li><a href="/vnpftdb/app_screens/progress_rpts/region_01.php">Region 1  Progress</a></li>
        <li><a href="/vnpftdb/app_screens/progress_rpts/region_02.php">Region 2  Progress</a></li>
        <li><a href="/vnpftdb/app_screens/progress_rpts/region_03.php">Region 3  Progress</a></li>
        <li><a href="/vnpftdb/app_screens/progress_rpts/region_04.php">Region 4  Progress</a></li>
        <li><a href="/vnpftdb/app_screens/progress_rpts/region_05.php">Region 5  Progress</a></li>
        <li><a href="/vnpftdb/app_screens/progress_rpts/region_06.php">Region 6  Progress</a></li>
        <li><a href="/vnpftdb/app_screens/progress_rpts/region_07.php">Region 7  Progress</a></li>
        <li><a href="/vnpftdb/app_screens/progress_rpts/region_08.php">Region 8  Progress</a></li>
        <li><a href="/vnpftdb/app_screens/progress_rpts/region_09.php">Region 9  Progress</a></li>
        <li><a href="/vnpftdb/app_screens/progress_rpts/region_10.php">Region 10 Progress</a></li>
        <li><a href="/vnpftdb/app_screens/progress_rpts/region_11.php">Region 11 Progress</a></li>
        <li><a href="/vnpftdb/app_screens/progress_rpts/region_12.php">Region 12 Progress</a></li>
        <li><a href="/vnpftdb/app_screens/progress_rpts/region_13.php">Region 13 Progress</a></li>
      </ul>
    </li>
    </div>

    <div class="col-sm-2">
      <div class="dropdown">
        <button
        class="btn btn-sm dropdown-toggle"
        type ="button"
        data-toggle = "dropdown"
        >Report Administration
        <span class = "caret"></span>
      </button>
      <ul class = "dropdown-menu">
        <li><a href="/vnpftdb/app_screens/progress_rpts_admin/progress_dates.php">Progress Dates</a></li>
        <li><a href="/vnpftdb/app_screens/progress_rpts_admin/progress_wkly_goal.php">Progress Weekly Goals</a></li>
      </ul>
  </div>
</body>
</html>
