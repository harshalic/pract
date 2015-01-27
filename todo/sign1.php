<html>
    <head>
       
        <title></title>
    </head>
    <body>
        <?php
            
        @$name=$_POST["name"];
        @$pass1=$_POST["pass1"];
        @$pass2=$_POST["pass2"];
        if($name==NULL||$pass1==NULL||$pass2==NULL){
            echo "ENTER ";
        }
    // var_dump($pass1);
     //var_dump($pass2);
        if($pass1!==$pass2){
            echo 'No match';
            exit();
        }

     echo "You are registered to our site <br> Please log in <br>";
     echo "<a href=".$_SERVER['HTTP_REFERER'].">To LOGIN </a>";
    // echo "<input type=button onClick='location.href=".$_SERVER['HTTP_REFERER']."' value='LOGIN'>";
       
$con=mysql_connect("localhost","root","");
 
$sql="CREATE DATABASE todo";
mysql_query($sql,$con);

mysql_select_db("todo");

$sql1="CREATE TABLE signup (name CHAR(30),password VARCHAR(20))";
mysql_query($sql1,$con);


$res = mysql_query("SELECT * FROM signup WHERE name='$name'",$con);
$flag=0;
while($row = mysql_fetch_array($res)) {
            
            echo $row['name']. " ".$row['password'];
            $flag=1;
            }
if($flag==1){
    echo "<br> the entry is already present";
    exit();
}

$sql3="INSERT INTO signup(name,password )
VALUES ('$name','$pass1')";
mysql_query($sql3,$con);


echo "<table border='1'>
<tr>
<th>Name</th><th>Password</th>
</tr>";
$result = mysql_query("SELECT * FROM signup",$con);

        while($row = mysql_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$row['name']."</td> <td> ".$row['password']."</td>";
            echo "</tr>";
            }

        ?>
     
    </body>
</html>