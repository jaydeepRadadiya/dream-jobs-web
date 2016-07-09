
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
table.c{
display:block;
margin-left:auto;
margin-right:auto;
padding-left:100;
}
table.b{
display:block;
margin-left:auto;
margin-right:auto;
padding-left:100;
}
table.a{
display:block;
margin-left:auto;
margin-right:auto;
padding-left:100;
}
h2{
color:#F8F8F8;	
}
a{
color:#F8F8F8;
};

</style>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
 </head>
 <body>
<table class="c">
 <tr><td><img src="dreamjob.jpg" class="a"></td>
<td> <img src="com.jpg" class="b"></td>
</tr>
 </table>
<?php
session_start();
 if(isset($_GET['save1']))
{  
	$connect=mysqli_connect('localhost','root','','job');
	mysqli_query( $connect," UPDATE company SET name='$_GET[name]',address='$_GET[add]',work='$_GET[work]',skill='$_GET[skill]',experince='$_GET[exp]',title='$_GET[title]',website='$_GET[web]',contact_number='$_GET[contact_no]',discreapsion='$_GET[dis]' WHERE c_id = '$_SESSION[ID]' " );
//	header('Location:company_home.php');
		
}
 if(isset($_SESSION['ID']))
	{  
        $connect=mysqli_connect('localhost','root','','job');
	    $record=mysqli_query( $connect,"SELECT * FROM company where c_id='$_SESSION[ID]' ");
		$name=mysqli_fetch_assoc($record);
        echo '<span style="color:#F8F8F8"><font size="5"><i class="fa fa-user">&nbsp;&nbsp;welcome '.$name['name'].'</i></font></span>';
		echo "<form action='log_in.php' method='GET'><input type='submit' name='logout' value='Log Out' style='float:right'/></form>";
	
	
echo "<form action='company_home.php' method='GET' >
<nav id='nav01' style='float:right'><span style='color:#F8F8F8'><font size='5'><a href='company_home.php'><i class='fa fa-home'></i>&nbsp;&nbsp;Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href='approved.php'>Applied Candidates</a></span></font></nav>
</br></br><span style='color:#F8F8F8'><font size='5'><i class='fa fa-user'>&nbsp;&nbsp;Company Details</i></font></span><hr>
<table name='com_details' class='b' height='200'>
<font size='5'>
<tr><td><span style='color:#F8F8F8'>Name : </td></span> <td><input type='text' name='name' value=".$name['name']." required></td></tr>

<tr><td><span style='color:#F8F8F8'>Contact Number : </td></span><td><input type='tel' name='contact_no'  value=".$name['contact_number']." required></td></tr>
<tr><td><span style='color:#F8F8F8'>Address :</td></span><td><input type='text' name='add' value=".$name['address']." required></td></tr>
<tr><td><span style='color:#F8F8F8'>Web_site :</td></span><td><input type='url' name='web' value='.$name[website].'  placeholder='enter url'></td></tr>

</table>


<h2><span style='color:#F8F8F8'><font size='5'><i class='fa fa-gears'>&nbsp;&nbsp;What kind of Experience/Skills you want from employe</i></font></span></h2><hr>
<table name='kind' class='a' height='200'>
<tr><td><span style='color:#F8F8F8'>Give Some Title To Your Advertisement  :</td></span> <td><input type='text' name='title' value='.$name[title].' placeholder='Title to your ad'></td></tr>
<tr><td><span style='color:#F8F8F8'>What kind of Work you are Offering : </td></span> <td><input type='text' name='work'  value=".$name['work']." ></td></tr>

<tr><td><span style='color:#F8F8F8'>Key Skills you Want : </td></span> <td><input type='text' name='skill'  value=".$name['skill']." required></td></tr>
<tr><td><span style='color:#F8F8F8'>How much Experince you want: </td></span> <td><input type='text' name='exp'  value='.$name[experince].' placeholder='0 yr onwards' required></td></tr>
<tr><td><span style='color:#F8F8F8'>Add more discreption to your advertisement  : </span></td> <td><input type='text' name='dis' value=".$name['discreapsion']." ></td></tr>
</table>
</font>
</br>
<center><input  type='submit' value='Save Form' name='save1' ></center></form>";
}
?>

</body>
</html>