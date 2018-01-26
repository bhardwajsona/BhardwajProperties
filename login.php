<?php
session_start();
$username= $_POST['username'];

$password= $_POST['password'];

$conn=new mysqli("localhost","root","");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql="SELECT * FROM chatbox.user WHERE username= '$username' AND password='$password';";
$result=$conn->query($sql);

if ($result->num_rows ) {

    $row = $result->fetch_assoc();
    $_SESSION['username'] = $row['username'];
    header('Location: chat.php');
        
      
       
    
} else {
	echo '<center>';
    echo '<br> <h2>No such user exits </h2>';
    echo 'you may register a new account by clicking  <a href="register.php" > here </a>.';
    echo 'if you are already registered then click <a href= "chat.php">here </a>';
    echo '</center>';
}

?>

