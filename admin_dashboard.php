<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eMATADAN | Admin</title>
    <link rel="stylesheet" href="admin_dashboard.css">
    <link rel="icon" href="eMATADAN.png" type="image/icon type">
</head>
<body>  
    <?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "ematadan";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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

    $sql = "SELECT COUNT(*) AS no_of_voters FROM register_login";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $no_of_voters = $row["no_of_voters"];
    } else {
        $no_of_voters = 0;
    }

    $conn->close();
    ?>

    <div class="header">
        <div class="logo">
            <img src="eMATADAN.png" height="100dvh" width="100dvw">
            eMATADAN
        </div>
        <div class="logout"><a href="?logout=true"><img src="logout.png" alt="Logout" style="height: 10dvh;"></a></div>
    </div>
    <div class="row_div">
        <div class="col_div">
            <div class="status_add">
                <div class="voting_status">
                    <div class="vote_done">Vote done : </div>
                    <div class="no_of_voters">No. of Voters : <?php echo $no_of_voters; ?></div>
                </div>
                <div class="add_candidates">
                    <button class="add" id="add-candidates" onclick="redirectToAddCandidate()">Add Candidates</button>
                </div>
            </div>
            <div class="candidates">
                <table>
                    <tr>
                        <th>S.N.</th>
                        <th>Candidate Name</th>
                        <th>Candidate Position</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    include 'fetch_candidates.php';
                    ?>
                </table>
            </div>
        </div>
        <div class="tools">
            <div>Tools</div>
            <div class="start">
                <button class="start" id="start-timer">Start</button>
            </div>
            <div class="timerdisplay" id="timer-display"></div>
            <form method="post" action="reset.php">
                <div class="reset">
                    <button class="reset" name="reset">Reset</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function redirectToAddCandidate() {
            window.location.href = "addcandidate.html";
        }

        const startButton = document.getElementById("start-timer");
        const timerDisplay = document.getElementById("timer-display");
        const addbutton = document.getElementById("add-candidates");

        let clickCounter = sessionStorage.getItem("startButtonClickCounter");
        if (!clickCounter) {
            clickCounter = 0;
        }
        if (clickCounter >= 1) {
            addbutton.disabled = true;
        }

        startButton.addEventListener("click", function(){
            clickCounter++;
            if (clickCounter === 1) {
                addbutton.disabled = true;
                sessionStorage.setItem("startButtonClickCounter", clickCounter);
                const duration = prompt("Please enter the time duration in seconds:");
                startTimer(parseInt(duration, 10));
            }
        });

        let countdown;
        let timeInSeconds = 6;

        function startTimer(duration) {
            clearInterval(countdown);
            timeInSeconds = duration;
            displayTime(timeInSeconds);

            countdown = setInterval(() => {
                timeInSeconds--;
                displayTime(timeInSeconds);

                if (timeInSeconds <= 0) {
                    clearInterval(countdown);
                    timerDisplay.textContent = "Time's up!";
                }
            }, 1000);
        }

        function displayTime(seconds) {
            const minutes = Math.floor(seconds / 60);
            const remainingSeconds = seconds % 60;
            timerDisplay.textContent = `${minutes}:${remainingSeconds.toString().padStart(2, "0")}`;
        }
    </script>
    <button onclick="window.location.href = 'result.php';">View Results</button>

</body>
</html>
