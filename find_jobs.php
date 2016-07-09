
<?php 
session_start();
?> <html>
 <head>
 <title>
 Dream jobs
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
button
{
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
table.c{
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
input.v{
    line-height: 12px;
    width: 18px;
    font-size: 8pt;
    font-family: tahoma;
    margin-top: 1px;
    margin-right: 2px;
    position: absolute;
    top: 0;
    right: 0;
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

<?php

 if(isset($_GET['apply']))
 {


  $connect=mysqli_connect('localhost','root','','job');
	  $record1=mysqli_query($connect,"SELECT c_id FROM approved WHERE u_id = '$_SESSION[ID]' ");
	 
      $flag=0;
	  while($data1=mysqli_fetch_assoc($record1))
	 {
				$a=$_GET['apply'];
				$b=$data1['c_id'];
	//			echo '<p>hey</p>';
				if(strcmp($a,$b))
				{
				
					$flag=1;
				}
				
	  }
	if($flag==0)
	{
		mysqli_query( $connect,"INSERT INTO approved(c_id,u_id) VALUES( '$_GET[apply]','$_SESSION[ID]' )  ");
    } 

 }
 

 if(isset($_SESSION['ID']))
	{  
        $connect=mysqli_connect('localhost','root','','job');
	    $record=mysqli_query( $connect,"SELECT name FROM users where u_id='$_SESSION[ID]' ");
		$name=mysqli_fetch_assoc($record);
		echo "<span style='color:#F8F8F8'><font size='5'><nav id='nav01' style='float:right'><a href='user_home.php' ><i class='fa fa-home'></i>&nbsp;&nbsp;Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;<i class='fa fa-suitcase'><a href='find_jobs.php'>find jobs</i></a></span></nav>";
        echo '</br></br><span style="color:#F8F8F8"><font size="7"><i class="fa fa-user">&nbsp;&nbsp;welcome '.$name['name'].'</i></span></br></br>';
		echo "<form action='log_in.php' method='GET'><input class='v' type='submit' name='logout' value='Log Out' style='float:right'/></form></br></br>";
		//echo "hii";
		
		
		
		
$record=mysqli_query( $connect,"SELECT * FROM company ");
		$a=1;
		while($data=mysqli_fetch_assoc($record))
		{
				//echo 'welcome '.$data['first_name'];
				echo '<table width="1300" height="200">
				      
				      <tr><td><font size="5"><span style="color:#F8F8F8">('.$a.')&nbsp;&nbsp;Job Title : '.$data['title'].'</span></font></td></tr>
					  <tr><td><font size="5"><span style="color:#F8F8F8">Company name : '.$data['name'].'</span></font></td></tr>
					  <tr><td><font size="5"><span style="color:#F8F8F8">Address : '.$data['address'].'</span></font></td></tr>
				      <tr><td><font size="5"><span style="color:#F8F8F8">Email id : '.$data['email'].'</span></font></td></tr><tr><td><font size="5"> <span style="color:#F8F8F8">contact no : '.$data['contact_number'].'</span></font></td></tr>
					  <tr><td><font size="5"><span style="color:#F8F8F8">Work : '.$data['work'].'</span></font></td></tr>
					   <tr><td><font size="5"><span style="color:#F8F8F8">Skill Required: '.$data['skill'].'</span></font></td></tr><tr> <td><font size="5"><span style="color:#F8F8F8">    Experince required : '.$data['experince'].'</span></font></td></tr>
					   <tr><td><font size="5"> <span style="color:#F8F8F8">'.$data['discreapsion'].'</span></font></td></tr>
					   
					  </table>
					  
					  <form action="find_jobs.php" method="GET"><button name="apply" type="submit" value="'.$data['c_id'].'"  style="float:right;" >Apply</button></form>
					  </br><hr>
				';
				$a++;
		}
		
	}
?>
</body>
</html>
