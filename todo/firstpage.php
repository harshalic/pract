<html>
    <head>
        <title></title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <style>
            
            div{
                display:none;
            }
        </style>
        <script>
        function validate(){
           // document.write("hello");
          
            if(document.getElementById("name").value===null){
                alert("Enter name");
            }
        }
/*    $(document).ready(function(){
        
     //   $("#sign").hide();
        
        $("#sig").click(function(){
            $("#sign").show();
            $("#logi").hide();
        });
        $("#log").click(function(){
            $("#logi").show();
            $("#sign").hide();
        });
});
*/
        </script>
    </head>
    <body>
        
        
       
           <input type="submit" name="login" value="Login" id="log">
           <input type="button" name="sign_up" value="Sign Up" id="sig">
       
       
       <div id="sign" >
        <table border="1">
            <form method="post" action="sign1.php" onsubmit="return validate()">
                <tr><th>Name</th><th>  <input type="text" name="name" id="name"></th></tr>
                <tr><th>Set Password</th><th><input type="password" name="pass1"></th></tr>
                <tr><th>Confirm Password</th><th><input type="password" name="pass2"></th></tr>
                <tr><th><input type="submit" value="Sign Up" ></th></tr>
            </form>
        </table>
       </div>
           
        <div id="logi" >
        <table border="1">
            <form method="post" action="login1.php">
                <tr><th>Name</th><th>  <input type="text" name="lname" id="name"></th></tr>
                <tr><th>Password</th><th><input type="password" name="lpass"></th></tr>
                <tr><th><input type="submit" value="Login" ></th></tr>
            </form>
        </table>
       </div>
      <?php
      echo $_SERVER['HTTP_ACCEPT'];
      ?>
     
    </body>
</html>