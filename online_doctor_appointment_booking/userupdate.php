<?php
include 'db.php';
session_start();
?>

<html>
    <head>
        <title>
            Update page
        </title>
    <style>
        
        div {
            font-family: "Trebuchet MS", Helvetica, sans-serif;
            color: #110934;
            font-size: 20px;
        }        
        
        #background {
            padding: 10px;
            margin: -2px -6px 2px -6px ;
            background-color: #f0f7d4;
            text-align:left;
        }
        
        #navbar {
            padding: 20px;
            margin: -6px -6px -2px -6px;
            background-color: #B2D732;
            text-align: center;
        }
        
        #navbar a {
            text-decoration: none; 
            padding: 14px 34px; 
            color: #f8fbe9; 
            background-color: #b2d732; 
        }
        
        #navbar a:hover {
            color: #000000; 
            background-color: #e7f2bf; 
        }
        
        table {
            text-align: auto;
            margin: auto;
        }
        
        #heading {
            text-align: center;
        }
        
        #footer {
            padding: 187px;
        }

        
    </style>
    </head>
    <body>
        <div id="navbar">
            <a href="home.php">HOME</a>
        </div>
        
        <div id="background">
        <form action="userupdate.php" method="post">
        
        <div id="heading">
            <h2>Update user profile</h2>
        </div>
            
        <table>
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
                    <label for="address">Address</label>
                </td>
                <td>
                    <input type="text" name="address" placeholder="Enter address" required>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center">
                    <br><button type="submit" name="submit">Update</button>
                </td>
            </tr>
        </table>    
        
        <div id="footer"></div>
        </form>

    <?php
if (isset($_POST['submit'])) {
    
	$email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
 
    $loggeduser = $_SESSION['username'];
    echo $loggeduser;
    
    $sql = "update users set email = '$email', phone = '$phone', address = '$address' where username = '$loggeduser' " ;
	$run_query = mysqli_query($db, $sql);
    if($run_query) {
        echo "<script>alert('Data updated successfully')</script>";
    }
    else 
        echo "<script>alert('Something wrong here')</script>";
}
?>  
    
    </div>
    </body>
</html>
    