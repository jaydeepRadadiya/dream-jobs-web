<?php
session_start();
?>
 <html>
 <head>
 <title>
 Company Registreation
 </title>
  <script >
  
function validate()
{    
document.getElementById("val_cid").style.color='black';
 document.getElementById("val_cpass").style.color='black';
      var x=document.getElementById("cid").value;
	  var y=document.getElementById("cpass").value;
	  var z=document.getElementById("ccpass").value;
		if(x[0]!='c'&&x[0]!='C')
		{
			document.getElementById("val_cid").style.color='red';
			document.com_reg.cid.focus() ;
            return false;
		}
      if( document.com_reg.cpass.value == "" || document.com_reg.cpass.value.length < 8 || document.com_reg.cpass.value.length > 15)
         {
            //alert( "Please provide a password of 6-20 length" );
             document.getElementById("val_cpass").style.color='red';
			document.com_reg.cpass.focus() ;
            return false;
         } 
	
		 if(y!=z)
		 {
			document.getElementById("match").innerHTML = "<span style='color:red;'> Password Not Match!</span>";
			document.com_reg.ccpass.focus() ;
            return false;
	     }
	
		
}
</script>
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

<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
 </head>
 <body>
 <table class="c">
 <tr><td><img src="dreamjob.jpg" class="a"></td>
<td> <img src="com.jpg" class="b"></td>
</tr>
 </table>
 <span style="color:#F8F8F8;float:right"><font size="5"><nav id="nav01"><a href='sign_up.php'>User</a> &nbsp;&nbsp;|&nbsp;&nbsp;<a href='company_reg.php'>Company</a></nav></font></span>
 <form name="com_reg" onsubmit="return validate()" action="company_reg.php" method="GET">
 <table class="a" height="200">
 <h2><i class="fa fa-suitcase"> &nbsp;&nbsp;Create Account </i></h2><hr>
 <tr><td><span style="color:#F8F8F8">Company ID : </span></td><td><input type="text" name='cid' id="cid" required /></td><td><small id='val_cid'><span style="color:#F8F8F8">Company id must start with C/c</span></small></td></tr>
  <tr><td><span style="color:#F8F8F8">Email :</span> </td><td><input type="email" name='uemail'  required /></td></tr>
 <tr><td><span style="color:#F8F8F8">Password :</span> </td><td><input type="password" name='cpass' id="cpass" required /></td><td><small id="val_cpass"><span style="color:#F8F8F8">password must between 8-15 digits</span></small></td></tr>
  <tr><td><span style="color:#F8F8F8">Confirm Password : </span></td><td><input type="password" name='ccpass'  id="ccpass" required /></td><td><small id='match'></small></td></tr>
  </table>
 </br></br>
 <input class="v" type="submit" name='Submit' value="SignUp"  />
 <?php

if(isset($_GET['Submit']))
{
	$connect=mysqli_connect('localhost','root','','job');

	// Check that email_id exist or not ...

	$flag=0;
	
	
	$email=mysqli_query($connect,"SELECT email FROM company");
	while($_data=mysqli_fetch_assoc($email)) // Retrive rows of table into array of data
	{
		if($_data['email']==$_GET['uemail'])
		{
			echo "<tr><td style='color:#ff0000'>Email_Id already exist!!</td></tr>";
			$flag=1;
		}
	}
	$c_id=mysqli_query($connect,"select c_id from company");
	while($_data=mysqli_fetch_assoc($c_id)) // Retrive rows of table into array of data
	{
		if($_data['c_id']==$_GET['cid'])
		{
			echo "<tr><td style='color:#ff0000'>User Id already exist!!</td></tr>";
			$flag=1;
		}
	}

	if($flag==0)
	{
		mysqli_query($connect,"INSERT INTO company(c_id,email,pass) VALUES( '$_GET[cid]','$_GET[uemail]','$_GET[cpass]' ) ");
        $_SESSION['ID']=$_GET['cid'];
		header('Location:company_detail.php');
	}
}
?>
 
 </form>
 </body>
 </html>