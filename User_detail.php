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
img.a{	
border-radius:10px;
width:200;
height:150;
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
	padding-left:125;
}
table.b{
	padding-left:20;
}
table.c{
	padding-left:120;
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
</head>
<title>
Create Profile
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
<form action="User_detail.php" method="GET">
<h2><i class="fa fa-male">&nbsp;&nbsp;&nbsp;Personal Details</i></h2><hr>
<table name="personal_details" height="200">
<tr><td><span style="color:#F8F8F8">Name :</span> </td> <td><input type="text" name="name" required></td></tr>
<tr><td><span style="color:#F8F8F8">Gender :</span> </td><td><input type="radio" name="gen" value="MALE" checked><span style="color:#F8F8F8">MALE</span>  <input type="radio" value="FEMALE" name="gen"><span style="color:#F8F8F8">FEMALE</span></td></tr>
<tr><td><span style="color:#F8F8F8">Contact Number : </span></td><td><input type="tel" name="contact_no" required></td></tr>
<tr><td><span style="color:#F8F8F8">Location :</span></td><td><input type="text" name="location" required></td></tr>
</table>
<h2><i class="fa fa-graduation-cap">&nbsp;&nbsp;&nbsp;Educational Details</i></h2><hr>
<table name="edu_details" class="a" height="200">
<tr><td><span style="color:#F8F8F8">Institute Name : </span></td> <td><input type="text" name="inst_name" placeholder="enter institute name from where you passout" size="40"required></td></tr>
<tr><td><span style="color:#F8F8F8">Degree :</span> </td> <td><input type="text" name="degree" placeholder="enter your degree here" required></td></tr>
<tr><td><span style="color:#F8F8F8">Year of Passout :</span> </td> <td><input type="month" name="year_passout" required></td></tr>
</table>

<h2><i class="fa fa-gears">&nbsp;&nbsp;&nbsp;Experience/Skills</i></h2><hr>
<table name="edu_details" class="b" height="200">
<tr><td><span style="color:#F8F8F8">Total year Experience : </span></td> <td><input type="text" name="exp" value="0 yr"></td></tr>
<tr><td><span style="color:#F8F8F8">Key Skills :</span> </td> <td><input type="text" name="skill" placeholder="enter your key skills" required></td></tr>
<tr><td><span style="color:#F8F8F8">Achivements : </span></td> <td><input type="text" name="achivement" required></td></tr>
</table>
</br></br></br></br>
<input class="v" type="submit" value="submit" name="submit1">
<?php

if(isset($_GET['submit1']))
{  
	$connect=mysqli_connect('localhost','root','','job');
	mysqli_query( $connect," UPDATE users SET name='$_GET[name]',gender='$_GET[gen]',contact_number='$_GET[contact_no]',location='$_GET[location]',skill='$_GET[skill]',exprience='$_GET[exp]',institute='$_GET[inst_name]',degree='$_GET[degree]',passout='$_GET[year_passout]',achivement='$_GET[achivement]' WHERE u_id = '$_SESSION[ID]' " );
//	mysqli_query($connect,"UPDATE users SET first_time = 'y',name='$_GET[name]' where u_id = 'ujay' ");
	header('Location:user_home.php');
		
}
?>
</form>
</body>
</html>