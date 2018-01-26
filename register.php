<html>
<head>
  <title>Bhardwaj Properties </title>
  <?php include 'header.php'; ?>

  <?php include 'menu.php';?>

  

  <style>

    
   

  #rightcolumn {
    width: 40%;
    background-color: #b3ffff;
    border-radius: 10px;
    margin-bottom: 100px;
    margin-left:30%;
  }


  .error {color: #FF0000;}


  </style>

</head>



<?php
$conn=new mysqli("localhost","root","");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

?>


<?php

// FORM PROCESSING
// define variables and set to empty values
  $fnameErr =$lnameErr= $emailErr  = $phoneErr = $usernameErr=  $passwordErr =$repasswordErr =$display="";
  $fname = $lname= $email = $phone_number =  $username= $password =$repassword="";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty($_POST["fname"])) {
      $fnameErr = "First Name is required";
    } else {
      $fname = test_input($_POST["fname"]);
      $fnameErr="";
    // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
        $fnameErr = "Only letters and white space allowed"; 
      }
    }

    if (empty($_POST["lname"])) {
      $lnameErr = "Last Name is required";
    } else {
      $lname = test_input($_POST["lname"]);
      $lnameErr="";
    // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
        $lnameErr = "Only letters and white space allowed"; 
      }
    }


    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      $emailErr="";
    // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format"; 
      }
    }
    
    if (empty($_POST["phone_number"])) {
      $phone_number = "";
    } else {
      $phone_number = test_input($_POST["phone_number"]);
      $phoneErr="";
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
      if ((!preg_match("/^[0-9]*$/",$phone_number)) and (strlen($phone_number)!=10) ){
        $phoneErr = "Invalid phone number"; 
      }

    }
     if (empty($_POST["username"])) {
      $usernameErr = "Username Name is required";
    } else {
      $username = test_input($_POST["username"]);
      $usernameErr="";
    // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
        $usernameErr = "Only letters allowed "; 
      }
    }
    

    if (empty($_POST["password"])) {
      $passwordErr = "please enter your password";
    } 
    else if($_POST["password"]!=$_POST["repassword"]){
      $passwordErr = "password doesnot match";
    }
    else{
        $password = test_input($_POST["password"]);
      if (!preg_match("/^[a-zA-Z][0-9a-zA-Z_!$@#^&]{5,20}$/",$password)) {
        $passwordErr="accepted password length between 5 and 20, start with character.";
      }
     
    }
  
    if ($fnameErr=='' and $lnameErr=='' and $emailErr=='' and $phoneErr=='' and $passwordErr=='' and $usernameErr =='' ) {

      $sql= "SELECT username from chatbox.user WHERE username='$username'";
      $result=$conn->query($sql);
          if($result->num_rows){
            $usernameErr="Username already exits .Please choose another username ";
          }
          else{
              $sql = "INSERT INTO chatbox.user (firstname, lastname , email , phone_number , username, password)
              VALUES ('$fname','$lname' , '$email', '$phone_number', '$username','$password');"; 

              if($conn->query($sql)==true){
                 $display='SUCCESSFULLY REGISTERED  click <a href="chat.php">here </a> to login ';
             
              }

              }

    }
    else{
      $display="validation error";
    }
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  ?>

  <body>

    <h1 align="center">Registration </h1>



    
      
    <div  id="rightcolumn">
      <h2 style="text-align:center;">Fill the registration form </h2>
      
      <p><span class="error">* required field.</span></p>

      <form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        First Name<span style="display:inline-block ;width:25px;"></span> <input type="text" name="fname" value="<?php echo $fname;?>">
        <span class="error">* <?php echo $fnameErr;?></span>
        <br><br>
        Last  Name <span style="display:inline-block ;width:25px;"></span> <input type="text" name="lname" value="<?php echo $lname;?>">
        <span class="error">* <?php echo $lnameErr;?></span>
        <br><br>
        E-mail <span style="display:inline-block ;width:50px;"></span> <input type="text" name="email" value="<?php echo $email;?>" >
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
        Phone  <span style="display:inline-block ;width:52px;"></span> <input type="text" name="phone_number" value="<?php echo $phone_number;?>">
        <span class="error"><?php echo $phoneErr;?></span>
        <br><br>
        User Name<span style="display:inline-block ;width:20px;"></span> <input type="text" name="username" value="<?php echo $username;?>">
        <span class="error"><?php echo $usernameErr;?></span>
        <br><br>
        Password <span style="display:inline-block ;width:30px;"></span> <input type="password" name="password" value="<?php echo $password;?>" >
        <span class="error"><?php echo $passwordErr;?></span>
        <br><br>

        Re-Password <span style="display:inline-block ;width:30px;"></span> <input type="password" name="repassword" value="<?php echo $repassword;?>" >
        <span class="error"><?php echo $repasswordErr;?></span>
        <br><br>

        <input  class="button" type="submit" name="submit" value="Submit" style="margin-left:30%"/> 

        <span><b><?php echo $display;?></b></span>
      </form>
    </div>

    <?php include 'footer.php'; ?>



  </body>
  </html>
