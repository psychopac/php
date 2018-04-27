<?php
include 'db.php';
session_start();
?>

<html>
<head>
    <title>
        Delete booking
    </title>
    
    <style>
        
        div {
            font-family: "Trebuchet MS", Helvetica, sans-serif;
            color: #110934;
            font-size: 20px;
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
        
        #background {
            padding: 100px;
            margin: -81px -6px 2px -6px ;
            background-color: #f0f7d4;
            text-align:left;
        }
        
        #heading {
            text-align: center;
        }
        
        table {
            text-align: auto;
            margin: auto;
        }
        
        #footer {
            padding: 162px;
        }
        
    </style>
    
</head>
    <body>
        <div id="navbar">
            <a href="home.php">HOME</a>
            <a href="booking.php">BOOK APPOINTMENT</a>
            <a href="viewbooking.php">VIEW APPOINTMENT</a>
        </div>
        
        <div id="heading">
        <h2>Cancel Appointment </h2>
        </div>
        
        <div id="background">
        <form action="delbooking.php" method="post">
            
            <table>
                <tr>
                    <td>
                        <label for="appointno">Appointment No.</label>
                    </td>
                    <td>
                        <input type="text" name="appointno" placeholder="Enter appointment no" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center">
                        <br><button type="submit" name="delete">Delete appointment</button>
                    </td>
                </tr>
            </table>
            
        <div id="footer">
        </div>
            
        </form>
        
        <?php
            if (isset($_POST['delete'])) {
                $appointno = $_POST['appointno'];
                
                $sql = "delete from booking where appointno = '$appointno'";
                if (mysqli_query($db, $sql)) {
                    echo "Appointment deleted successfully";
                }
                else {
                    echo "Something's wrong here";
                }
            }
        
        ?>
    
    </div>        
    </body>
</html>