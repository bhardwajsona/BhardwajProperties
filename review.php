<html>
<head>
  <title>Bhardwaj Properties </title>
  <?php include 'header.php'; ?>

  <?php include 'menu.php';?>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>

  #wrapper {

   width: 100%;
 }

 #leftcolumn {

  float:left;
  width: 60%;
  margin-bottom: 100px;
}

#rightcolumn {
  float:right;
  width: 40%;
  background-color: #b3ffff;
  border-radius: 10px;
  margin-bottom: 100px;
}
#review{
  border-bottom: 10px;
  background-color: #ccccff;
  border-radius: 10px;
  width:80%;
}

#refresh{
  margin-left:32%;
  text-align: right;
  float:left;
  background-color:white;


}
#refresh1{
  float:left;
  width: 80%;
  background-color: #ffdb4d;


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

<script>


function show_comment() {

  if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("leftcolumn").innerHTML=this.responseText;
      }
    }
    xmlhttp.open("GET","/post_comment.php",false);
    xmlhttp.send();

  }
  </script>

  <?php

// FORM PROCESSING
// define variables and set to empty values
  $fnameErr =$lnameErr= $emailErr  = $phoneErr = $display=$rating="";
  $fname = $lname= $email= $review = $phone_number = $ratingErr="";

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

    if (empty($_POST["rating"])) {
      $rating = "";
    } else {
      $rating = test_input($_POST["rating"]);
      if (!preg_match("/^[0-5]$/",$rating)) {
        $ratingErr = "Invalid rating"; 
      }
    }

    if (empty($_POST["review"])) {
      $review = "";
    } else {
      $review = test_input($_POST["review"]);
    }


    if ($fnameErr=='' and $lnameErr=='' and $emailErr=='' and $phoneErr=='' and $ratingErr=='') {

      $sql = "INSERT INTO Properties.Reviews (firstname, lastname , email , phone_number , rating, review)
      VALUES ('$fname','$lname' , '$email', '$phone_number', '$rating','$review');"; 

      if($conn->query($sql)==true){
        $fnameErr =$lnameErr= $emailErr  = $phoneErr = $display=$rating="";
        $fname = $lname= $email= $review = $phone_number = $ratingErr="";
        $display="<b ><h3 style='color:#FF0000;'>Review Added Successfully. THANK YOU .</h3></b>";

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

  <body>

    <h1 align="center">Reviews</h1>



    <div id="refresh" >
      Click to refresh the reviews 
      <i type="button" class="fa fa-refresh" style="font-size:20px;color: #ff0000; " onclick="show_comment()"></i> 
     
    </div>
    <div id="wrapper">

      <!--review column -->

      <div id="leftcolumn"> 

        <?php
        $conn=new mysqli("localhost","root","");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "SELECT * FROM Properties.Reviews";
        $result=$conn->query($sql);
        $rows=$result->num_rows;
        echo "<p id='refresh1'> Total Reviews till now :  ". $rows . "</p><bR>";
        $sql = "SELECT id, firstname, lastname ,email , phone_number ,rating,review FROM Properties.Reviews ORDER BY id DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        // output data of each row
          $flag=0;

          while($row = $result->fetch_assoc()) {
            if($flag==0){
              echo '<p id="review" >';

              $flag=1;
            }
            else{
              echo '<p id="review" style="background-color:#ffcccc;">';
              $flag=0;
            }
            echo "<br> <b>Name: </b> " . $row["firstname"]." " .$row["lastname"]. "<br><br>" ."<b>Email </b>  ". $row["email"]." <br>" ;
            echo "<b>Rating </b> ";
            $i=0;
            if ($row["rating"]==0)
            {
              echo '<i class="fa fa-close" style="font-size:20px;color: #ff0000; "></i> ' ;
            }
            while ($i++ < $row["rating"])
            {
              echo '<i class="fa fa-star" style="font-size:20px;color: #FFFF66; "></i> ' ;

            }


            echo " <br>" ."<b>Review </b>   ". $row["review"]."<br><br><br>";


            echo "</p>";


          }
        } else {
          echo "<br> <h2>No reviews Available </h2>";
        }



        $conn->close();
        ?>


      </div>


       <!--comment column  -->

      <div  id="rightcolumn">
        <h2 style="text-align:center;">Submit a review </h2>
        <span><?php echo $display;?></span>
        <p><span class="error">* required field.</span></p>

        <form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
          First Name<span style="display:inline-block ;width:25px;"></span> <input type="text" name="fname" value="<?php echo $fname;?>">
          <span class="error">* <?php echo $fnameErr;?></span>
          <br><br>
          Last  Name <span style="display:inline-block ;width:25px;"></span> <input type="text" name="lname" value="<?php echo $lname;?>">
          <span class="error">* <?php echo $lnameErr;?></span>
          <br><br>
          E-mail <span style="display:inline-block ;width:50px;"></span> <input type="text" name="email" >
          <span class="error">* <?php echo $emailErr;?></span>
          <br><br>
          Phone  <span style="display:inline-block ;width:52px;"></span> <input type="text" name="phone_number" value="<?php echo $phone_number;?>">
          <span class="error"><?php echo $phoneErr;?></span>
          <br><br>
          Rating(0-5)<span style="display:inline-block ;width:20px;"></span> <input name="rating" value="<?php echo $rating;?>">
          <span class="error"><?php echo $ratingErr;?></span>
          <br><br>
          Review <span style="display:inline-block ;width:30px;"></span> <textarea name="review" rows="5" cols="40"><?php echo $review;?></textarea>
          <br><br>

          <button  class="button" type="submit" name="submit" value="Submit">  <span>Submit</span> </button>
        </form>
      </div>
    </div>
    <?php include 'footer.php'; ?>



  </body>
  </html>
