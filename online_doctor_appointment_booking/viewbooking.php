<?php
include 'db.php';
session_start();
?>

<html>
<head>
    <title>
        View appointment
    </title>
    
    <style>
        
        div {
            font-family: "Trebuchet MS", Helvetica, sans-serif;
            color: #110934;
            font-size: 20px;
        }        
        
        #anchor {
            text-align: center;
        }
        
        #background {
            padding: 100px;
            margin: -81px -6px 2px -6px ;
            background-color: #f0f7d4;
            text-align:left;
        }
        
        #footer {
            padding: 128px;
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
        
    </style>
    

</head>
    <body>
    <div id="navbar">
        <a href="home.php">HOME</a>
        <a href="booking.php">BOOK APPOINTMENT</a>
        <a href="delbooking.php">DELETE APPOINTMENT</a>
    </div>
        
    <div id="heading">
        <h2>Appointment information</h2>
    </div>
        
    <div id="background">
    <form action="viewbooking.php" method="post">
        <table>
            <tr>
                <td>
                    <label for="appointno">Appointment no.</label>
                </td>
                <td>
                    <input type="text" name="appointno" placeholder="Enter appointment no">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center">
                    <br><button type="submit" name="check">View Appointment</button>
                </td>
            </tr>
        <br>
        </table>
        
        <div id="footer">
        </div>
        
        <?php
        
            if (isset($_POST['check'])) {
                $appointno = $_POST['appointno'];
                $sql = "select * from booking where appointno = '$appointno'";
                $result = mysqli_query($db, $sql);
                
                if (mysqli_num_rows($result)>0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<br>"."Hello, ".$row["username"]."<br>";
                        echo "Your appointment number is: ".$row["appointno"]."<br>";
                        echo "Your doctor is: ".$row["docname"]."<br>";
                        
                        $datefinal = date("d-m-Y", strtotime($row["appointdate"]));
                        
                        echo "Your appointment date and time is: ".$datefinal.", ".$row["appointslot"],"<br>";
                    }
                }
                else 
                    echo "Something's not right.";
            }
            
        ?>
            
    </form>
    </div>
        
    </body>
</html>
