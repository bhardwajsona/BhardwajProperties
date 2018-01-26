<html>
<head>
  
    
    
</head>

<body>
<?php

function test_input($data) 
{
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
}
//global variables
    $email=$pass="";
if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
    // collect value of input field
    $email = test_input($_POST['email']);
    $pass = test_input($_POST['pass']);

    echo "<br> <h2>$email</h2> <br>";
    echo "<br> <h2>$pass</h2> <br>";
// Remove all illegal characters from email
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Validate e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo("$email is a valid email address");
    } else {
        echo("$email is not a valid email address");
    }

}
?>
    
</body>
</html>
