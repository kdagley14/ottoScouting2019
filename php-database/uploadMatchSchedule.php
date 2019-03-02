<?php
include 'globalVars.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"X-TBA-Auth-Key: XMD0k8WzmW8ADeqSfIO7zOJqwLdmXX32tKK3cjTGKSzHMyD9us88TzOnCW6Rdmru"
  )
);

$context = stream_context_create($opts);


// Open the file using the HTTP headers set above
$json = file_get_contents('http://www.thebluealliance.com/api/v3/event/' . $_POST['eventKey'] . '/matches', false, $context);

$data = json_decode($json);


$conn->query('TRUNCATE TABLE matchSchedule;');

foreach($data as $key => $value) {
    if($value->comp_level == 'qm'){

        //Create team number variables
        $red1 = substr($value->alliances->red->team_keys[0], 3);
        $red2 = substr($value->alliances->red->team_keys[1], 3);
        $red3 = substr($value->alliances->red->team_keys[2], 3);
        $blue1 = substr($value->alliances->blue->team_keys[0], 3);
        $blue2 = substr($value->alliances->blue->team_keys[1], 3);
        $blue3 = substr($value->alliances->blue->team_keys[2], 3);

        $sql = "INSERT INTO matchSchedule (matchNum, red1, red2, red3, blue1, blue2, blue3)
        VALUES ($value->match_number, $red1, $red2, $red3, $blue1, $blue2, $blue3);";

        // execute SQL query
        if ($conn->query($sql) !== TRUE) {
            echo json_encode("Error: " . $conn->error);
        }
    }
};

$result = $conn->query('ALTER TABLE matchSchedule ORDER BY match_num ASC;');

if ($result === TRUE) {
    echo $result;
} else {
    echo json_encode("Error: " . $conn->error);
}


// close database connection
$conn->close();

?>