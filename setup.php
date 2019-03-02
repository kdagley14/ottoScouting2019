<!DOCTYPE html>
<html>

<head>
    <title>Otto Scouting</title>
    <link href="css/bootstrap.css" rel="stylesheet"></link>
    <link href="css/custom.css" rel="stylesheet"></link>
</head>

<body>
    <nav class="navbar navbar-inverted navbar-dark navbar-fixed-top bg-dark">
        <a class="col-3" href="#">
            <img src="images/1746Logo.png" style="max-height:40px">
            <p class="navbar-text pl-3">Scouting</p>
        </a>
        <div class="navbar-text col-2 text-center">Competition Setup</div>
    </nav>

    <div class="container pt-4">
        <div class="text-center">
            <a href="index.php">Back to Scouting Page</a>
            <hr></hr>
        </div>
            
        <div>
            <h3 class="text-center">Step 1</h3>
            <ul>
                <li>open phpMyAdmin to go to the database</li>
                <li>on the left-hand side, click 'New' to create a new database for the competition</li>
                <li>name the database after the name of the competition and year with no spaces (ex. gainsville2019) and hit create</li>
                <li>open globalVars.php and update $dbname to be <b>exact same name</b> that you gave the database, and be sure to save the file.<br>For example: $dbName = "gainsville2019";</li>
            </ul>
            <hr></hr>
        </div>
          
        <div class="text-center">
            <h3>Step 2</h3>
            <button id="createTables" class="btn btn-light btn-outline-secondary d-inline px-4 mx-3 mt-1 mb-4">Create Tables</button>
            <hr></hr>
        </div>

        <div>
            <h3 class="text-center">Step 3</h3>
            <h5>Event Keys:</h5>
            <ul>
                <li>Gainesville: 2019gagai</li>
                <li>Forsyth: 2019gafor</li>
                <li>PCH State Champs: 2019gacmp</li>
                <li>Houston World Champs: 2019carv</li>
            </ul>
            <div class="form-group text-center">
                <label for="scheduleLink">Event Key for Competition:</label>
                <input type="text" class="form-control" id="eventKey">
                <button id="uploadSchedule" class="btn btn-light btn-outline-secondary d-inline px-4 mx-3 mt-3 mb-4">Upload Schedule</button>
            </div>
        </div>   
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/setup.js"></script>
</body>

</html>