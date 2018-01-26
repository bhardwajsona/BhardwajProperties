<style>
#header{
	height:10%;
	float:right;
	text-align: center;
	color:red;
	font-size: 300%;
	width:40%;
}

#number{

}


</style>

<script>

	
	function menumouseout1 (element){
		element.style.color="red";
		element.style.fontSize="300%";
	}

</script>
<?php
echo '<div style="width:100%;height:120px">';
echo '<div align="center" style="float:left;width:30%;"> <a href="index.php"><img src="images/home.jpg" /></a></div>';

echo '<div id="number" style="float:right;width:30%;margin-top:80px;text-align:right;">

	<h2 align="center"> <b style="color:red;">Avnish Bhardwaj </b><b><br>(+91) 9312218546 <br> (+91) 8826825825 <br> (+91) 011-27864786</b></h2>
	</div>';

echo '<div id="header" onmouseover="menumouseover1(this)" onmouseout="menumouseout1(this)" > <p><b>BHARDWAJ</b><br/> PROPERTIES</p> </div>';
echo '</div>';
?>
