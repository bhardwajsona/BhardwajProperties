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
function readCookie() {


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


