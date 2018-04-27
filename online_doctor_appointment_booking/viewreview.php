<?php
    include 'db.php';
    session_start();
?>

<html>
<head>
    <title>
        Reviews Page
    </title>
        
    <style>
    
        div {
            font-family: "Trebuchet MS", Helvetica, sans-serif;
            color: #110934;
            font-size: 20px;
        }
            
        #navbar { 
            margin: -6px -6px 10px -6px;
            padding: 16px ;
            background-color: #b2d732;
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
            padding: 80px;
            margin: -8px -6px -16px -6px ;
            background-color: #f0f7d4;
            text-align: center;
        }
        
        #heading {
            text-align: center;
        }
        
        #footer {
            padding: 86px;
            margin: -2px -6px 2px -6px;
            background-color: #f0f7d4;
            text-align: center;
        }
        
        
    </style>
        
</head>
    <body>
        <div id="navbar">
            <a href="home.php">Homepage</a>
        </div>
        
        <div id="background">
            
        <form action="viewreview.php" method="post">
            
            <div id="heading">
                <h2>Reviews posted by users</h2> <br><br>
            </div>
            
        </form>
            
        <?php
                $sql = "select * from review;";
                $result = mysqli_query($db, $sql);
                if (mysqli_num_rows($result)>0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<br>"."Review by ".$row["username"]." for ".$row["docname"]."."."<br>"."Rating given is ".$row["rating"]." and feedback is ".$row["comment"]."<br>"."<hr>";
                    }
                }
        ?>
            
        </div>
        
        <div id="footer">
            </div>
        
    </body>
</html>