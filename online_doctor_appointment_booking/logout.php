<?php
session_start();
?>

<html>
    <head>
        <title>
            logout page
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
        
        #footer {
            padding: 225px;
        }
        
        #heading {
            text-align: center;
        }
        
    </style>
    </head>
    <body>
        
        <div id="navbar">
            <a href="index.php">LOGIN</a>
        </div>
        
        <div id="background">
        
        <div id="heading">
            <h2>Logout page</h2> <br>
        </div>

        <div id="footer">
        </div>
            
    <?php
        session_unset();
        session_destroy();
        if($_SESSION) {
        echo "You have successfully logged out". "<br>";
        }
        else {
            echo "Something is wrong here".'<br>';
        }
        
    ?>
    </div>    
    </body>
</html>
