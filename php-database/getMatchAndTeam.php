<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ottoscouting2019";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT $_POST[allianceMember], matchNum FROM testSchedule WHERE matchNum = ((
            SELECT IFNULL(MAX(matchNum), 0) FROM testMatchData
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