<?php
include 'globalVars.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE matchData (
        id INT NOT NULL AUTO_INCREMENT,
        teamNum INT NOT NULL,
        matchNum INT NOT NULL,
        allianceMember VARCHAR(5) NOT NULL,
        startPosition INT,
        endPosition INT,
        leftHAB BOOLEAN,
        preload ENUM('none', 'cargo', 'hatch'),
        totalPoints INT,
        helpOthersClimb INT,
        helpedToClimb BOOLEAN,
        totalHatches INT,
        totalCargo INT,
        sandstormTopHatches INT,
        sandstormMidHatches INT,
        sandstormLowHatches INT,
        sandstormTopCargo INT,
        sandstormMidCargo INT,
        sandstormLowCargo INT,
        teleopTopHatches INT,
        teleopMidHatches INT,
        teleopLowHatches INT,
        teleopTopCargo INT,
        teleopMidCargo INT,
        teleopLowCargo INT,
        defenseRating INT,
        defenseTime DOUBLE,
        defenseAgainstRating INT,
        broken BOOLEAN,
        dead BOOLEAN,
        howHelpOthersClimb VARCHAR(500),
        howHelpedToClimb VARCHAR(500),
        comments VARCHAR(500),
        PRIMARY KEY (id)
        );";

$sql .= "CREATE TABLE matchSchedule (
        matchNum INT NOT NULL,
        red1 INT NOT NULL,
        red2 INT NOT NULL,
        red3 INT NOT NULL,
        blue1 INT NOT NULL,
        blue2 INT NOT NULL,
        blue3 INT NOT NULL,
        PRIMARY KEY (matchNum)
        );";

$result = $conn->multi_query($sql);

if ($result === TRUE) {
    echo $result;
} else {
    echo json_encode("Error: " . $conn->error);
}

$conn->close();
?>