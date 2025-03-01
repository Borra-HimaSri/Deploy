<?php   
include 'db.php';
 
// Start session to manage user login status
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}



// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Logout functionality
if (isset($_POST['logout'])) {
    session_destroy();  // Destroy session to logout
    header('Location: login.php'); // Redirect to login page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
   

    <link href="css/admin.css" rel="stylesheet"/>
</head>
<body>
    <div class="header">
        <h1>Admin Page</h1>
    </div>

    <div class="container">
        <div class="nav-links"> 
            <div class="flex-container">
                <a href="gallery_photo_admin.php" class="flex-item">Gallery</a>
                <a href="gallery_event_admin.php" class="flex-item">Events</a>
                <a href="gallery_latest_admin.php" class="flex-item">News</a>
            </div>
        </div>

        <!-- Logout Button -->
        <form class="logout-form" action="admin.php" method="post" onsubmit="return confirm('Are you sure you want to logout?');">
            <button type="submit" name="logout">Logout</button>
        </form>
    </div>
</body>  
</html>

