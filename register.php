<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ematadan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$citizenship_no = $_POST['citizenship_no'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$pass = $_POST['pass'];
$hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO register_login (fname, lname, email, citizenship_no, phone, gender, dob, pass) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $fname, $lname, $email, $citizenship_no, $phone, $gender, $dob, $hashed_pass);

if ($stmt->execute() === TRUE) {

    $_SESSION['phone'] = $phone;
    $_SESSION['loggedin'] = true;

    header("location:index.html");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
