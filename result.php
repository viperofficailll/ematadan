<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="result.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="eMATADAN.png" height="100dvh" width="100dvw">
            eMATADAN
        </div>
        <div class="logout"><a href="?logout=true"><img src="logout.png" alt="Logout" style="height: 10dvh;"></a></div>
    </div>
    <br>
    <h2 style="text-align: center;">RESULT</h2>
    <div class="candidates">
        <table>
            <tr>
                <th>S.N.</th>
                <th>Candidate Name</th>
                <th>Candidate Position</th>
                <th>Vote Received</th>
            </tr>
            <?php
                include 'fetch_candidates_result.php';
            ?>
        </table>
    </div>
        
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
                
            ?>
</body>
</html>