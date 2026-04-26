<?php 
// Connect to Database
$hostname = "localhost"; 
$username = "ecpi_user"; 
$password = "Password1"; 
$dbname = "sdc310_wk3pa"; 

$conn = mysqli_connect($hostname, $username, $password, $dbname);

// Variables to support add/edit/delete
$userNo = -1;
$FullName = "";
$Birthdate = "";
$FavoriteColor = "";
$FavoritePlace = "";
$Nickname = "";

$add = isset($_POST['add']);
$update = isset($_POST['update']);
$edit = isset($_POST['edit']);
$delete = isset($_POST['delete']);

if(isset($_POST['user_no'])) {
    $userNo = $_POST['user_no'];
}

// Handle Add or Update Logic
if($add || $update) {
    // Sanitize inputs
    $FullName = mysqli_real_escape_string($conn, $_POST['FullName']);
    $Birthdate = mysqli_real_escape_string($conn, $_POST['Birthdate']);
    $FavoriteColor = mysqli_real_escape_string($conn, $_POST['FavoriteColor']);
    $FavoritePlace = mysqli_real_escape_string($conn, $_POST['FavoritePlace']);
    $Nickname = mysqli_real_escape_string($conn, $_POST['Nickname']);

    if ($add) {
        $addQuery = "INSERT INTO personal_info (FullName, Birthdate, FavoriteColor, FavoritePlace, Nickname)
                     VALUES ('$FullName', '$Birthdate', '$FavoriteColor', '$FavoritePlace', '$Nickname')";
        mysqli_query($conn, $addQuery);
    } else if ($update) {
        $updQuery = "UPDATE personal_info SET
            FullName = '$FullName', 
            Birthdate = '$Birthdate',
            FavoriteColor = '$FavoriteColor', 
            FavoritePlace = '$FavoritePlace',
            Nickname = '$Nickname'
            WHERE UserNo = $userNo";
        mysqli_query($conn, $updQuery);
    }

    // Reset fields after action
    $userNo = -1;
    $FullName = $Birthdate = $FavoriteColor = $FavoritePlace = $Nickname = "";
}
else if ($edit) {
    $selQuery = "SELECT * FROM personal_info WHERE UserNo = $userNo";
    $result = mysqli_query($conn, $selQuery);
    if($personal_info = mysqli_fetch_assoc($result)) {
        $FullName = $personal_info['FullName'];
        $Birthdate = $personal_info['Birthdate'];
        $FavoriteColor = $personal_info['FavoriteColor'];
        $FavoritePlace = $personal_info['FavoritePlace'];
        $Nickname = $personal_info['Nickname'];
    }
}
else if ($delete){
    $delQuery = "DELETE FROM personal_info WHERE UserNo = $userNo";
    mysqli_query($conn, $delQuery);
    $userNo = -1;
}

// Fetch all users for the table
$query = "SELECT * FROM personal_info";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Week 3 Performance Assessment - Chelsea Martin</title>
    <style>
        table { border-spacing: 5px; width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 15px; text-align: center; }
        th { background-color: lightskyblue; }
        tr:nth-child(even) { background-color: whitesmoke; }
        tr:nth-child(odd) { background-color: lightgray; }
    </style>
</head>
<body>
    <h2>Current Users:</h2>
    <table>
        <tr>
            <th>User #</th>
            <th>Full Name</th>
            <th>Birthdate</th>
            <th>Favorite Color</th>
            <th>Favorite Place</th>
            <th>Nickname</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['UserNo']; ?></td>
            <td><?php echo $row['FullName']; ?></td>
            <td><?php echo $row['Birthdate']; ?></td>
            <td><?php echo $row['FavoriteColor']; ?></td>
            <td><?php echo $row['FavoritePlace']; ?></td>
            <td><?php echo $row['Nickname']; ?></td>
            <td>
                <form method='POST'>
                    <input type="hidden" name="user_no" value="<?php echo $row["UserNo"]; ?>">
                    <input type="submit" value="Edit" name="edit">
                </form>
            </td>
            <td>
                <form method='POST'>
                    <input type="hidden" name="user_no" value="<?php echo $row["UserNo"]; ?>">
                    <input type="submit" value="Delete" name="delete">
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <form method='POST'>
        <input type="hidden" name="user_no" value="<?php echo $userNo; ?>">
        <h3>Full Name: <input type="text" name="FullName" value="<?php echo $FullName; ?>" required></h3>
        <h3>Birthdate: <input type="text" name="Birthdate" value="<?php echo $Birthdate; ?>"></h3>
        <h3>Favorite Color: <input type="text" name="FavoriteColor" value="<?php echo $FavoriteColor; ?>"></h3>
        <h3>Favorite Place: <input type="text" name="FavoritePlace" value="<?php echo $FavoritePlace; ?>"></h3>
        <h3>Nickname: <input type="text" name="Nickname" value="<?php echo $Nickname; ?>"></h3>
        
        <?php if(!$edit): ?>
            <input type="submit" value="Add User" name="add">
        <?php else: ?>
            <input type="submit" value="Update User" name="update">
            <a href="?">Cancel</a>
        <?php endif; ?>
    </form>
</body>
</html>
