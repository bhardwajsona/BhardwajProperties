
<?php 
session_start();

?>
<head>
  <title>Bhardwaj Properties </title>
  <?php include 'header.php'; ?>

  <?php include 'menu.php';?>


  <style>

  #form2{
    width:300px;
    border: 5px solid pink;
    padding: 25px;
    margin-left:40%;
    margin-top: 100px;
    background-color: #ff8080;
    
  }


  #form_chat{

    text-align: center;
    width: 60%;
    background-color: #FFCCFF;
    border-radius: 10px;  
    margin-bottom: 5px;

  }
  textarea { 
    color: forestgreen;
    font-weight: bold;
    width: 80%;
    height: 60px;
    resize: none;
    font-size: 20px;
  }

  #displaychat{
    text-align: center;
    width:60%;
    background-color: #FFCCFF;
    border-radius: 10px;  
    margin-bottom: 200px;
    margin-left:280px;


  }

  
  </style>

  
  <script src="http://code.jquery.com/jquery-1.9.0.js"></script>

  <script>
  function submit_chat() {
    if(form1.msg.value ==""){
      alert('ENTER YOUR MESSAGE');
      exit();
    }

    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    var msg=form1.msg.value;
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("displaychat").innerHTML=this.responseText;
      }
    }
    xmlhttp.open("GET","insert_chat.php?msg=" + msg ,true);
    xmlhttp.send();

  }
  $(document).ready(function(e)
  {
    $.ajaxSetup({cache:false});
    setInterval(function()
    {
      $('#displaychat').load('logs.php');
    }, 1000);
  }
  );
  
  var hello = function()
  {
    alert("Hello!");
  }

  function writeCookie() 
  
  {     

    if(document.myform.remember.value=="off")
    {
      document.myform.remember.value="on";
      
    }
    else {
      document.myform.remember.value="off";
      
    }


    if(document.myform.remember.value=="on")
    {

     
      var cookie_username = escape(document.myform.username.value)+';';
      var cookie_password = escape(document.myform.password.value)+';'; 
      document.cookie= "username= " + cookie_username;
      document.cookie = "password= " + cookie_password ;
      var d = new Date();
      
      d.setTime(d.getTime() + (30*24*60*60*1000)); 
      
      document.cookie = "expires="+ d +';';
      document.cookie = "path="+"/" +';';
    }
    
  }
  function readCookie() 
  {

    alert(document.cookie);
    if(document.cookie != 0)

    {

      var allcookies=document.cookie;
      cookiearray=allcookies.split(';');     
      var name1=cookiearray[0].split('=')[0];
      var value1=cookiearray[0].split('=')[1];  
      document.getElementById("username").value=value1;
      
      var name1=cookiearray[1].split('=')[0];
      var value1=cookiearray[1].split('=')[1];
      
      document.getElementById("password").value=value1;
      
      
    }
  }


  </script>
  

</head>

<?php

if(!isset($_SESSION['username'])){

  ?>
  <body onload="readCookie()">
    <form name="myform" id="form2" method="POST" action="login.php" >
      User Name  :  <input type="text" name="username" value="abc@gmail.com" id="username" /><br/><br/>

      Password : <input type="password"  name="password" value="password" id="password" required /><br/><br/>

      <input type="checkbox" name="remember" id="remember" value="off" onclick="writeCookie()" /> REMEMBER ME <br/><br/>
      <button type="submit" name="submit" class="button" style="margin-left:20%;" >submit</button> <br><br>

      <a href="register.php" >Click here to register </a>

      
    </form>

  </body>
  <?php include 'footer.php';?>

  <?php

  exit();

}

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>

  <h1 align="center">Chat Room</h1>



  <div id="chatbox" align="center">
    <form id="form_chat" name="form1">
      <span style = "color: blue; font-weight:bold;">Your Chatname is </span><b> <?php echo $_SESSION['username'];?> </b>
      <a href="logout.php" ><button style="margin-left:60%;"type="button"  class="button" name="logout" >Logout <i class="fa fa-close" align="right" style="font-size:20px;color: #ff0000; "></i> </button>  </a>
      <br/>
      <br/>
      <span style = "color: forestgreen; font-weight: bold;">Your Message:</span> 
      <br/>
      <br/>
      <textarea name= "msg" styles = "width:200px; height: 200px; color: grey;"></textarea>
      <br/>
      <br/>
      <button type="button" style="margin-left:1%;" name="submit" class="button" onclick="submit_chat()">Submit</button>
    </form>
    
  </div>




  <div id="displaychat" align="center">


    <i><b><h3>Type a message to start the chat....</i></b></h3>

  </div>

  



  <?php include 'footer.php';?>




</body>
</html>
