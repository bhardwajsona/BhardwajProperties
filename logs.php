
<?php


$conn=new mysqli("localhost","root","");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT username, msg  FROM chatbox.logs ORDER BY id DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        
        echo "<span style = 'color: blue; font-weight:bold; '>"."<br> <b> " . $row["username"]." </b> : </span><span style = 'color: green; font-weight:bold; '>" .$row["msg"]. "<br></span>"  ;
       
       
    }
} else {
    echo "<br> <h2>No chats Available </h2>";
}



$conn->close();


?>

