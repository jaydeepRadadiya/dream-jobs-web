 <html>
 <head>
 <title>
 Dream jobs
 </title>
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
	padding-left:125;
}
table.b{
	padding-left:120;
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
a{
color:#F8F8F8;	
}
</style>
 </head>
 
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
 <body>
<table class="c">
 <tr><td><img src="dreamjob.jpg" class="a"></td>
<td> <img src="com.jpg" class="b"></td>
</tr>
 </table>
<?php
session_start();
 if(isset($_GET['save']))
{  
	$connect=mysqli_connect('localhost','root','','job');
	mysqli_query( $connect," UPDATE users SET name='$_GET[name]',gender='$_GET[gen]',contact_number='$_GET[contact_no]',location='$_GET[location]',skill='$_GET[skill]',exprience='$_GET[exp]',institute='$_GET[inst_name]',degree='$_GET[degree]',passout='$_GET[year_passout]',achivement='$_GET[achivement]' WHERE u_id = '$_SESSION[ID]' " );
//	mysqli_query($connect,"UPDATE users SET first_time = 'y',name='$_GET[name]' where u_id = 'ujay' ");
//	header('Location:user_home.php');
		
}
 if(isset($_SESSION['ID']))
	{  
        $connect=mysqli_connect('localhost','root','','job');
	    $record=mysqli_query( $connect,"SELECT * FROM users where u_id='$_SESSION[ID]' ");
		$name=mysqli_fetch_assoc($record);
        echo '<span style="color:#F8F8F8"><font size="10"><i class="fa fa-user">&nbsp;&nbsp;welcome '.$name['name'].'</i></font></span>';
		echo "<form action='log_in.php' method='GET'><input type='submit' name='logout' value='Log Out' style='float:right'/></form>";
	
	
echo"<form action='user_home.php' method='GET' >
<nav id='nav01' style='float:right'><span style='color:#F8F8F8'><font size='5'><a href='user_home.php'><i class='fa fa-home'>&nbsp;&nbsp;</i>Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;<i class='fa fa-suitcase'></i>&nbsp;&nbsp;<a href='find_jobs.php'>Find Jobs</a></span></font></nav>
<h2><span style='color:#F8F8F8'><font size='5'><i class='fa fa-male'></i>&nbsp;&nbsp;&nbsp;Personal Details</span></font></h2><hr>
<table name='personal_details' height='200'>
<font size='5'>
<tr><td><span style='color:#F8F8F8'>Name : </span></td> <td><input type='text' name='name' value='".$name['name']."' required></td></font></tr>";
if($name['gender']=='MALE')
{
echo " <tr><td><span style='color:#F8F8F8'>Gender : </span></td><td><input type='radio' name='gen' value='MALE' checked>MALE  <input type='radio' name='gen' value='FEMALE' >FEMALE</td></tr>";
}
elseif($name['gender']=='FEMALE')
{
echo " <tr><td><span style='color:#F8F8F8'>Gender : </span></td><td><input type='radio' name='gen' value='MALE' >MALE  <input type='radio'  name='gen value='FEMALE' cheaked>FEMALE</td></tr>";
}
echo "
<tr><td><span style='color:#F8F8F8'>Contact Number : </span></td><td><input type='tel' name='contact_no' value='".$name['contact_number']."' required></td></tr>
<tr><td><span style='color:#F8F8F8'>Location : </span></td><td><input type='text' name='location' value='".$name['location']."'required></td></tr>
</font></table>
<h2><span style='color:#F8F8F8'><font size='5'><i class='fa fa-graduation-cap'></i>&nbsp;&nbsp;&nbsp;Educational Details</span></span></h2><hr>
<table name='edu_details' height='200' class='b'>
<font size='5'>
<tr><td><span style='color:#F8F8F8'>Institute Name :</span> </td> <td><input type='text' name='inst_name' placeholder='enter institute name from where you passout' value='".$name['institute']."' size='40'required></td></tr>
<tr><td><span style='color:#F8F8F8'>Degree : </span></td> <td><input type='text' name='degree' placeholder='enter your degree here' value='".$name['degree']."' required></td></tr>
<tr><td><span style='color:#F8F8F8'>Year of Passout : </span></td> <td><input type='month' name='year_passout' value='".$name['passout']."'required></td></tr>
</font>
</table>

<h2><span style='color:#F8F8F8'><font size='5'><i class='fa fa-gears'></i>&nbsp;&nbsp;&nbsp;Experience/Skills</span></font></h2><hr>
<table name='edu_details' height='200'>
<font size='5'>
<tr><td><span style='color:#F8F8F8'>Total year Experience : </span></td> <td><input type='text' name='exp' value='".$name['exprience']."'></td></tr>
<tr><td><span style='color:#F8F8F8'>Key Skills : </span></td> <td><input type='text' name='skill' placeholder='enter your key skills' value=' ".$name['skill']."' required></td></tr>
<tr><td><span style='color:#F8F8F8'>Achivements : </span></td> <td><input type='text' name='achivement' value='".$name['achivement']."' required></td></tr>
</font>
</table>
</br>
<input type='submit' value='Save Form' name='save'></form>";
	}
?>

</body>
</html>