<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
}
require_once "config.php";
//check if user has submitted information yet
$id = $_SESSION["id"];
$sql = "SELECT name
        FROM students
        WHERE id = $id";

$result = mysqli_query($conn, $sql);
$name = mysqli_fetch_row($result)[0];

if ($name == NULL) {
        header("location: update_info.php");
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
        <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Class Finder</title>
                <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="dash.css">
   <link rel="shortcut icon" type="image/png" href="favicon.png">
        </head>
        <body>
                <nav>
                        <ul>
                                <li><a class="home" href="dashboard.php">Home</a></li>
                                <li><a href="logout.php">Logout</a></li>
                        </ul>
                </nav>
                <main>
                <h1>Nice to see you again, <?php echo htmlspecialchars($name); ?></h1>
                        <div class="hello">

<button onclick="location.href='update_info.php'">Update/Change Info</button>
    <button onclick="location.href='request.php'">Check Your Classes</button>
    <button onclick="location.href='logout.php'">Logout</button>
                        </div>
                </main>
        </body>
</html>
