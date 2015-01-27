
<html>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<style>
body{
 background:#f7f7f7;
}

</style>


<script>

$(document).ready(function(){
  $("#dispviewemp").hide();
  $("#dispempinfo").hide();
  $("#dispviewreport").hide();
  
  $("#viewemp").click(function(){
    $("#dispviewemp").show();
    $("#dispempinfo").hide();
    $("#dispviewreport").hide();
  });
  
  $("#empinfo").click(function(){
    $("#dispempinfo").show();
    $("#dispviewemp").hide();
    $("#dispviewreport").hide();
  });
  
  $("#viewreport").click(function(){
    $("#dispviewemp").hide();
    $("#dispempinfo").hide();
    $("#dispviewreport").show();
  });
  
    $('tr').click(function(){
    
    var $columns = $(this).find('td');
    
    var    empid = $columns[1].innerHTML ;
    var empname = $columns[2].innerHTML;
    var depart = $columns[3].innerHTML  ;
    var salary =  $columns[4].innerHTML;
    var age = $columns[5].innerHTML ;
    alert(age);
    
    
      //   alert("Value: " + $(this).attr("id"));
   /*      var table = $("table")[0];

var cell = table.rows[1].cells[1];

$(cell).css('background-color', 'yellow');
alert("Value="+$(cell).obj);
        // window.open("http://localhost/harshali/front/modify/index.php"+"?id="+$(this).attr("id"));
  //   var xyz=document.getElementById().value;
  */
  });
  
  
});

</script>
</head>

<body>
    
    <button id="viewemp">View Employees</button>
    <button id="empinfo">Employee Info</button>
    <button id="viewreport">View Reports</button>
    
<br>

<div id="dispviewemp">
<br>    
<form action="" method="get">
<input type="submit" name="action" value="getEmployee">
</form>

<form action="" method="get">
<input type="text" name="id" placeholder="Id"><br>
<input type="submit" name="action" value="getEmployeeById">
</form>
</div>

<br>
<div id="dispempinfo">
    <h2>Add Employee details</h2>
<form action="" method="post">
<input type="text" name="empId" placeholder="Employee Id"><br>
<input type="text" name="empName" placeholder="Employee Name"><br>
<input type="text" name="department" placeholder="Department"><br>
<input type="text" name="salary" placeholder="Salary"><br>
<input type="text" name="age" placeholder="Age"><br>
<input type="submit" name="action" value="Add Employee"><br>
</form>


<br>
<div id="mod">
<h2>Modify Employee details</h2>
<form action="" method="post">
<input type="text" name="id" placeholder="Id"><br>
<input type="text" name="empId" placeholder="Employee Id"><br>
<input type="text" name="empName" placeholder="Employee Name"><br>
<input type="text" name="department" placeholder="Department"><br>
<input type="text" name="salary" placeholder="Salary"><br>
<input type="text" name="age" placeholder="Age"><br>
<input type="submit" name="action" value="Modify Employee">
</form>
</div>


<br>
<h2>Delete Employee details</h2>
<form action="" method="post">
<input type="text" name="id" placeholder="Id"><br>
<input type="submit" name="action" value="Delete Employee">
</form>

<br>
<h2>Update Employee details</h2>
<form action="" method="post">
<input type="text" name="id" placeholder="Id"><br>
<input type="text" name="salary" placeholder="Updated Salary"><br>
<input type="submit" name="action" value="Update Employee">
</form>
</div>

<div id="dispviewreport">
    <h2>Reports</h2>
    <form>
        <input type="submit" name="action" value="Employee sort by Age">
    </form>
    <form>
        <input type="submit" name="action" value="Highest Paid employee">
    </form>
    <form>
        <input type="submit" name="action" value="Average of salary of emp">
    </form>
</div>

</body>
</html>

<?php 

require_once 'cURLRequest.php';

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
	//echo "Welcome<br>";
	switch ($_GET['action'])
	{
		case 'getEmployee': 
			//var_dump($_GET);
	    	 $curlRequest = new cURL();
	     	 $res = $curlRequest->cURL_GET('/viewAll');
                 //var_dump($res);
                 $jsonData = json_decode($res, true);
                // var_dump($jsonData);
                 echo "<table border=1>";
                 echo "<tr id='0'><th>ID</th><th>EMP ID</th><th>NAME</th><th>DEPART</th><th>SALARY</th><th>AGE</th></tr>";
                 foreach ($jsonData as $key=>$value){
                     
                   if(is_array($value)){
                       echo "<tr id=".$value['id'].">";
                    foreach ($value as $key1=>$value1){
                        
                        echo "<td>";  
                        echo $value1.' <br>';   
                        echo "</td>";
                        
                      }
                       echo "</tr>";
                    }

                }
                echo "</table>";    
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