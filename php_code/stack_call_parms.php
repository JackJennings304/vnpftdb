<?php session_start(); ?>
<?php include 'call_stack_functions.php'; ?>
<?php
$child = $_GET['child'];
$url   = $_GET["child"];
if(isset($_GET["parm1"])) {
  $url .= "?" . $_GET["parm1"] . "=" . $_GET["parm1_value"];
}
if(isset($_GET["parm2"])) {
  $url .= "&" . $_GET["parm2"] . "=" . $_GET["parm2_value"];
}
/*
if($_SESSION['debug'] == 'ON') {
  echo $_SESSION['call_stack'] . "<br><br>";
} else {
*/
  call_stack_add($child);
  header("Location: " . $url);
#  }
?>
<html>
<head>
</head>
<body>
<?php
/*
if($_SESSION['debug'] == 'ON') {
   echo $_SESSION['call_stack'] . "<br><br>";
   echo $child . "<br><br>";
   echo $url   . "<br><br>";
   echo $_GET['parm1']       . "<br><br>";
   echo $_GET['parm1_value'] . "<br><br>";
   echo $_GET['parm2']
}
*/
?>

</body>
</html>
