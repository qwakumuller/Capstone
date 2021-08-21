<html>
<head>
	 <title> TIME </title>
	
	


<script>
 //This script gets str and sends it to Get the time
function GetTheTime(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","include/getTheTime.php?q="+str,true);
    xmlhttp.send();
  }
}
  
//Gets str and sends it to Write the Time	
function WriteTheTime(str) {
    					
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","include/writeTheTime.php?q="+str,true);
       
    xmlhttp.send();
  }
}
</script>
</head>

<body>
	
	<header>

<h1> TIME </h1>
</header>

	<?php $page ='time'; include 'include/menu.php'; ?>
	<br>
	
<!-- Buttons -->
	<div id="time">
	
		<br><button type="button" value="2" onclick="WriteTheTime(this.value)">Write The Time</button></br>
	<br><button type="button" value="1" onclick="GetTheTime(this.value)">Get the Time</button></br>
	

<br>
<div id="txtHint"><b>Time information</b></div>
	</br>
	
	</div>	

</body>
</html> 
