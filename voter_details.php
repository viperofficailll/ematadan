<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if(isset($_SESSION['user_data'])) {
        $user_data = $_SESSION['user_data'];
        echo "<div>
                VOTER NAME: {$user_data['fname']} {$user_data['lname']}
                <br>
                DOB: {$user_data['dob']}
                <br>
                PHONE NUMBER: {$user_data['phone']}</div>";
        
    }
} else {
    header("Location: index.html");
    exit;
}
?>
