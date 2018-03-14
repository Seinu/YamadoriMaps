<?php
session_start();
include_once("includes/connectToDB.php");
if (isset($_POST['email']) and isset($_POST['password'])){
  $email = $_POST['email'];
  $password = sha1($_POST['password']);
  $sql = $_db->query("SELECT * FROM Users WHERE email='$email' AND userpassword='$password' LIMIT 1"); // query user
  
  // Check User Exists
  $count = $sql->rowCount();
  if ($count == 1){
    while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
      $firstname = $row["firstname"];
      $_SESSION['username'] = $firstname;
      $_SESSION['email'] = $email;
      $_SESSION['userpassword'] = $password;
      $_SESSION['loggedin'] = TRUE;
    }
    } elseif($count > 1) {
      //3.1.3 If the login credentials doesn't match, he will be shown with an error message.
        echo('ERROR: multiple users with same credentials!');
    } elseif($count == 0) {
      //3.1.3 If the login credentials doesn't match, he will be shown with an error message.
        echo('ERROR: user credentials not found!');
    }
}
if($_SESSION['loggedin'] === TRUE) {
  header("Location: ./yamadorimap.php");
}

?>