<?php
include 'globalVars.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO matchData (
            teamNum,
            matchNum,
            allianceMember,
            startPosition,
            endPosition,
            leftHAB,
            preload,
            totalPoints,
            helpOthersClimb,
            helpedToClimb,
            totalHatches,
            totalCargo,
            sandstormTopHatches,
            sandstormMidHatches,
            sandstormLowHatches,
            sandstormTopCargo,
            sandstormMidCargo,
            sandstormLowCargo,
            teleopTopHatches,
            teleopMidHatches,
            teleopLowHatches,
            teleopTopCargo,
            teleopMidCargo,
            teleopLowCargo,
            defenseRating,
            defenseTime,
            defenseAgainstRating,
            broken,
            dead,
            howHelpOthersClimb,
            howHelpedToClimb,
            comments
        ) VALUES (
            '$_POST[teamNum]',
            '$_POST[matchNum]',
            '$_POST[allianceMember]',
            '$_POST[startPosition]',
            '$_POST[endPosition]',
            '$_POST[leftHAB]',
            '$_POST[preload]',
            '$_POST[totalPoints]',
            '$_POST[helpOthersClimb]',
            '$_POST[helpedToClimb]',
            '$_POST[totalHatches]',
            '$_POST[totalCargo]',
            '$_POST[sandstormTopHatches]',
            '$_POST[sandstormMidHatches]',
            '$_POST[sandstormLowHatches]',
            '$_POST[sandstormTopCargo]',
            '$_POST[sandstormMidCargo]',
            '$_POST[sandstormLowCargo]',
            '$_POST[teleopTopHatches]',
            '$_POST[teleopMidHatches]',
            '$_POST[teleopLowHatches]',
            '$_POST[teleopTopCargo]',
            '$_POST[teleopMidCargo]',
            '$_POST[teleopLowCargo]',
            '$_POST[defenseRating]',
            '$_POST[defenseTime]',
            '$_POST[defenseAgainstRating]',
            '$_POST[broken]',
            '$_POST[dead]',
            '$_POST[howHelpOthersClimb]',
            '$_POST[howHelpedToClimb]',
            '$_POST[comments]'
        )";

$result = $conn->query($sql);

if ($result === TRUE) {
    echo $result;
} else {
    echo json_encode("Error: " . $conn->error);
}

$conn->close();
?>