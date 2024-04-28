<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ematadan";

$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reset'])) {
    $query = "TRUNCATE TABLE candidates";
    if (mysqli_query($connection, $query)) {
        echo "candidate table cleared successfully";
    } else {
        echo "Error clearing table: " . mysqli_error($connection);
    }
    $query = "TRUNCATE TABLE register_login";
    if (mysqli_query($connection, $query)) {
        header("Location: admin_dashboard.php");

    } else {
        echo "Error clearing table: " . mysqli_error($connection);

    }
    exit;
}
mysqli_close($connection);
?>