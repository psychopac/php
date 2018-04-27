<?php
   include 'db.php';
   session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            Login page
        </title>
    
    <style>
        
        div {
            font-family: "Trebuchet MS", Helvetica, sans-serif;
            color: #110934;
            font-size: 20px;
        }    
        
        table {
            text-align: center;
            margin: auto;
        }
        
        #navbar { 
            margin: -20px -6px -20px -6px; 
            padding: 1px;  
            text-align: center; 
            background-color: #b2d732;
            text-shadow: 1px 1px #110934;
        } 

        #background {
            text-align: center;
            padding: 100px;
            margin: 22px -6px 2px -6px ;
            background-color: #f0f7d4;
        }

        #footer {
            padding: 87px;
            margin: -2px -6px 2px -6px ;
            background-color: #f0f7d4;
            text-align: center;
        }


        
    </style>
    </head>
    <body>
        
        <div id="navbar">
            <h1>ONLINE DOCTOR APPOINTMENT BOOKING SYSTEM</h1>
        </div>

        
        <div id="background">
        <form action="index.php" method="post">
            <h2>Login</h2>
            <table>
                <tr>
                    <td>
                        <label for="username">Username</label>
                    </td>
                    <td>
                        <input type="text" name="username" placeholder="enter username" required><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Password</label>
                    </td>
                    <td>
                        <input type="password" name="password" placeholder="enter password" required><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center">
                        <br><button type="submit" name="login">Login</button><br>
                    </td>
                </tr>
            </table>

            </form>
        </div>
        
        <div id="footer">
        </div>
        
<?php
     if (isset($_POST['login'])) {
     	  
     	 $username = mysqli_real_escape_string($db, $_POST['username']);
     	 $password = mysqli_real_escape_string($db, $_POST['password']);

     	 $query = " select * from users where username = '$username' and password ='$password' ";
     	 $result = mysqli_query($db , $query);

         if ($username=='admin' && $password=='admin') {
            header("location:admin.php"); 
         }
         
         elseif ( mysqli_num_rows($result) == 1) { 	    
     	     echo "<script>alert('Login Successfull!')</script>";
             $_SESSION['username'] = $username;
             header("location:home.php");
     	  }
         
         else {
     	  	   echo "<script>alert('Login Failed')</script>";
     	  }
     }
    
?>        
    </body>
</html>
