
<html>
<head>
<style>
body{
 background:#f7f7f7;
}

</style>
</head>

<body>
<br><br>

<form action="/symfonyClient/" method="get">
<input type="submit" name="action" value="getEmployee">
</form>

<form action="/symfonyClient/" method="get">
<input type="text" name="id" placeholder="Id">
<input type="submit" name="action" value="getEmployeeById">
</form>
<br><br>

<form action="/symfonyClient/" method="post">
<input type="text" name="empId" placeholder="Employee Id">
<input type="text" name="empName" placeholder="Employee Name">
<input type="text" name="department" placeholder="Department">
<input type="text" name="salary" placeholder="Salary">
<input type="text" name="age" placeholder="Age">
<input type="submit" name="action" value="Add Employee">
</form>


<br><br>

<form action="/symfonyClient/" method="post">
<input type="text" name="id" placeholder="Id">
<input type="text" name="empId" placeholder="Employee Id">
<input type="text" name="empName" placeholder="Employee Name">
<input type="text" name="department" placeholder="Department">
<input type="text" name="salary" placeholder="Salary">
<input type="text" name="age" placeholder="Age">
<input type="submit" name="action" value="Modify Employee">
</form>


<br><br>
<form action="/symfonyClient/" method="post">
<input type="text" name="id" placeholder="Id">
<input type="submit" name="action" value="Delete Employee">
</form>

<br><br>
<form action="/symfonyClient/" method="post">
<input type="text" name="id" placeholder="Id">
<input type="text" name="salary" placeholder="Updated Salary">
<input type="submit" name="action" value="Update Employee">
</form>


</body>
</html>

<?php 

require_once 'cURL/cURLRequest.php';

if(isset($_POST) && !empty($_POST)){
	echo "Welcome<br>";
	switch ($_POST['action'])
	{
		case 'Add Employee': 
	    	 $curlRequest = new cURL();
	    	 $res = $curlRequest->cURL_POST('/add',$_POST);
			 echo "<br><br><h2>$res<h2>";							
		break;
		
		case 'Modify Employee':
			 $curlRequest = new cURL();
	    	 $res = $curlRequest->cURL_POST('/modify',$_POST);
			 echo "<br><br><h2>$res<h2>";
			
		break;
		
		case 'Delete Employee':
			 $url = "/delete/".$_POST['id'];
			 $curlRequest = new cURL();
	    	 $res = $curlRequest->cURL_POST($url,$_POST);
			 echo "<br><br><h2>$res<h2>";	    	
		break;
		
		case 'Update Employee':
			 $url = "/updateSalary/".$_POST['id'].'/'.$_POST['salary'];
			 $curlRequest = new cURL();
	    	 $res = $curlRequest->cURL_POST($url,$_POST);
			 echo "<br><br><h2>$res<h2>";		
		break;
		
		default:
			echo 'Method Not allowed.. Error:403';
		break;
	}
}

if(isset($_GET) && !empty($_GET)){
	echo "Welcome<br>";
	switch ($_GET['action'])
	{
		case 'getEmployee': 
			//var_dump($_GET);
	    	 $curlRequest = new cURL();
	    	 $res = $curlRequest->cURL_GET('/viewAll');
			 echo "<br><br><h2>$res<h2>";							
		break;
		
		case 'getEmployeeById': 
			//var_dump($_GET);
			$url = "/view/".$_GET['id'];
	    	$curlRequest = new cURL();
	    	$res = $curlRequest->cURL_GET($url);
			echo "<br><br><h2>$res<h2>";							
		break;

		default:
			echo 'Method Not allowed.. Error:403';
		break;
	}
}

?>