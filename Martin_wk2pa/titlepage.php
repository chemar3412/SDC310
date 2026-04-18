<html>
<head>
    <title> Chelsea Martin Wk 2 Performance Assessment </title>
</head>
<body>
    <form method='POST'>
        <h3>Enter your name: <input type="text" name="name"></h3>
        <h3>Enter your date of birth: <input type="text" name="birth"></h3>
        <h3>Enter your favorite color: <input type="text" name="color"></h3>
        <h3>Enter your favorite place to visit: <input type="text" name="place"></h3>
        <h3>Enter your nickname: <input type="text" name="nickname"></h3>
        <input type="Submit" name="Submit" value="Submit">
    </form>

    <?php 
    $name = $birth = $color = $place = $nickname = '';

    // Only process the data if the form has been submitted
    if(isset($_POST['Submit'])) {
        
        // Match 'name' to the HTML input name
        if(isset($_POST['name'])){
            $name = trim($_POST['name']);
        }
        if(isset($_POST['birth'])) {
            $birth = trim($_POST['birth']);
        }
        if(isset($_POST['color'])) {
            $color = trim($_POST['color']);
        }
        if(isset($_POST['place'])) {
            $place = trim($_POST['place']);
        }
        if(isset($_POST['nickname'])) {
            $nickname = trim($_POST['nickname']);
        }

        var_dump($name);
        var_dump($color);

        // Displays the values entered
        if(strlen($name) > 0 )
            echo "<h3> The name you entered is: $name. </h3>";
        else
            echo "<h3> You didn't enter your name. </h3>";

        if(strlen($birth) > 0)
            echo "<h3> The birthday you entered is: $birth </h3> ";
        else
            echo "<h3> You didn't enter your birthday. </h3>";

        if(strlen($color) > 0 )
            echo "<h3> You entered $color for your favorite color. </h3>";
        else
            echo "<h3> You didn't enter your favorite color. </h3> ";

        if(strlen($place) > 0)
            echo "<h3> Your favorite place to visit is $place. </h3>";
        else
            echo "<h3> You didn't enter your favorite place to visit. </h3>";

        if(strlen($nickname) > 0 )
            echo "<h3> The nickname you entered was $nickname. </h3>";
        else
            echo "<h3> You didn't enter your nickname. </h3>";
    }
    ?>
</body>
</html>
