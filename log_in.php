 
 <?php
session_start();
?>
 <html>
 <head>
  <html>
 <head>
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
table.c{
padding-left:120;
}
h2{
color:#F8F8F8;	
}
input{
display:block;
margin-left:auto;
margin-right:auto;
}
a:visited{
	color:#F8F8F8;
}
</style>
 <title>
 Dream Jobs LogIn
 </title>

 </head>
 <body>
 <form action="log_in.php" method="GET"><table class="c">
 <tr><td><img src="dreamjob.jpg" class="a"></td>
<td> <img src="com.jpg" class="b"></td>
</tr>
 </table>
</br></br><h2 align="center">LOG IN</h2>
 <table height="100">
 <tr><td><span style="color:#F8F8F8">ID:</span> </td><td><input type="text" name='id'  required /></td></tr>
 <tr><td><span style="color:#F8F8F8">Password:</span> </td><td><input type="password" name='password'  required /></td></tr>
</table>
 &nbsp;&nbsp;&nbsp;<input align="center" type="submit" name='submit' value="Login"  />
 
<?php

	 if(isset($_GET['logout']))
   {
	
	unset($_SESSION['ID']);
	//echo '<tr><td style="color:#ff0000"><center>You are logged Out !!</center></td></tr>';
   }
if(isset($_SESSION['ID']))
{
	$id=$_SESSION['ID'];
	if($id[0]=='u'||$id[0]=='U')

	{
		header('Location:user_home.php');
	}
    elseif($id[0]=='c'||$id[0]=='C')
	{
			header('Location:company_home.php');
    }		
}
if (isset($_GET['submit']))
	{
		 //alert("hii");
		
	 $connect=mysqli_connect('localhost','root','','job');
   
	$ID=$_GET['id'];
	if($ID[0]=='u'||$ID[0]=='U')
	{
    
	$flag=0;
	
		$record=mysqli_query($connect,"SELECT password FROM users WHERE u_id='$_GET[id]' ");
		
		if($record==TRUE)
		{
			
				
			$data=mysqli_fetch_assoc($record);
			if($data['password']== $_GET['password'])
			{	//echo 'welcome '.$data['first_name'];
				$_SESSION['ID']=$_GET['id'];
			    $flag=1;
				header('Location:user_home.php');
			}	
			
			
		}
		if($flag==0)
			echo '<tr><td style="color:#ff0000;"><center>Please Register First !!</center></td></tr>';
	
    }
	else if($ID[0]=='c'||$ID[0]=='C')
	{
    
	$flag=0;
	
		$record=mysqli_query($connect,"SELECT pass FROM company WHERE c_id='$_GET[id]' ");
		
		if($record==TRUE)
		{
		$data=mysqli_fetch_assoc($record);
			if($data['pass']== $_GET['password'])
			{	//echo 'welcome '.$data['first_name'];
				$_SESSION['ID']=$_GET['id'];
			    $flag=1;
				header('Location:company_home.php');
			}	
			
			
		}
		if($flag==0)
			echo '<tr><td style="color:#ff0000;"><center> Please Register First !!</center></td></tr>';
	
    }
	else
	{echo '<tr><td style="color:#ff0000;"><center> Please Register First !!</center></td></tr>';} 
	}
	

?>
 </br>
 <table>
<tr><td><a href="sign_up.php">New user ? Register now</a></td></tr>
<tr><td><a href="#">Forgot password ?</a></td></tr>
</table>
 </form>
 </body>
 </html>