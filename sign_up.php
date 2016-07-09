 <?php
session_start();
?>
 <html>
 <head>
 <title>
 User Registreation
 </title>
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
padding-left:40;	
}
table.c{
padding-left:40;		
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

 
  <script >
  
function validate()
{    
document.getElementById("val_uid").style.color='black';
 document.getElementById("val_pass").style.color='black';
      var x=document.getElementById("uid").value;
	  var y=document.getElementById("upass").value;
	  var z=document.getElementById("ucpass").value;
		if(x[0]!='u'&&x[0]!='U')
		{
			document.getElementById("val_uid").style.color='red';
			document.user_reg.uid.focus() ;
            return false;
		}
      if( document.user_reg.upass.value == "" || document.user_reg.upass.value.length < 8 || document.user_reg.upass.value.length > 15)
         {
            //alert( "Please provide a password of 6-20 length" );
             document.getElementById("val_pass").style.color='red';
			document.user_reg.upass.focus() ;
            return false;
         } 
	
		 if(y!=z)
		 {
			document.getElementById("match").innerHTML = "<span style='color:red;'> Password Not Match!</span>";
			document.user_reg.ucpass.focus() ;
            return false;
	     }
	
		
}
</script>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
 </head>
 <body>
 <table class="c">
 <tr><td><img src="dreamjob.jpg" class="a"></td>
<td> <img src="com.jpg" class="b"></td>
</tr>
 </table>
  <span style="color:#F8F8F8;float:right"><font size="5"><nav id="nav01"><a href='sign_up.php'>User</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href='company_reg.php'>Company</a></nav></font></span>
 <form name="user_reg" onsubmit="return validate()" action="sign_up.php" method="GET">
 <table class="a" height="200">
 <h2><i class="fa fa-user">&nbsp;&nbsp;Create Account</i> </h2><hr><br>
 <tr><td><span style="color:#F8F8F8">User_ID : </span></td><td><input type="text" name='uid' id="uid" required /></td><td><small id='val_uid'><span style="color:#F8F8F8">user id must start with U/u</span></small></td></tr>
  <tr><td><span style="color:#F8F8F8">Email :</span> </td><td><input type="email" name='uemail'  required /></td></tr>
 <tr><td><span style="color:#F8F8F8">Password :</span> </td><td><input type="password" name='upass' id="upass" required /></td><td><small id="val_pass"><span style="color:#F8F8F8">password must between 8-15 digits</span></small></td></tr>
  <tr><td><span style="color:#F8F8F8">Confirm Password :</span> </td><td><input type="password" name='ucpass'  id="ucpass" required /></td><td><small id='match'></small></td></tr>
  </table></br></br></br>
 <input type="submit" name='Submit' value="SignUp" class="v" />
 
<?php

if(isset($_GET['Submit']))
{
	$connect=mysqli_connect('localhost','root','','job');

	// Check that email_id exist or not ...

	$flag=0;
	
	
	$email=mysqli_query($connect,"SELECT email FROM users");
	while($_data=mysqli_fetch_assoc($email)) // Retrive rows of table into array of data
	{
		if($_data['email']==$_GET['uemail'])
		{
			echo "<tr><td style='color:#ff0000'>Email_Id already exist!!</td></tr>";
			$flag=1;
		}
	}
	$u_id=mysqli_query($connect,"select u_id from users");
	while($_data=mysqli_fetch_assoc($u_id)) // Retrive rows of table into array of data
	{
		if($_data['u_id']==$_GET['uid'])
		{
			echo "<tr><td style='color:#ff0000'>User Id already exist!!</td></tr>";
			$flag=1;
		}
	}

	if($flag==0)
	{
		mysqli_query($connect,"INSERT INTO users(u_id,email,password) VALUES( '$_GET[uid]','$_GET[uemail]','$_GET[upass]' ) ");
		$_SESSION['ID']=$_GET['uid'];
		header('Location:User_detail.php');
		
	}
}
?>
 </form>
 </body>
 </html>