<?php
    include 'db.php';
?>

<html>
<head>

    <title>
        Admin page
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
            padding: 126px;
        }
    
    </style>
        
    </head>
    
    <body>
        <div id="navbar">
            <a href="logout.php">LOG OUT</a>
        </div>
        
        <div id="background">
        <form action="admin.php" method="post">
        
        <div id="heading">
            <h2>Admin Page</h2>
        </div>
        
        <table>
            <tr>
                <td>
                    <label for="docname">Doctor's Name</label>
                </td>
                <td>
                    <input type="text" name="docname" placeholder="Enter Doctor's Name" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="docage">Doctor's Age</label>
                </td>
                <td>
                    <input type="text" name="docage" placeholder="Enter Doctor's Age" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="docemail">Doctor's Email</label>
                </td>
                <td>
                    <input type="text" name="docemail" placeholder="Enter Doctor's Email" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="docphone">Doctor's Phone</label>
                </td>
                <td>
                    <input type="text" name="docphone" placeholder="Enter Doctor's Phone" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="docsex">Doctor's Gender</label>
                </td>
                <td>
                    <input type="radio" name="docsex" value="M">Male
                    <input type="radio" name="docsex" value="F">Female
                </td>
            </tr>
            <tr>
                <td>
                    <label for="docaddress">Doctor's Address</label>
                </td>
                <td>
                    <input type="text" name="docaddress" placeholder="Enter Doctor's Address" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="docspecl">Doctor's Specialization</label>
                </td>
                <td>
                    <input type="text" name="docspecl" placeholder="Enter Doctor's Specialization" required>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center">
                    <br><button type="submit" name="adddoctor">Add Doctor</button>
                </td>
            </tr>
        </table>    

        <div id="footer">
        </div>
        </form>
    
    
<?php
    
    if (isset($_POST['adddoctor'])) {
        $docname = $_POST['docname'];
        $docage = $_POST['docage'];
        $docemail = $_POST['docemail'];
        $docphone = $_POST['docphone'];
//        $docsex = $_POST['docsex'];
        $docaddress = $_POST['docaddress'];
        $docspecl = $_POST['docspecl'];
        
        if(isset($_POST['docsex'])) {
            $docsex = $_POST['docsex'];
            echo $docsex.'<br>';
        }
    
        $sql = "insert into doctors ( docname, docage, docemail, docphone, docsex, docaddress, docspecl) VALUES ('$docname','$docage','$docemail','$docphone','$docsex','$docaddress','$docspecl');";
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
