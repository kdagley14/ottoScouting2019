<?php
include 'globalVars.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT $_POST[allianceMember], matchNum FROM matchSchedule WHERE matchNum = ((
            SELECT IFNULL(MAX(matchNum), 0) FROM matchData
            WHERE allianceMember = '$_POST[allianceMember]'
        ) + 1)";

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