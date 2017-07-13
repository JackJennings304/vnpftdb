<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Begin Standard Bootstrap header code -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- End Standard Bootstrap header code -->
  <title>Reg 7 Progress</title>
  <link rel="icon" type="image/x-icon" href="/vnpftdb/images/favicon.ico" />
</head>
<body>
  <a
    href="/vnpftdb/menus/fldopsadmin.php"
    class="btn btn-success pull-right"
  >Back</a>
<div class="container">
  <h1>Voters Not Politicians Field Team Database</h1>
  <h2>Region 7 Progress Report</h2>
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
    include ($_SERVER['DOCUMENT_ROOT'] . '/vnpftdb/vnpftdb.php');
    $sql  = "SELECT LABEL, Col_B, Col_C, Col_D,";
    $sql .= " Col_E, Col_F, Col_G, Col_H, Col_I, Col_J,";
    $sql .= " Col_K, Col_L, Col_M, Col_N, Col_O, Col_P,";
    $sql .= " Col_Q, Col_R, Col_S, Col_T, Col_U, Col_V,";
    $sql .= " Col_W, Col_X, Col_Y, Col_Z, Col_AA";
    $sql .= " FROM progress_region_07";
    $sql .= " WHERE RptRow > 1";
    $sql .= " ORDER BY RptRow";
    $result = mysqli_query($db, $sql);
/*    if($result == 0) {
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
      exit();
    }
*/
    if(mysqli_num_rows($result) == 0){
      echo "<p class='lead'><em>No records were found.</em></p>";
      exit();
    }
    while($row = mysqli_fetch_array($result)) {
      echo "<td>" . $row['LABEL'] . "</td>";
      echo "<td>" . $row['Col_B'] . "</td>";
      echo "<td>" . $row['Col_C'] . "</td>";
      echo "<td>" . $row['Col_D'] . "</td>";
      echo "<td>" . $row['Col_E'] . "</td>";
      echo "<td>" . $row['Col_F'] . "</td>";
      echo "<td>" . $row['Col_G'] . "</td>";
      echo "<td>" . $row['Col_H'] . "</td>";
      echo "<td>" . $row['Col_I'] . "</td>";
      echo "<td>" . $row['Col_J'] . "</td>";
      echo "<td>" . $row['Col_K'] . "</td>";
      echo "<td>" . $row['Col_L'] . "</td>";
      echo "<td>" . $row['Col_M'] . "</td>";
      echo "<td>" . $row['Col_N'] . "</td>";
      echo "<td>" . $row['Col_O'] . "</td>";
      echo "<td>" . $row['Col_P'] . "</td>";
      echo "<td>" . $row['Col_Q'] . "</td>";
      echo "<td>" . $row['Col_R'] . "</td>";
      echo "<td>" . $row['Col_S'] . "</td>";
      echo "<td>" . $row['Col_T'] . "</td>";
      echo "<td>" . $row['Col_U'] . "</td>";
      echo "<td>" . $row['Col_V'] . "</td>";
      echo "<td>" . $row['Col_W'] . "</td>";
      echo "<td>" . $row['Col_X'] . "</td>";
      echo "<td>" . $row['Col_Y'] . "</td>";
      echo "<td>" . $row['Col_Z'] . "</td>";
      echo "<td>" . $row['Col_AA'] . "</td>";
      echo "</tr>";
    }
    mysqli_free_result($result);
    mysqli_close($db);
    ?>
  </tbody>
  </table>
</div>

</body>
</html>
