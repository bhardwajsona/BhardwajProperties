  <html>
  <body>

  <style>
    #review{
        border-bottom: 10px;
        background-color: #ccccff;
        border-radius: 10px;
        width:80%;
    }


  </style>



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


</body>
</html>