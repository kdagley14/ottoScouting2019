<?php
include 'globalVars.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SELECT red1 FROM matchSchedule WHERE matchNum = 20 AND NOT EXISTS (SELECT * FROM matchData WHERE matchData.matchNum = 20 AND matchData.allianceMember = "red1");

$sql = "SELECT $_POST[allianceMember] 
        FROM matchSchedule
        WHERE matchNum = $_POST[matchNum]
        AND NOT EXISTS (
            SELECT * FROM matchData 
            WHERE matchNum = $_POST[matchNum]
            AND allianceMember = '$_POST[allianceMember]'
        )";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode("empty");
}
        
$result->free();
$conn->close();
?>