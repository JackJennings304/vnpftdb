<?php
$role = $_SESSION["user_role"];
echo '<a href=';
if ($role==="dbadmin")  { echo '"/vnpftdb/menus/dbadmin.php"';  }
if ($role==="sysadmin") { echo '"/vnpftdb/menus/sysadmin.php"'; }
if ($role==="captain")  { echo '"/vnpftdb/menus/captain.php"';  }
echo ' class="btn btn-success pull-right">Back</a>';
?>
