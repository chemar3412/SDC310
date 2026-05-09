<?php
    //Start the session to store date of birth
    session_start();
    $cookie_info = "No cookie info.";

    //If the form was submitted, store values
    if(isset($_POST['name'])){
        $name = $_POST['name'];

        setcookie("name", $name, time() + 3600, "/");
        echo "Cookie saved!";
        

    }
    
    //Stores date of birth in session
    if(isset($_POST['dob'])){
        $_SESSION['dob'] = $_POST['dob'];
        echo "Session saved!";
    }
?>

<html>
    <head>
        <title>Chelsea Martin - Week 5 Performance Assessment</title>
    </head>
    <body>
        <h2> Enter Your Information </h2>
            <form method="post" action= "">
                Name: <input type="text" name="name" > <br>
                Date of Birth: <input type="date" name="dob">
                <input type="submit" value="Submit"> 
            </form>
            <br>
            
            <a href="data_display.php">Display Data </a>;
    </body>
</html>