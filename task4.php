<!-- Model -->
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

if(isset($_POST['add'])){
  if(isset($_POST['fn']) && isset($_POST['ln']) && isset($_POST['mm']) && isset($_POST['em'])){
    if(strlen($_POST['fn'])<1 || strlen($_POST['ln'])<1 || strlen($_POST['mm'])<1 || strlen($_POST['em'])<1){
      $_SESSION['error'] = "All values are required";
      header("Location: task4.php");
      return;
    } else {
      $_SESSION['fn'] = $_POST['fn'];
      $_SESSION['ln'] = $_POST['ln'];
      $_SESSION['mm'] = $_POST['mm'] + 0;
      $_SESSION['em'] = $_POST['em'] + 0;
      $_SESSION['avg'] = (($_SESSION['mm'] + $_SESSION['em'])/2);
      $_SESSION['add'] = "Set";
      header("Location: task4.php");
      return;
    }
  }
}
?>

<!-- View -->
<!DOCTYPE html>
<html>
    <head>
        <title>Taking input</title>
    </head>
    <body>
        <h1>Enter Your Details</h1>
        <form id="intake" method="post">
            <p>
                <label for="fn">First Name: </label>
                <input type="text" name="fn" id="fn">
            </p>
            <p>
                <label for="ln">Last Name: </label>
                <input type="text" name="ln" id="ln">
            </p>
            <p>
                <label for="mm">Math Marks: </label>
                <input type="integer" name="mm" id="mm">
            </p>
            <p>
                <label for="em">English Marks: </label>
                <input type="integer" name="em" id="em">
            </p>
            <input type="submit" name="add" value="Add">
        </form>
        <?php
        if(isset($_SESSION['add'])){
          // Adding to profile table
          $stmt = $pdo->prepare('INSERT INTO students (name, math_marks, english_marks, average)
          VALUES (:name, :mm, :em, :avg)');

          $stmt->execute(array(
            ':name' => htmlentities($_SESSION['fn']." ".$_SESSION['ln']),
            ':mm' => htmlentities($_SESSION['mm']),
            ':em' => htmlentities($_SESSION['em']),
            ':avg' => htmlentities($_SESSION['avg'])
          ));
          unset($_SESSION['add']);
          $_SESSION['success'] = "Successfully added";
          header("Location: display.php");
        }
        ?>
    </body>
</html>
