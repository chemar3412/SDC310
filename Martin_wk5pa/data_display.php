<?php
$cookie_info = "no cookie info";
?>

<html>
    <head>
        <title>Chelsea Martin- Week 5 Performance Assessment</title>
    </head>
    
    <body>
        <h2>Stored Information </h2>
        
        <?php
        if(isset($_COOKIE['name'])){
            echo "Name: " . htmlspecialchars($_COOKIE['name']);
        } else {
            echo "No cookie found.";
        }
    ?>
    <br>
    <br>


    <?php
    session_start();
    if(isset($_SESSION['dob'])){
        echo "Date of birth: " . htmlspecialchars($_SESSION['dob']);
    }
?>
<br>

<a href = "data_entry.php">Return to data entry </a>

</body>
</html>
