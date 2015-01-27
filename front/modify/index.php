<html>
    <body>
        
      
        
        
<?php
$id=$_REQUEST["id"];
//echo "hello ".$id;
$url = "/view/".$id;
//$curlRequest = new cURL();
            $baseUrl = "http://localhost:8000";
		$requestUrl = $baseUrl.$url;
		
		
		//echo 'calling-> '. $requestUrl; 
                $ch = curl_init($requestUrl);
		
		//set the url, number of POST vars, POST data
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	
		$res = curl_exec($ch);
		curl_close($ch);
	  $jsonData = json_decode($res, true);
	       $idd=$jsonData['id'];
               $empidd=$jsonData['empid'];
               $empnamee=$jsonData['empname'];
               $departt=$jsonData['depart'];
               $salaryy=$jsonData['salary'];
               $empagee=$jsonData['empage'];
//echo "<br><br><h2>$res</h2>";

?>
        
<div id="mod">
<h2>Modify Employee details</h2>
<table>
<form action="" method="post" >
<tr><td>ID </td><td> <input type="text" name="id" value="<?php echo $idd?>"></td></tr>
<tr><td>EMP ID </td><td> <input type="text" name="empId" value="<?php echo $empidd?>"></td></tr>
<tr><td>NAME </td><td> <input type="text" name="empName" value="<?php echo $empnamee?>"></td></tr>
<tr><td>DEPARTMENT </td><td> <input type="text" name="department" value="<?php echo $departt?>"></td></tr>
<tr><td>SALARY </td><td> <input type="text" name="salary" value="<?php echo $salaryy?>"></td></tr>
<tr><td>AGE </td><td> <input type="text" name="age" value="<?php echo $empagee?>"></td></tr>
<tr><td><input type="submit" name="action"></td><td></td></tr>
</form>
</table>
</div>
    </body>
</html>