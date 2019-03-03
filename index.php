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
        
        <div class="col-2 text-center">
            <div class="navbar-text mr-1">Match:</div>
            <input type="text" id="matchNum" class="d-inline form-control pl-2">
        </div>
        <div class="navbar-text col-2 text-center">Team:<span id="teamNum" class="text-white pl-2"></span></div>
        <div class="navbar-text col-2 text-center">Points:<span id="numPoints" class="text-white pl-2">0</span></div>
        <div id="dropdown" class="btn-group col-3">
            <button id="allianceMemberDropdown" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
            <span id="allianceMember">Select Alliance Member</span><span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a id="red1" href="#" class="text-danger">Red 1</a></li>
                <li><a id="red2" href="#" class="text-danger">Red 2</a></li>
                <li><a id="red3" href="#" class="text-danger">Red 3</a></li>
                <li><a id="blue1" href="#" class="text-primary">Blue 1</a></li>
                <li><a id="blue2" href="#" class="text-primary">Blue 2</a></li>
                <li><a id="blue3" href="#" class="text-primary">Blue 3</a></li>
            </ul>
        </div>
    </nav>

    <div class="container pt-4 text-center">
        <div id="startMessage">
            <p>Select an Alliance Member above to begin scouting.</p>
            <hr></hr>
            <a href="setup.php">Competition Setup</a>
        </div>

        <div id="prematchDiv" class="d-none">
            <h2>Pre-match</h2>
            <p>Select the robot's starting position:</p>
            <button id="startPos1" class="btn btn-light btn-outline-secondary d-inline px-4 m-3">1</button>
            <button id="startPos2" class="btn btn-light btn-outline-secondary d-inline px-4 m-3">2</button>
            <button id="didNotShow" class="btn btn-light btn-outline-secondary d-inline px-4 m-3">Did Not Show</button>
            <img src="images/BlankFieldStart.jpg" class="d-block mx-auto" style="max-height:400px">

            <hr></hr>
            <button id="nextSandstorm" class="btn btn-primary m-3" disabled>Next</button>
        </div>
        
        <div id="sandstormDiv" class="d-none">
            <h2>Sandstorm</h2>
            <p>Did the robot <b>leave the HAB</b> during the sandstorm?</p>
            <button id="leftHAB" class="btn btn-light btn-outline-secondary d-inline px-4 mx-3 mt-1 mb-4">Yes</button>
            <button id="stayedInHAB" class="btn btn-light btn-outline-secondary d-inline px-4 mx-3 mt-1 mb-4">No</button>
            <p>Was the robot <b>preloaded</b> with a game piece?</p>
            <button id="noPreload" class="btn btn-light btn-outline-secondary d-inline px-4 mx-3 my-1">No</button>
            <button id="cargoPreload" class="btn btn-light btn-outline-secondary d-inline px-4 mx-3 my-1">Yes, with Cargo</button>
            <button id="hatchPreload" class="btn btn-light btn-outline-secondary d-inline px-4 mx-3 my-1">Yes, with a Hatch</button>

            <hr></hr>
            <p class="mt-3">Select all the cargo and hatches that the robot <b>successfully scored</b> during the sandstorm:</p>
            
            <!--RED SANDSTORM FIELD BEGINS HERE-->
            <div id="redSandstormField" class="container">
                <!--TOP ROCKET ROW-->
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <div>
                            <button id="redHatch1" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="redCargo1" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                        <div>
                            <button id="redHatch2" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="redCargo2" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                        <div>
                            <button id="redHatch3" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="redCargo3" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                    </div>
                    <div class="col">
                        <img src="images/TopRedRocket.png" style="max-height:150px">
                    </div>
                    <div class="col">
                        <div>
                            <button id="redCargo4" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="redHatch4" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                        <div>
                            <button id="redCargo5" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="redHatch5" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                        <div>
                            <button id="redCargo6" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="redHatch6" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>

                <!--CARGO SHIP ROW-->
                <div class="row">
                    <div class="col">
                        <div class="float-left">
                            <button id="redHatch7" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="redHatch8" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="redHatch9" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="float-left">
                            <button id="redCargo7" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="redCargo8" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="redCargo9" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-inline">
                        <img src="images/CargoShipRed.png" class="float-left" style="max-height:150px">
                        <span class="float-left">
                            <div>
                                <button id="redCargo10" class="btn btn-light btn-outline-warning mt-4 mb-1">Cargo</button>
                                <button id="redHatch10" class="btn btn-light btn-outline-secondary mt-4 mb-1">Hatch</button>
                            </div>
                            <div>
                                <button id="redCargo11" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                                <button id="redHatch11" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="float-left">
                            <button id="redCargo12" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="redCargo13" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="redCargo14" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="float-left">
                            <button id="redHatch12" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="redHatch13" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="redHatch14" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                    </div>
                </div>

                <!--BOTTOM ROCKET ROW-->
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <div>
                            <button id="redHatch15" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="redCargo15" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                        <div>
                            <button id="redHatch16" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="redCargo16" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                        <div>
                            <button id="redHatch17" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="redCargo17" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                    </div>
                    <div class="col">
                        <img src="images/BottomRedRocket.png" style="max-height:150px">
                    </div>
                    <div class="col">
                        <div>
                            <button id="redCargo18" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="redHatch18" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                        <div>
                            <button id="redCargo19" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="redHatch19" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                        <div>
                            <button id="redCargo20" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="redHatch20" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
            <!--RED SANDSTORM FIELD ENDS HERE-->

            <!--BLUE SANDSTORM FIELD BEGINS HERE-->
            <div id="blueSandstormField" class="container">
                <!--TOP ROCKET ROW-->
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <div>
                            <button id="blueHatch1" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="blueCargo1" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                        <div>
                            <button id="blueHatch2" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="blueCargo2" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                        <div>
                            <button id="blueHatch3" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="blueCargo3" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                    </div>
                    <div class="col">
                        <img src="images/TopBlueRocket.png" style="max-height:150px">
                    </div>
                    <div class="col">
                        <div>
                            <button id="blueCargo4" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="blueHatch4" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                        <div>
                            <button id="blueCargo5" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="blueHatch5" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                        <div>
                            <button id="blueCargo6" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="blueHatch6" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>

                <!--CARGO SHIP ROW-->
                <div class="row">
                    <div class="col">
                        <div class="float-right">
                            <button id="blueHatch7" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="blueHatch8" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="blueHatch9" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="float-right">
                            <button id="blueCargo7" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="blueCargo8" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="blueCargo9" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-inline">
                        <img src="images/CargoShipBlue.png" class="float-right" style="max-height:150px">
                        <span class="float-right">
                            <div>
                                <button id="blueHatch10" class="btn btn-light btn-outline-secondary mt-4 mb-1">Hatch</button>
                                <button id="blueCargo10" class="btn btn-light btn-outline-warning mt-4 mb-1">Cargo</button>
                            </div>
                            <div>
                                <button id="blueHatch11" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                                <button id="blueCargo11" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="float-right">
                            <button id="blueCargo12" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="blueCargo13" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="blueCargo14" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="float-right">
                            <button id="blueHatch12" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="blueHatch13" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="blueHatch14" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                    </div>
                </div>

                <!--BOTTOM ROCKET ROW-->
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <div>
                            <button id="blueHatch15" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="blueCargo15" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                        <div>
                            <button id="blueHatch16" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="blueCargo16" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                        <div>
                            <button id="blueHatch17" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="blueCargo17" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                    </div>
                    <div class="col">
                        <img src="images/BottomBlueRocket.png" style="max-height:150px">
                    </div>
                    <div class="col">
                        <div>
                            <button id="blueCargo18" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="blueHatch18" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                        <div>
                            <button id="blueCargo19" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="blueHatch19" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                        <div>
                            <button id="blueCargo20" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="blueHatch20" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
            <!--BLUE SANDSTORM FIELD ENDS HERE-->

            <hr></hr>
            <div class="mt-3">
                <button id="backPrematch" class="btn btn-light btn-outline-secondary m-3">Back</button>
                <button id="nextTeleop" class="btn btn-primary m-3" disabled>Next</button>
            </div>
            
        </div>
        
        <!-- ////////////////////// TELEOP ////////////////////// -->
        <div id="teleopDiv" class="d-none">
            <h2>Teleop</h2>
            <hr></hr>

            <!--RED TELEOP FIELD BEGINS HERE-->
            <div id="redTeleopField" class="container">
                <!--TOP ROCKET ROW-->
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <div>
                            <button id="redHatchTeleop1" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="redCargoTeleop1" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                        <div>
                            <button id="redHatchTeleop2" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="redCargoTeleop2" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                        <div>
                            <button id="redHatchTeleop3" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="redCargoTeleop3" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                    </div>
                    <div class="col">
                        <img src="images/TopRedRocket.png" style="max-height:150px">
                    </div>
                    <div class="col">
                        <div>
                            <button id="redCargoTeleop4" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="redHatchTeleop4" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                        <div>
                            <button id="redCargoTeleop5" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="redHatchTeleop5" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                        <div>
                            <button id="redCargoTeleop6" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="redHatchTeleop6" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>

                <!--CARGO SHIP ROW-->
                <div class="row">
                    <div class="col">
                        <div class="float-left">
                            <button id="redHatchTeleop7" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="redHatchTeleop8" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="redHatchTeleop9" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="float-left">
                            <button id="redCargoTeleop7" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="redCargoTeleop8" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="redCargoTeleop9" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-inline">
                        <img src="images/CargoShipRed.png" class="float-left" style="max-height:150px">
                        <span class="float-left">
                            <div>
                                <button id="redCargoTeleop10" class="btn btn-light btn-outline-warning mt-4 mb-1">Cargo</button>
                                <button id="redHatchTeleop10" class="btn btn-light btn-outline-secondary mt-4 mb-1">Hatch</button>
                            </div>
                            <div>
                                <button id="redCargoTeleop11" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                                <button id="redHatchTeleop11" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="float-left">
                            <button id="redCargoTeleop12" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="redCargoTeleop13" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="redCargoTeleop14" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="float-left">
                            <button id="redHatchTeleop12" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="redHatchTeleop13" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="redHatchTeleop14" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                    </div>
                </div>

                <!--BOTTOM ROCKET ROW-->
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <div>
                            <button id="redHatchTeleop15" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="redCargoTeleop15" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                        <div>
                            <button id="redHatchTeleop16" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="redCargoTeleop16" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                        <div>
                            <button id="redHatchTeleop17" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="redCargoTeleop17" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                    </div>
                    <div class="col">
                        <img src="images/BottomRedRocket.png" style="max-height:150px">
                    </div>
                    <div class="col">
                        <div>
                            <button id="redCargoTeleop18" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="redHatchTeleop18" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                        <div>
                            <button id="redCargoTeleop19" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="redHatchTeleop19" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                        <div>
                            <button id="redCargoTeleop20" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="redHatchTeleop20" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
            <!--RED TELEOP FIELD ENDS HERE-->

            <!--BLUE TELEOP FIELD BEGINS HERE-->
            <div id="blueTeleopField" class="container">
                <!--TOP ROCKET ROW-->
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <div>
                            <button id="blueHatchTeleop1" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="blueCargoTeleop1" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                        <div>
                            <button id="blueHatchTeleop2" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="blueCargoTeleop2" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                        <div>
                            <button id="blueHatchTeleop3" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="blueCargoTeleop3" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                    </div>
                    <div class="col">
                        <img src="images/TopBlueRocket.png" style="max-height:150px">
                    </div>
                    <div class="col">
                        <div>
                            <button id="blueCargoTeleop4" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="blueHatchTeleop4" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                        <div>
                            <button id="blueCargoTeleop5" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="blueHatchTeleop5" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                        <div>
                            <button id="blueCargoTeleop6" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="blueHatchTeleop6" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>

                <!--CARGO SHIP ROW-->
                <div class="row">
                    <div class="col">
                        <div class="float-right">
                            <button id="blueHatchTeleop7" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="blueHatchTeleop8" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="blueHatchTeleop9" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="float-right">
                            <button id="blueCargoTeleop7" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="blueCargoTeleop8" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="blueCargoTeleop9" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-inline">
                        <img src="images/CargoShipBlue.png" class="float-right" style="max-height:150px">
                        <span class="float-right">
                            <div>
                                <button id="blueHatchTeleop10" class="btn btn-light btn-outline-secondary mt-4 mb-1">Hatch</button>
                                <button id="blueCargoTeleop10" class="btn btn-light btn-outline-warning mt-4 mb-1">Cargo</button>
                            </div>
                            <div>
                                <button id="blueHatchTeleop11" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                                <button id="blueCargoTeleop11" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="float-right">
                            <button id="blueCargoTeleop12" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="blueCargoTeleop13" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="blueCargoTeleop14" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="float-right">
                            <button id="blueHatchTeleop12" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="blueHatchTeleop13" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="blueHatchTeleop14" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                    </div>
                </div>

                <!--BOTTOM ROCKET ROW-->
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <div>
                            <button id="blueHatchTeleop15" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="blueCargoTeleop15" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                        <div>
                            <button id="blueHatchTeleop16" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="blueCargoTeleop16" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                        <div>
                            <button id="blueHatchTeleop17" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                            <button id="blueCargoTeleop17" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                        </div>
                    </div>
                    <div class="col">
                        <img src="images/BottomBlueRocket.png" style="max-height:150px">
                    </div>
                    <div class="col">
                        <div>
                            <button id="blueCargoTeleop18" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="blueHatchTeleop18" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                        <div>
                            <button id="blueCargoTeleop19" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="blueHatchTeleop19" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                        <div>
                            <button id="blueCargoTeleop20" class="btn btn-light btn-outline-warning my-1">Cargo</button>
                            <button id="blueHatchTeleop20" class="btn btn-light btn-outline-secondary my-1">Hatch</button>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
            <!--BLUE TELEOP FIELD ENDS HERE-->

            <hr></hr>
            <button id="backSandstorm" class="btn btn-light btn-outline-secondary m-3">Back</button>
            <button id="nextPostmatch" class="btn btn-primary m-3">Next</button>
        </div>
        
        <div id="postmatchDiv" class="d-none">
            <h2>Post-match</h2>
            <p>What was the robot's ending position?</p>
            <button id="endPos1" class="btn btn-light btn-outline-secondary d-inline px-4 mx-3 mt-1 mb-4">1</button>
            <button id="endPos2" class="btn btn-light btn-outline-secondary d-inline px-4 mx-3 mt-1 mb-4">2</button>
            <button id="endPos3" class="btn btn-light btn-outline-secondary d-inline px-4 mx-3 mt-1 mb-4">3</button>
            <button id="endPos4" class="btn btn-light btn-outline-secondary d-inline px-4 mx-3 mt-1 mb-4">Somewhere Else</button>
            <img src="images/BlankFieldEnd.jpg" class="d-block mx-auto mb-4" style="max-height:400px">

            <p>Did the robot help any other robots climb?</p>
            <button id="helpOthersClimb0" class="btn btn-light btn-outline-secondary d-inline px-4 mx-3 mt-1 mb-4">No</button>
            <button id="helpOthersClimb1" class="btn btn-light btn-outline-secondary d-inline px-4 mx-3 mt-1 mb-4">Yes, 1 Robot</button>
            <button id="helpOthersClimb2" class="btn btn-light btn-outline-secondary d-inline px-4 mx-3 mt-1 mb-4">Yes, 2 Robots</button>

            <div id="howHelpOthersClimbDiv" class="d-none">
                <p>How did they help the other robot(s) climb? (Lift, Ramp, etc.)</p>
                <textarea class="form-control mb-4" rows="2" id="howHelpOthersClimb"></textarea>
            </div>

            <p>Did another robot help this robot climb?</p>
            <button id="helpedToClimbNo" class="btn btn-light btn-outline-secondary d-inline px-4 mx-3 mt-1 mb-4">No</button>
            <button id="helpedToClimbYes" class="btn btn-light btn-outline-secondary d-inline px-4 mx-3 mt-1 mb-4">Yes</button>

            <div id="howHelpedToClimbDiv" class="d-none">
                <p>How did the other robot help this robot climb? (Lift, Ramp, etc.)</p>
                <textarea class="form-control mb-4" rows="2" id="howHelpedToClimb"></textarea>
            </div>

            <p>Any other comments about this robot?</p>
            <textarea class="form-control mb-4" rows="5" id="comments"></textarea>

            <hr></hr>
            <button id="backTeleop" class="btn btn-light btn-outline-secondary m-3">Back</button>
            <button id="submit" class="btn btn-primary m-3" disabled>Submit</button>
        </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
</body>
</html>
