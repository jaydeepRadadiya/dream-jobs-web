 <?php
session_start();
?>
<html>
<head>
</head>
<style>

body{
background-image:url('bk.jpg')
}
img.a{	
border-radius:10px;
width:200;
height:150;
}
					input[type=submit] {
					padding:5px 15px; 
					background:#0f0f0a; 
					border:0 none;
					cursor:pointer;
				   -webkit-border-radius: 5px;
				    border-radius: 5px; 
					font-size:0.4cm;
					color:white;
}
img.b{	
width:90;
height:50;
border-radius:40%;
}
table{
display:block;
margin-left:auto;
margin-right:auto;
}
table.a{
padding-left:20;	
}
table.b{
padding-left:200;		
}
table.c{
padding-left:100;		
}
h2{
color:#F8F8F8;	
}
input.v{
display:block;
margin-left:auto;
margin-right:auto;
}
</style>

<title>
Create Company Profile
</title>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

</head>
<body>
<table class="c">
 <tr><td><img src="dreamjob.jpg" class="a"></td>
<td> <img src="com.jpg" class="b"></td>
</tr>
 </table>

<form action='log_in.php' method='GET'><input type='submit' name='logout' value='Log Out' style='float:right'/></form>
<form action="company_detail.php" method="GET">
<h2><i class="fa fa-suitcase">&nbsp;&nbsp;Company Details</h2></i><hr></br></br>
<table name="com_details" class="a" height="200">
<tr><td><span style="color:#F8F8F8">Name :</style> </td> <td><input type="text" name="name" required></td></tr>

<tr><td><span style="color:#F8F8F8">Contact Number :</style> </td><td><input type="tel" name="contact_no" required></td></tr>
<tr><td><span style="color:#F8F8F8">Address :</style></td><td><input type="text" name="add" required></td></tr>
<tr><td><span style="color:#F8F8F8">Web_site :</style></td><td><input type="url" name="web" placeholder="enter url"></td></tr>

</table>


<h2><i class="fa fa-gears">&nbsp;&nbsp;What kind of Experience/Skills you want from employe</i></h2><hr></br></br>
<table name="kind" class="b" height="200">
<tr><td><span style="color:#F8F8F8">Give Some Title To Your Advertisement  :</span> </td> <td><input type="text" name="title" placeholder="Title to your ad"></td></tr>
<tr><td><span style="color:#F8F8F8">What kind of Work you are Offering :</span> </td> <td><input type="text" name="work" ></td></tr>

<tr><td><span style="color:#F8F8F8">Key Skills you Want :</span> </td> <td><input type="text" name="skill" required></td></tr>
<tr><td><span style="color:#F8F8F8">How much Experince you want:</span> </td> <td><input type="text" name="exp" placeholder="0 yr onwards" required></td></tr>
<tr><td><span style="color:#F8F8F8">Add more discreption to your advertisement  :</span> </td> <td><input type="text" name="discreaption"></td></tr>
</table>
</br>
<input class="v "type="submit" value="submit" name="submit2">


<?php

if(isset($_GET['submit2']))
{  
	$connect=mysqli_connect('localhost','root','','job');
   
	mysqli_query( $connect," UPDATE company SET name='$_GET[name]',address='$_GET[add]',work='$_GET[work]',skill='$_GET[skill]',experince='$_GET[exp]',title='$_GET[title]',website='$_GET[web]',contact_number='$_GET[contact_no]',discreapsion='$_GET[discreaption]' WHERE c_id = '$_SESSION[ID]' " );
   //mysqli_query($connect,"UPDATE company SET name='oracles' where c_id = 'cjay' ");
	header('Location:company_home.php');
		
}
?>
</form>
</body>
</html>