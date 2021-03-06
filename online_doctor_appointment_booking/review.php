<?php
include 'db.php';
session_start();
?>

<html>
<head>
    <title>
        Review Page
    </title>
    
    <style>
       
        div {
            font-family: "Trebuchet MS", Helvetica, sans-serif;
            color: #110934;
            font-size: 20px;
        }
        
        table {
            text-align: left;
            margin: 0 auto;
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
        
        #heading {
            text-align: center;
        }
 
        #background {
            padding: 80px;
            margin: -8px -6px -16px -6px ;
            background-color: #f0f7d4;
            text-align: center;
        }
        
        #footer {
            padding: 100px;
            margin: -2px -6px 2px -6px;
            background-color: #f0f7d4;
            text-align: center;
        }
        
    </style>
</head>
    
    <body>
        <div id="navbar">
            <a href="home.php">HOME</a>
            <a href="viewreview.php">VIEW REVIEWS</a>
        </div>
        
        <div id="background">
            
        <form action="review.php" method="post">

        <div id="heading">
            <h2>Review Doctor</h2> <br><br>
        </div>    
        
        <table>
        <tr>
            <td>
                <label for="doctors">Select Doctor</label>
            </td>
            <td>
                <select name="docname" required>
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
                <label for="rating">Rating</label>
            </td>
            <td>
                <input type="radio" name="rating" value="1">1&nbsp;
                <input type="radio" name="rating" value="2">2&nbsp;
                <input type="radio" name="rating" value="3">3&nbsp;
                <input type="radio" name="rating" value="4">4&nbsp;
                <input type="radio" name="rating" value="5">5&nbsp;
            </td>
        </tr>
        
        <tr>
            <td>
                <label for="review">Review</label>
            </td>
            <td>
                <textarea name="comment" rows="4" cols="50"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">
                <br><button type="submit" name="review">Post review</button>
            </td>
        </tr>
        
        </table>
            
        </form>
        
    <?php
        if (isset($_POST['review'])) {
            $docname = $_POST['docname'];
            echo $docname.'<br>';
            $rating = $_POST['rating'];
            echo $rating.'<br>';
            $loggeduser = $_SESSION['username'];
            echo $loggeduser.'<br>';
            $comment = $_POST['comment'];
            echo $comment.'<br>';
            
            $sql = "insert into review (username, docname, rating, comment) values ('$loggeduser', '$docname', $rating, '$comment');";
            $run_query = mysqli_query($db, $sql);
            if($run_query) {
                echo "<script>alert('Review posted successfully)";
            }
            else {
                echo "<script>alert('Something wrong here')</script>";
            }
        }
    ?>
        </div>
        
        <div id="footer">
        </div>
        
   </body>
</html>