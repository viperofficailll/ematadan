<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ematadan";

$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $query = "DELETE FROM candidates WHERE id = $id";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo "<script>alert('Candidate deleted successfully');</script>";
    } else {
        echo "<script>alert('Error deleting candidate');</script>";
    }
}

$query = "SELECT id, candidate_name, candidate_position,vote_count FROM candidates";
$result = mysqli_query($connection, $query);

if ($result) {
    $serialNumber = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $serialNumber . "</td>";
        echo "<td>" . $row['candidate_name'] . "</td>";
        echo "<td>" . $row['candidate_position'] . "</td>";
        echo "<td>" . $row['vote_count'] . "</td>";
        echo "</tr>";
        $serialNumber++;
    }
} else {
    echo "Error: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
