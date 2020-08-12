<?php
session_start();
require_once "db/pdo.php";

// Flash Messages
if(isset($_SESSION['logged_in'])){
  if(isset($_SESSION['success'])){
    echo '<span style="color:green;text-align:center;">'.$_SESSION['success'].'</span>';
    unset($_SESSION['success']);
  }
  if(isset($_SESSION['error'])){
    echo '<span style="color:red;text-align:center;">'.$_SESSION['error'].'</span>';
    unset($_SESSION['error']);
  }
}
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Display students</title>
  </head>
  <body>
    <h1>Students</h1>
    <table border="1">
      <?php
      $stmt = $pdo->prepare("SELECT * FROM students ORDER BY average DESC");
      $stmt->execute();
      echo "<tr>
              <th>Name</th>
              <th>Math Marks</th>
              <th>English Marks</th>
            </tr>";
      foreach($stmt as $row)
          {
            echo '<tr>
              <td>'.$row["name"].'</td>
              <td>'.$row["math_marks"].'</td>
              <td>'.$row["english_marks"].'</td>
            </tr>';
          }
          ?>
    </table>
    <a href="task4.php">Add More</a>
  </body>
</html>
