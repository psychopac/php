<?php
include 'db.php';
?>

<html>
    <head>
        <title>
            Signup page
        </title>

        <style>
        
            div {
                font-family: "Trebuchet MS", Helvetica, sans-serif;
                color: #110934;
            }
        
            table {
                text-align: center;
                margin: auto;
            }
        
            h2 {
                text-align: center;
                margin: auto;
            }
            
            #navbar { 
                margin: -6px -6px 10px -6px;
                padding: 16px ;
                background-color: #b2d732;
                text-align: center;
            } 
 
            #background {
                padding: 123px;
                margin: -8px -6px 2px -6px ;
                background-color: #f0f7d4;
            }

    </style>

    </head>
    <body>
        
        <div id="navbar"> Sign up page </div>
        
        <form action="usersignup.php" method="post">
        <div id="background">
        <h2>Sign-Up</h2> <br>
        <table>
            <tr>
                <td>
                    <label for="username">Username</label>
                </td>
                <td>
                    <input type="text" name="username" placeholder="Enter username" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name">Name</label>
                </td>
                <td>
                    <input type="text" name="name" placeholder="Enter name" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="age">Age</label>
                </td>
                <td>
                    <input type="text" name="age" placeholder="Enter age" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">E-mail</label>
                </td>
                <td>
                    <input type="text" name="email" placeholder="Enter email" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="phone">Phone</label>
                </td>
                <td>
                    <input type="text" name="phone" placeholder="Enter phone" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="docsex">Gender:</label>
                </td>
                <td>
                    <input type="radio" name="sex" value="M">Male
                    <input type="radio" name="sex" value="F">Female
                </td>
            </tr>
            <tr>
                <td>
                    <label for="address">Address</label>
                </td>
                <td>
                    <input type="text" name="address" placeholder="Enter address" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Password</label>
                </td>
                <td>
                    <input type="password" name="password" placeholder="Enter password" required>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center">
                    <br><button type="submit" name="submit">Signup</button>
                </td>
            </tr>
        </table>
        </div>
            
			 <br>
            <a href="update.php">Update</a>
            <a href="index.php">Login</a>
        
        <div id="footer"></div>
        
        </form>
    </body>
</html>
    
<?php
if (isset($_POST['submit'])) {
    
    $username = $_POST['username'];
	$name = $_POST['name'];
	$age = $_POST['age'];
	$email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
	$password = $_POST['password'];
    
    if(isset($_POST['sex'])) {
        $sex = $_POST['sex'];
        echo $sex.'<br>';
    }

    $sql = "insert into users (username, name, age, email, phone, sex, address, password) VALUES ('$username','$name','$age','$email','$phone','$sex','$address','$password');";
	$run_query = mysqli_query($db, $sql);
    if($run_query) {
        header("location:home.php");
    }
     else 
	header("location:usersignup.php");
}

?>