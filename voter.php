<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eMATADAN | Voter</title>
    <link rel="stylesheet" href="stylevot.css">
    <link rel="icon" href="eMATADAN.png" type="image/icon type">
</head>
<body>  
    <div class="header">
        <div class="logo">
            <img src="eMATADAN.png" height="100dvh" width="100dvw">
            eMATADAN
        </div>
        <div class="logout"><a href="?logout=true"><img src="logout.png" alt="Logout" style="height: 10dvh;"></a></div>
    </div>
    <div class="row_div">
            <div class="candidates">
                <table>
                    <tr>
                        <th>S.N.</th>
                        <th>Candidate Name</th>
                        <th>Candidate Position</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        include 'fetch_candidates_voter.php';
                    ?>
                </table>
            </div>
            <div class="profile">
                <div class="image"><img src="dp.png" height="200dvh" width="200dvw"></div>
                <div class="details">
                <?php
                    session_start();
                    
                    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                        header("location: index.html");
                        exit;
                    }

                    
                    if(isset($_GET["logout"]) && $_GET["logout"] == 'true'){
                        
                        $_SESSION = array();

                        
                        session_destroy();

                        
                        header("location: index.html");
                        exit;
                    }

                    include 'voter_details.php';
                    
                ?>

                </div>
            </div>
    </div>
</body>
</html>