<style>


.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 15px;
  padding: 10px;
  width: 150px;
  transition: all 0.5s;
  cursor: pointer;
  margin-left: 225px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
.menu{
	margin-top:90px;
	color:white;
    padding: 5px;
	background-color:#ff66a3;
	text-decoration: none;
	border-radius: 20px;
	font-size: 130%;
  border-spacing: :20px;

}
body{
  background-image: url("images/background.jpeg");
  background-repeat: repeat-y;
}

div.menu{
	background-color: #d699ff;
}

</style>
<script>

	function menumouseover (element){
		element.style.background="#006bb3";

	}
	function menumouseout (element){
		element.style.background="#ff66a3";
	}

</script>

<?php
echo '<div class="menu" >
<a class="menu"  href="index.php" onmouseover="menumouseover(this)" onmouseout="menumouseout(this)" >About us</a> -
<a class="menu" href="deal.php" onmouseover="menumouseover(this)" onmouseout="menumouseout(this)"  >Deals in</a> -
<a class="menu" href="review.php" onmouseover="menumouseover(this)" onmouseout="menumouseout(this)" >Reviews</a> -
<a class="menu" href="query.php" onmouseover="menumouseover(this)" onmouseout="menumouseout(this)" >Contact Us </a> - 
<a class="menu" href="chat.php" onmouseover="menumouseover(this)" onmouseout="menumouseout(this)" >CHAT</a> </div>'
?>
