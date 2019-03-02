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
            allianceMember
        ) VALUES (
            '$_POST[teamNum]',
            '$_POST[matchNum]',
            '$_POST[allianceMember]'
        )";

$result = $conn->query($sql);

if ($result === TRUE) {
    echo $result;
} else {
    echo json_encode("Error: " . $conn->error);
}

$conn->close();
?>