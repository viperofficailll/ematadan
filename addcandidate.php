<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ematadan";
$candidateName = $_POST["candidate_name"];
$position = $_POST["position"];
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "INSERT INTO candidates (candidate_name, candidate_position) VALUES ('$candidateName', '$position')";
    $conn->query($sql);
    $conn->close();
header("Location: admin_dashboard.php");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
