
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
button
{					padding:5px 15px; 
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
 
 if(isset($_SESSION['ID']))
	{  
        $connect=mysqli_connect('localhost','root','','job');
	    $record=mysqli_query( $connect,"SELECT * FROM company where c_id='$_SESSION[ID]' ");
		$name=mysqli_fetch_assoc($record);
        echo '<span style="color:#F8F8F8"><font size="5"><i class="fa fa-suitcase">&nbsp;&nbsp;welcome '.$name['name'].'</i></font></span>';
		echo "<form action='log_in.php' method='GET'><input type='submit' name='logout' value='Log Out' style='float:right'/></form>";
    }
echo "</br></br><nav id='nav01' style='float:right'><span style='color:#F8F8F8'><font size='5'><a href='company_home.php'><i class='fa fa-home'></i>&nbsp;&nbsp;Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href='approved.php'>Applied Candidates</a></span></font></nav>";

     
	  $record1=mysqli_query($connect,"SELECT u_id FROM approved WHERE c_id = '$_SESSION[ID]' ");
	  
      while($data1=mysqli_fetch_assoc($record1))
	  {
         //echo $data1['u_id'] ;
	     $record2=mysqli_query($connect,"SELECT * FROM users WHERE u_id= '$data1[u_id]' ");
         $data2=mysqli_fetch_assoc($record2);
		  
        echo '<table>
				    <font size="5" style="float:left"> 
					  <tr><td><span style="color:#F8F8F8">NAME : '.$data2['name'].'</span></td></tr>
					  <tr><td><span style="color:#F8F8F8"> Address : '.$data2['location'].'</span></td></tr>
				      <tr><td><span style="color:#F8F8F8">Email : '.$data2['email'].'</span></td><tr>
					 <tr><td><span style="color:#F8F8F8"> contact_no :  '.$data2['contact_number'].'</span></td></tr>
					   <tr><td><span style="color:#F8F8F8">Skill : '.$data2['skill'].'</span></td> <td><span style="color:#F8F8F8">    Experince : '.$data2['exprience'].'</span></td></tr>
					   <tr><td><span style="color:#F8F8F8">Institute : '.$data2['institute'].'</span></td><td><span style="color:#F8F8F8"> Degree : '.$data2['degree'].'</span></td><td><span style="color:#F8F8F8">'.$data2['passout'].'</span></tr>
					   <tr><td><span style="color:#F8F8F8">Achivement : '.$data2['achivement'].'</span></td></tr>
					  </table>
					  <form action="#" method="GET"><button name="accept" type="submit" ">Accept</button></form>
					  </br>
				';	
	
				
	 }
?>
</body>
</html>