  <?php
  // Connect to the database
  include_once("includes/connectToDB.php");

  $password = md5( rand(0,1000) );
  $passHashed = sha1($password);
  $firstname =  $_POST['firstname'];
  $lastname =  $_POST['lastname'];
  $email =  $_POST['email'];
  echo 'Thank you ' . $firstname . ' for making an account on Yamadori Maps!';

  $sql = "INSERT INTO Users (firstname, lastname, email, userpassword) VALUES (?,?,?,?)";
  $q = $_db->prepare($sql);
  $q->execute([$firstname, $lastname, $email, $passHashed]);

  $to = $email;
  $subject = 'Yamadori Maps | Your Password';
  $message = '
Hello ' . $firstname . ' ' . $lastname . ',
Thank you for making an account on Yamadori Maps!
Your account has been created, you can login with the following credentials
  
----------------------------------
Username:	' . $email . '
Password:	' . $password . '
----------------------------------

After Logging in you can change your password.

Thanks,
Seinu Gardens
';
$headers = "From:noreply@yamadorimaps.000webhostapp.com" . "\r\n";
mail($to, $subject, $message, $headers);
?>