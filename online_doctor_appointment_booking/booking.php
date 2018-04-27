<?php
include 'db.php';
session_start();
?>

<html>
<head>
    <title>
        Booking page
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
            text-align: center;
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
            text-align: left;
            margin: auto;
        }
        
       #heading {
            text-align: center;
        }
        
        #footer {
            padding: 175px;
            text-align: center;
        }
        
    </style>
    
</head>
    <body>
        
        <div id="navbar">
            <a href="home.php">HOME</a>
            <a href="viewbooking.php">VIEW APPOINTMENT</a>
            <a href="delbooking.php">CANCEL APPOINTMENT</a>
        </div>
        
        <div id="background">
        <form action="booking.php" method="post">
            <div id="heading"><h2>Appointment Booking Page</h2><br>
            </div>
            
            <table>
                <tr>
                    <td>
                        <label for="doctors">Doctor</label>
                    </td>
                    <td>
                        <select name="doctors" required>
                            <option value="Dr. Phanindra V V">Dr. Phanindra V V</option>
                            <option value="Dr. Ravishankar Reddy C. R.">Dr. Ravishankar Reddy C. R.</option>
                            <option value="Dr. Sharada Shekar">Dr. Sharada Shekar</option>
                            <option value="Dr. Karunesh Kumar H S">Dr. Karunesh Kumar H S</option>
                            <option value="Dr. Jaya Bajaj">Dr. Jaya Bajaj</option>
                            <option value="Dr. Sreenath S Manikanti">Dr. Sreenath S Manikanti</option>
                            <option value="Dr. Sangeeta Gomes">Dr. Sangeeta Gomes</option>
                            <option value="Dr. Prabhat Kumar">Dr. Prabhat Kumar</option>
                            <option value="Dr. SS Kumar">Dr. SS Kumar</option>
                            <option value="Dr. Niran Uthaiah">Dr. Niran Uthaiah</option>
                            <option value="Dr. Shesh Kumar Kashi">Dr. Shesh Kumar Kashi</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="appointdate">Appointment Date</label>
                    </td>
                    <td>
                        <input type="date" name="appointdate" placeholder="Enter appointment date" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="appointslot">Appointment Slot:</label>
                    </td>
                    <td>
                        <input type="radio" name="appointslot" value="10AM-12PM">10AM-12PM
                        <input type="radio" name="appointslot" value="12PM-2PM">12PM-2PM
                        <input type="radio" name="appointslot" value="2PM-4PM">2PM-4PM
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center">
                        <br><button type="submit" name="bookbtn">Book Appointment </button>
                    </td>                    
                </tr>
            </table>
            
        <div id="footer">
        </div>
            
        </form>
        
    <?php
        if (isset($_POST['bookbtn'])) {
            $docname = $_POST['doctors'];
            $inputdate = $_POST['appointdate'];
            $appointdate = date("Y-m-d", strtotime($inputdate));
            echo $appointdate.'<br>';
                       
            if(isset($_POST['appointslot'])) {
                $appointslot = $_POST['appointslot'];
                echo $appointslot.'<br>';
            }
            
            echo $docname.'<br>';
            $loggeduser = $_SESSION['username'];
            echo $loggeduser.'<br>';
            
            $sql = "select docno from doctors where docname = '$docname'";
            $result = mysqli_query($db, $sql);
            
            while($row = mysqli_fetch_assoc($result)) {
                $docnum = $row['docno'];
                echo $docnum.'<br>';
                }
            
            $sql = "insert into booking (username, docno, docname, appointdate, appointslot) values ('$loggeduser', $docnum, '$docname', '$appointdate', '$appointslot');";
            $run_query = mysqli_query($db, $sql);
            if($run_query) {
                echo "<script>alert('Data added successfully')</script>";
            }
            else
                echo "<script>alert('Something wrong here')</script>";
        }
    
    ?>
    </div>
    </body>
</html>