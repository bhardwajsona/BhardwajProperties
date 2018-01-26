<html>
<head>
    <title>Bhardwaj Properties </title>
    <?php include 'header.php'; ?>

    <?php include 'menu.php';?>
    <style>

    #wrapper {

         width: 100%;
    }
  
    #leftcolumn {

        float:left;
         width: 60%;
          margin-bottom: 100px;
          background-color: #ccebff;
          border-radius: 200px;
    }

    #rightcolumn {
        float:right;
         width: 40%;
         background-color: #FFCCFF;
         border-radius: 10px;  
         margin-bottom: 100px;
    }
   
    #review{
        border-bottom: 10px;
        background-color: #ccccff;
        border-radius: 10px;
        width:80%;
    }
    .error {color: #FF0000;}

    #form_chat{
      float:right;
         width: 40%;
         background-color: #FFCCFF;
         border-radius: 10px;  
         margin-bottom: 100px;

    }

  
    </style>

     <style>
      #map {
        width: 100%;
        height: 400px;
      }
    </style>


   
    <script>
          function initMap() {
            var jaina = {lat: 28.721644, lng: 77.124177};
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 4,
              center: jaina
            });
            var marker = new google.maps.Marker({
              position: jaina,
              map: map
            });
          }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMXzDU-E6wlkS6OsNyqk_BXydKTMrYdZY&callback=initMap">
    </script>

    </script>
</head>




<body>




<?php
    $conn=new mysqli("localhost","root","");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>

<?php

// FORM PROCESSING
// define variables and set to empty values
$fnameErr =$lnameErr= $emailErr = $phoneErr ="";
$fname = $lname= $email = $review = $phone_number =$display="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $fnameErr = "First Name is required";
  } else {
    $fname = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
      $fnameErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["lname"])) {
    $lnameErr = "Last Name is required";
  } else {
    $lname = test_input($_POST["lname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
      $lnameErr = "Only letters and white space allowed"; 
    }
  }
  

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["phone_number"])) {
    $phone_number = "";
  } else {
    $phone_number = test_input($_POST["phone_number"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if ((!preg_match("/^[0-9]*$/",$phone_number)) and (strlen($phone_number)!=10) ){
      $phoneErr = "Invalid phone number"; 
    }
    
  }

  

  if (empty($_POST["review"])) {
    $review = "";
  } else {
    $review = test_input($_POST["review"]);
  }

  if ($fnameErr=='' and $lnameErr=='' and $emailErr==''  and $phoneErr=='' ) {

    $sql = "INSERT INTO Properties.MyGuests (firstname, lastname , email , phone_number , comment)
    VALUES ('$fname','$lname' , '$email', '$phone_number','$review');"; 

        if($conn->query($sql)==true){

            $fnameErr =$lnameErr= $emailErr = $phoneErr ="";
            $fname = $lname= $email = $review = $phone_number =$display="";

            $display= "<b ><h3 style='color:#FF0000;'>Query Sent  Successfully. THANK YOU .</h3></b>";
        }
        else {
           $display="<br>Error inserting review ".$conn->error;
        }

  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<h1 align="center">Contact us</h1>

<h2 align="center">My Google Location</h2>
    <div id="map"></div>

<div id="wrapper">

    <div id="leftcolumn">
    
        <h1 align="center"> <p style="color:red;">AVNISH BHARDWAJ</p>(+91) 9312218546 <br> (+91) 8826825825 <br> (+91) 01127864786 </h1>

        <h2 align="center" style="color:blue;">31,Jaina Apartment ,Sector -13, Rohini ,DELHI-110085 <br> Email me: bhardwaj.sona.sb@gmail.com </h2>
    </div>

    <div  id="rightcolumn">

      <h2 style="text-align:center;">Submit a Query </h2>

      <span><?php echo $display;?></span>
      <p><span class="error">* required field.</span></p>

    <form   method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
      First Name:<span style="display:inline-block ;width:25px;"></span>  <input type="text" name="fname" value="<?php echo $fname;?>">
      <span class="error">* <?php echo $fnameErr;?></span>
      <br><br>
      Last  Name:<span style="display:inline-block ;width:27px;"></span>  <input type="text" name="lname" value="<?php echo $lname;?>">
      <span class="error">* <?php echo $lnameErr;?></span>
      <br><br>
      E-mail: <span style="display:inline-block ;width:50px;"></span> <input type="text" name="email" value="<?php echo $email;?>">
      <span class="error">* <?php echo $emailErr;?></span>
      <br><br>
      Phone:<span style="display:inline-block ;width:57px;"></span>  <input type="text" name="phone_number" value="<?php echo $phone_number;?>">
      <span class="error"><?php echo $phoneErr;?></span>
      <br><br>
      
      Comment/issue: <textarea name="review" rows="5" cols="40"><?php echo $review;?></textarea>
      <br><br>
      <button  class="button" type="submit" name="submit" value="Submit">  <span>Submit</span> </button>
    </form>
    </div>
</div>

<?php include 'footer.php';?>




</body>
</html>