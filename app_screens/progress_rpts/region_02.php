<?php
session_start();
$php_root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/vnpftdb/php_code";
include "$php_root/call_stack_functions.php";
include "$php_root/db_config_ftdb.php";
?>

<head>
  <?php include "$php_root/bootstrap_external_refs.php"; ?>
  <title>Reg 2 Progress</title>
  <link rel="icon" type="image/x-icon" href="/vnpftdb/images/favicon.ico" />
</head>

<body>
<?php if($_SESSION['debug'] == 'ON') { echo $_SESSION['call_stack'] . "<br><br>"; } ?>

<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<div class="page-header clearfix">
  <div class = "form-group">
    <div class="col-sm-2">
      <a
        href  = "/vnpftdb/php_code/stack_return.php"
        class = "btn btn-default"
        >
        Back
      </a>
    </div>
  </div>
	<br><br><br>
  <div class = "form-group">
    <h1>Voters Not Politicians Field Team Database</h1>
    <h2>Region 2 Progress Report</h2>
  </div>
</div>

<div class = "form-group">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Week</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
        <th>6</th>
        <th>7</th>
        <th>8</th>
        <th>9</th>
        <th>10</th>
        <th>11</th>
        <th>12</th>
        <th>13</th>
        <th>14</th>
        <th>15</th>
        <th>16</th>
        <th>17</th>
        <th>18</th>
        <th>19</th>
        <th>20</th>
        <th>21</th>
        <th>22</th>
        <th>23</th>
        <th>24</th>
        <th>25</th>
        <th>26</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $sql  = "SELECT";
    $sql .= "  LABEL";
    $sql .= ", Col_B, Col_C, Col_D";
    $sql .= ", Col_E, Col_F, Col_G";
    $sql .= ", Col_H, Col_I, Col_J";
    $sql .= ", Col_K, Col_L, Col_M";
    $sql .= ", Col_N, Col_O, Col_P";
    $sql .= ", Col_Q, Col_R, Col_S";
    $sql .= ", Col_T, Col_U, Col_V";
    $sql .= ", Col_W, Col_X, Col_Y";
    $sql .= ", Col_Z, Col_AA";
    $sql .= " FROM progress_region_02";
    $sql .= " WHERE RptRow > 1";
    $sql .= " ORDER BY RptRow";
    $result = mysqli_query($ftdb, $sql);
    if(mysqli_num_rows($result) == 0){
      echo "<p class='lead'><em>No records were found.</em></p>";
      exit();
    }
    while($row = mysqli_fetch_array($result)) {
      echo "<td>" . $row['LABEL']  . "</td>";
      echo "<td>" . $row['Col_B']  . "</td>";
      echo "<td>" . $row['Col_C']  . "</td>";
      echo "<td>" . $row['Col_D']  . "</td>";
      echo "<td>" . $row['Col_E']  . "</td>";
      echo "<td>" . $row['Col_F']  . "</td>";
      echo "<td>" . $row['Col_G']  . "</td>";
      echo "<td>" . $row['Col_H']  . "</td>";
      echo "<td>" . $row['Col_I']  . "</td>";
      echo "<td>" . $row['Col_J']  . "</td>";
      echo "<td>" . $row['Col_K']  . "</td>";
      echo "<td>" . $row['Col_L']  . "</td>";
      echo "<td>" . $row['Col_M']  . "</td>";
      echo "<td>" . $row['Col_N']  . "</td>";
      echo "<td>" . $row['Col_O']  . "</td>";
      echo "<td>" . $row['Col_P']  . "</td>";
      echo "<td>" . $row['Col_Q']  . "</td>";
      echo "<td>" . $row['Col_R']  . "</td>";
      echo "<td>" . $row['Col_S']  . "</td>";
      echo "<td>" . $row['Col_T']  . "</td>";
      echo "<td>" . $row['Col_U']  . "</td>";
      echo "<td>" . $row['Col_V']  . "</td>";
      echo "<td>" . $row['Col_W']  . "</td>";
      echo "<td>" . $row['Col_X']  . "</td>";
      echo "<td>" . $row['Col_Y']  . "</td>";
      echo "<td>" . $row['Col_Z']  . "</td>";
      echo "<td>" . $row['Col_AA'] . "</td>";
      echo "</tr>";
      echo "</tr>";
    }
    mysqli_close($ftdb);
    ?>
  </tbody>
  </table>
</div>

</div>  </div>  </div>  </div>

</body>
</html>
