var teamNum;
var matchNum = null;
var allianceMember = null;
var startPosition = null;
var leftHAB = null;
var preload = null;
var allianceColor = null;
var sandstormBonus = 0;
var points = 0;
var endPosition = null;
var climbBonus = 0;
var helpOthersClimb = 0;
var helpedToClimb = null;

var sandstormTopHatches = 0;
var sandstormMidHatches = 0;
var sandstormLowHatches = 0;
var sandstormTopCargo = 0;
var sandstormMidCargo = 0;
var sandstormLowCargo = 0;

var teleopTopHatches = 0;
var teleopMidHatches = 0;
var teleopLowHatches = 0;
var teleopTopCargo = 0;
var teleopMidCargo = 0;
var teleopLowCargo = 0;

// alliance member dropdown menu
$('.dropdown-menu a').click(function(){
    $('#allianceMember').text($(this).text());
    $('#startMessage').hide();

    // change dropdown color based on alliance member selected
    if($(this).text().indexOf("Red") > -1) {
        $('#allianceMemberDropdown').removeClass('btn-light');
        $('#allianceMemberDropdown').removeClass('btn-primary');
        $('#allianceMemberDropdown').addClass('btn-danger');
        allianceColor = "red";
    } else if ($(this).text().indexOf("Blue") > -1) {
        $('#allianceMemberDropdown').removeClass('btn-light');
        $('#allianceMemberDropdown').removeClass('btn-danger');
        $('#allianceMemberDropdown').addClass('btn-primary');
        allianceColor = "blue";
    }
    getMatchAndTeam();
    clearForm(allianceColor);

    $('#prematchDiv').removeClass('d-none');
    $('#sandstormDiv').addClass('d-none');
    $('#teleopDiv').addClass('d-none');
    $('#postmatchDiv').addClass('d-none');
});

$('#matchNum').blur(function() {
    if (allianceMember !== null) {
        matchNum = $('#matchNum').val();
        console.log(matchNum);
        getTeam();
    }
});

// -------------- PREMATCH DIV -------------- //

// starting position 1 button
$('#startPos1').click(function(){
    startPosition = 1;
    $('#startPos1').addClass('active');
    $('#startPos2').removeClass('active');
    $('#didNotShow').removeClass('active');
    if ($('#teamNum').text() != "N/A") {
        $('#nextSandstorm').prop('disabled', false);
    }
    updateSandstormBonus();
});

// starting position 2 button
$('#startPos2').click(function(){
    startPosition = 2;
    $('#startPos2').addClass('active');
    $('#startPos1').removeClass('active');
    $('#didNotShow').removeClass('active');
    if ($('#teamNum').text() != "N/A") {
        $('#nextSandstorm').prop('disabled', false);
    }
    updateSandstormBonus();
});

$('#didNotShow').click(function(){
    var didNotShow = confirm("Are you sure you want to mark this team as \"Did Not Show\"?");
    if (didNotShow) {
        $.ajax({
            url: 'php-database/sendMatchDataNoShow.php',
            type: 'POST',
            dataType:'json',
            data: {
                teamNum: teamNum,
                matchNum: matchNum,
                allianceMember: allianceMember
            },
            success: function(response) {
                if (response === 1) {
                    alert("Match data successfully added to database.");
                    $('#' + allianceMember).click();
                    clearForm(allianceColor);
                } else {
                    alert(response);
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
    }
});

// next button
$('#nextSandstorm').click(function(){
    $('#prematchDiv').addClass('d-none');
    $('#sandstormDiv').removeClass('d-none');
    if(allianceColor == "blue") {
        $('#blueSandstormField').removeClass('d-none');
        $('#redSandstormField').addClass('d-none');
    } else if (allianceColor == "red") {
        $('#redSandstormField').removeClass('d-none');
        $('#blueSandstormField').addClass('d-none');
    }
    $("html, body").animate({ scrollTop: 0 });
});

// -------------- SANDSTORM DIV -------------- //

$('#leftHAB').click(function(){
    leftHAB = true;
    $('#leftHAB').addClass('active');
    $('#stayedInHAB').removeClass('active');
    updateSandstormBonus();
    sandstormQsAnswered();
});

$('#stayedInHAB').click(function(){
    leftHAB = false;
    $('#stayedInHAB').addClass('active');
    $('#leftHAB').removeClass('active');
    updateSandstormBonus();
    sandstormQsAnswered();
});

$('#noPreload').click(function(){
    preload = "none";
    $('#noPreload').addClass('active');
    $('#cargoPreload').removeClass('active');
    $('#hatchPreload').removeClass('active');
    sandstormQsAnswered();
});

$('#cargoPreload').click(function(){
    preload = "cargo";
    $('#cargoPreload').addClass('active');
    $('#noPreload').removeClass('active');
    $('#hatchPreload').removeClass('active');
    sandstormQsAnswered();
});

$('#hatchPreload').click(function(){
    preload = "hatch";
    $('#hatchPreload').addClass('active');
    $('#cargoPreload').removeClass('active');
    $('#noPreload').removeClass('active');
    sandstormQsAnswered();
});

// back button
$('#backPrematch').click(function(){
    $('#sandstormDiv').addClass('d-none');
    $('#prematchDiv').removeClass('d-none');
    $("html, body").animate({ scrollTop: 0 });
});

// next button
$('#nextTeleop').click(function(){
    $('#sandstormDiv').addClass('d-none');
    $('#teleopDiv').removeClass('d-none');
    if(allianceColor == "blue") {
        $('#blueTeleopField').removeClass('d-none');
        $('#redTeleopField').addClass('d-none');
    } else if (allianceColor == "red") {
        $('#redTeleopField').removeClass('d-none');
        $('#blueTeleopField').addClass('d-none');
    }
    $("html, body").animate({ scrollTop: 0 });
});

function sandstormQsAnswered() {
    if (leftHAB !== null && preload !==null) {
        $('#nextTeleop').prop('disabled', false);
    }
}

// ---------------- TELEOP DIV --------------- //

// back button
$('#backSandstorm').click(function(){
    $('#teleopDiv').addClass('d-none');
    $('#sandstormDiv').removeClass('d-none');
    $("html, body").animate({ scrollTop: 0 });
});

// next button
$('#nextPostmatch').click(function(){
    $('#teleopDiv').addClass('d-none');
    $('#postmatchDiv').removeClass('d-none');
    $("html, body").animate({ scrollTop: 0 });
});

// -------------- POSTMATCH DIV -------------- //

// end position buttons
$('#endPos1').click(function(){
    $('#endPos1').addClass('active');
    $('#endPos2').removeClass('active');
    $('#endPos3').removeClass('active');
    $('#endPos4').removeClass('active');
    endPosition = 1;
    updateClimbBonus();
    postmatchQsAnswered();
});

$('#endPos2').click(function(){
    $('#endPos2').addClass('active');
    $('#endPos1').removeClass('active');
    $('#endPos3').removeClass('active');
    $('#endPos4').removeClass('active');
    endPosition = 2;
    updateClimbBonus();
    postmatchQsAnswered();
});

$('#endPos3').click(function(){
    $('#endPos3').addClass('active');
    $('#endPos2').removeClass('active');
    $('#endPos1').removeClass('active');
    $('#endPos4').removeClass('active');
    endPosition = 3;
    updateClimbBonus();
    postmatchQsAnswered();
});

$('#endPos4').click(function(){
    $('#endPos4').addClass('active');
    $('#endPos2').removeClass('active');
    $('#endPos3').removeClass('active');
    $('#endPos1').removeClass('active');
    endPosition = 4;
    updateClimbBonus();
    postmatchQsAnswered();
});

// robot helped others climb buttons
$('#helpOthersClimb0').click(function(){
    $('#helpOthersClimb0').addClass('active');
    $('#helpOthersClimb1').removeClass('active');
    $('#helpOthersClimb2').removeClass('active');
    helpOthersClimb = 0;
    $('#howHelpOthersClimbDiv').addClass('d-none');
    postmatchQsAnswered();
});

$('#helpOthersClimb1').click(function(){
    $('#helpOthersClimb1').addClass('active');
    $('#helpOthersClimb0').removeClass('active');
    $('#helpOthersClimb2').removeClass('active');
    helpOthersClimb = 1;
    $('#howHelpOthersClimbDiv').removeClass('d-none');
    postmatchQsAnswered();
});

$('#helpOthersClimb2').click(function(){
    $('#helpOthersClimb2').addClass('active');
    $('#helpOthersClimb1').removeClass('active');
    $('#helpOthersClimb0').removeClass('active');
    helpOthersClimb = 2;
    $('#howHelpOthersClimbDiv').removeClass('d-none');
    postmatchQsAnswered();
});

// robot helped to climb buttons
$('#helpedToClimbNo').click(function(){
    $('#helpedToClimbNo').addClass('active');
    $('#helpedToClimbYes').removeClass('active');
    helpedToClimb = false;
    $('#howHelpedToClimbDiv').addClass('d-none');
    postmatchQsAnswered();
});

$('#helpedToClimbYes').click(function(){
    $('#helpedToClimbYes').addClass('active');
    $('#helpedToClimbNo').removeClass('active');
    helpedToClimb = true;
    $('#howHelpedToClimbDiv').removeClass('d-none');
    postmatchQsAnswered();
});

// back button
$('#backTeleop').click(function(){
    $('#postmatchDiv').addClass('d-none');
    $('#teleopDiv').removeClass('d-none');
    $("html, body").animate({ scrollTop: 0 });
});

// submit button
$('#submit').click(function(){
    $('#submit').prop('disabled', true);
    $('#submit').text("Loading");
    var totalHatches = sandstormTopHatches + sandstormMidHatches + sandstormLowHatches + teleopTopHatches + teleopMidHatches + teleopLowHatches;
    var totalCargo = sandstormTopCargo + sandstormMidCargo + sandstormLowCargo + teleopTopCargo + teleopMidCargo + teleopLowCargo;
    var howHelpOthersClimb = $('#howHelpOthersClimb').val();
    var howHelpedToClimb = $('#howHelpedToClimb').val();
    var comments = $('#comments').val();
    $.ajax({
        url: 'php-database/sendMatchData.php',
        type: 'POST',
        dataType:'json',
        data: {
            teamNum: teamNum,
            matchNum: matchNum,
            allianceMember: allianceMember,
            startPosition: startPosition,
            endPosition: endPosition,
            leftHAB: (leftHAB ? 1 : 0),
            preload: preload,
            totalPoints: points,
            helpOthersClimb: helpOthersClimb,
            helpedToClimb: (helpedToClimb ? 1 : 0),
            totalHatches: totalHatches,
            totalCargo: totalCargo,
            sandstormTopHatches: sandstormTopHatches,
            sandstormMidHatches: sandstormMidHatches,
            sandstormLowHatches: sandstormLowHatches,
            sandstormTopCargo: sandstormTopCargo,
            sandstormMidCargo: sandstormMidCargo,
            sandstormLowCargo: sandstormLowCargo,
            teleopTopHatches: teleopTopHatches,
            teleopMidHatches: teleopMidHatches,
            teleopLowHatches: teleopLowHatches,
            teleopTopCargo: teleopTopCargo,
            teleopMidCargo: teleopMidCargo,
            teleopLowCargo: teleopLowCargo,
            howHelpOthersClimb: howHelpOthersClimb,
            howHelpedToClimb: howHelpedToClimb,
            comments: comments
        },
        success: function(response) {
            if (response === 1) {
                alert("Match data successfully added to database.");
                $('#' + allianceMember).click();
            } else {
                alert("Error: " . response);
            }
            $('#submit').text("Submit");
            $('#submit').prop('disabled', true);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(thrownError);
        }
    });
});

function postmatchQsAnswered() {
    if (endPosition !== null && helpOthersClimb !== null && helpedToClimb !== null) {
        $('#submit').prop('disabled', false);
    } else {
        $('#submit').prop('disabled', true);
    }
}

// ---------------- FUNCTIONS ---------------- //

// get match number and team number from database, populate text in navbar
function getMatchAndTeam() {
    allianceMember = $('#allianceMember').text().toLowerCase().replace(" ", "");
    $.ajax({
        url: 'php-database/getMatchAndTeam.php',
        type: 'POST',
        dataType:'json',
        data: {
            allianceMember: allianceMember
        },
        success: function(response) {
            if (response == "empty") {
                alert("There are no more matches in the schedule");
                $('#matchNum').text("N/A");
                $('#teamNum').text("N/A");
            } else {
                $('#matchNum').val(response['matchNum']);
                $('#teamNum').text(response[allianceMember]);
                matchNum = $('#matchNum').val();
                teamNum = response[allianceMember];
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(thrownError);
        }
    });
}

function getTeam() {
    if (allianceMember === null) {
        allianceMember = $('#allianceMember').text().toLowerCase().replace(" ", "");
    }
    $.ajax({
        url: 'php-database/getTeam.php',
        type: 'POST',
        dataType:'json',
        data: {
            allianceMember: allianceMember,
            matchNum: matchNum
        },
        success: function(response) {
            if (response == "empty") {
                alert("This match doesn't exist or has already been scouted for this alliance member");
                $('#teamNum').text("N/A");
            } else {
                $('#teamNum').text(response[allianceMember]);
                teamNum = response[allianceMember];
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(thrownError);
        }
    });
}

function clearForm(color) {
    matchNum = null;
    startPosition = null;
    leftHAB = null;
    preload = null;
    allianceColor = color;
    sandstormBonus = 0;
    points = 0;
    endPosition = null;
    climbBonus = 0;
    helpOthersClimb = 0;
    helpedToClimb = null;
    sandstormTopHatches = 0;
    sandstormMidHatches = 0;
    sandstormLowHatches = 0;
    sandstormTopCargo = 0;
    sandstormMidCargo = 0;
    sandstormLowCargo = 0;
    teleopTopHatches = 0;
    teleopMidHatches = 0;
    teleopLowHatches = 0;
    teleopTopCargo = 0;
    teleopMidCargo = 0;
    teleopLowCargo = 0;

    $('#matchNum').val("");
    $('#numPoints').text(points);

    $('#startPos1').removeClass('active');
    $('#startPos2').removeClass('active');
    $('#didNotShow').removeClass('active');

    $('#leftHAB').removeClass('active');
    $('#stayedInHAB').removeClass('active');
    $('#noPreload').removeClass('active');
    $('#cargoPreload').removeClass('active');
    $('#hatchPreload').removeClass('active');

    $('#blueSandstormField').addClass('d-none');
    $('#blueTeleopField').addClass('d-none');
    $('#redSandstormField').addClass('d-none');
    $('#redTeleopField').addClass('d-none');

    for (let i = 1; i <= 20; i++) {
        $("#redHatch" + i).removeClass('active'); 
        $("#redCargo" + i).removeClass('active');
        $("#redHatchTeleop" + i).removeClass('active'); 
        $("#redCargoTeleop" + i).removeClass('active');
        $("#blueHatch" + i).removeClass('active'); 
        $("#blueCargo" + i).removeClass('active'); 
        $("#blueHatchTeleop" + i).removeClass('active'); 
        $("#blueCargoTeleop" + i).removeClass('active');
    }

    $('#endPos1').removeClass('active');
    $('#endPos2').removeClass('active');
    $('#endPos3').removeClass('active');
    $('#endPos4').removeClass('active');
    $('#helpOthersClimb0').removeClass('active');
    $('#helpOthersClimb1').removeClass('active');
    $('#helpOthersClimb2').removeClass('active');
    $('#helpedToClimbNo').removeClass('active');
    $('#helpedToClimbYes').removeClass('active');
    
    $('#howHelpOthersClimbDiv').addClass('d-none');
    $('#howHelpOthersClimb').val("");
    $('#howHelpedToClimbDiv').addClass('d-none');
    $('#howHelpedToClimb').val("");
    $('#comments').val("");

    $('#nextSandstorm').prop('disabled', true);
    $('#nextTeleop').prop('disabled', true);
    $('#submit').prop('disabled', true);
}

function updateSandstormBonus() {
    if (startPosition !== null && leftHAB !== null) {
        points -= sandstormBonus;
        if (leftHAB === true && startPosition === 1) {
            sandstormBonus = 3;
        } else if (leftHAB === true && startPosition === 2) {
            sandstormBonus = 6;
        } else if (leftHAB === false) {
            sandstormBonus = 0;
        }
        points += sandstormBonus;
    }
    $('#numPoints').text(points);
}

function updateClimbBonus() {
    points -= climbBonus;
    if (endPosition === 1) {
        climbBonus = 3;
    } else if (endPosition === 2) {
        climbBonus = 6;
    } else if (endPosition === 3) {
        climbBonus = 12;
    } else if (endPosition === 4) {
        climbBonus = 0;
    }
    points += climbBonus;
    $('#numPoints').text(points);
}

function updateTally(gameTime, type, number, point) {
    // high elements
    if (number === 1 || number === 4 || number === 17 || number === 20) {
        if (type == "hatch") {
            if (gameTime == "sandstorm") {
                sandstormTopHatches += point;
                if (point === -1) {
                    points -= 2;
                } else {
                    points += 2;
                }
            } else if (gameTime == "teleop") {
                teleopTopHatches += point;
                if (point === -1) {
                    points -= 2;
                } else {
                    points += 2;
                }
            }
        } else if (type == "cargo") {
            if (gameTime == "sandstorm") {
                sandstormTopCargo += point;
                if (point === -1) {
                    points -=3;
                } else {
                    points += 3;
                }
            } else if (gameTime == "teleop") {
                teleopTopCargo += point;
                if (point === -1) {
                    points -= 3;
                } else {
                    points += 3;
                }
            }
        }

    // mid elements
    } else if (number == 2 || number == 5 || number == 16 || number == 19) {
        if (type == "hatch") {
            if (gameTime == "sandstorm") {
                sandstormMidHatches += point;
                if (point == -1) {
                    points -= 2;
                } else {
                    points += 2;
                }
            } else if (gameTime == "teleop") {
                teleopMidHatches += point;
                if (point == -1) {
                    points -= 2;
                } else {
                    points += 2;
                }
            }
        } else if (type == "cargo") {
            if (gameTime == "sandstorm") {
                sandstormMidCargo += point;
                if (point == -1) {
                    points -= 3;
                } else {
                    points += 3;
                }
            } else if (gameTime == "teleop") {
                teleopMidCargo += point;
                if (point == -1) {
                    points -= 3;
                } else {
                    points += 3;
                }
            }
        }

    // low elements
    } else {
        if (type == "hatch") {
            if (gameTime == "sandstorm") {
                sandstormLowHatches += point;
                if (point == -1) {
                    points -= 2;
                } else {
                    points += 2;
                }
            } else if (gameTime == "teleop") {
                teleopLowHatches += point;
                if (point == -1) {
                    points -= 2;
                } else {
                    points += 2;
                }
            }
        } else if (type == "cargo") {
            if (gameTime == "sandstorm") {
                sandstormLowCargo += point;
                if (point == -1) {
                    points -= 3;
                } else {
                    points += 3;
                }
            } else if (gameTime == "teleop") {
                teleopLowCargo += point;
                if (point == -1) {
                    points -= 3;
                } else {
                    points += 3;
                }
            }
        }
    }

    // update score on page
    $('#numPoints').text(points);
}

//-----------------------------------------------------------------------//
//--------------------------GAME PIECE BUTTONS---------------------------//
//-----------------------------------------------------------------------//


//---------------------RED SANDSTORM BUTTONS----------------------//

// Create click events for all Red Sandstorm Hatches
for (let i = 1; i <= 20; i++) {
    $("#redHatch" + i).click(function(){
        if ($("#redHatch" + i).hasClass('active')) {
            $("#redHatch" + i).removeClass('active');
            $("#redHatchTeleop" + i).removeClass('active');
            updateTally("sandstorm", "hatch", i, -1);
        } else {
            $("#redHatch" + i).addClass('active');
            $("#redHatchTeleop" + i).addClass('active');
            updateTally("sandstorm", "hatch", i, 1);
        }
    });
}

// Create click events for all Red Sandstorm Cargo
for (let i = 1; i <= 20; i++) {
    $("#redCargo" + i).click(function(){
        if ($("#redCargo" + i).hasClass('active')) {
            $("#redCargo" + i).removeClass('active');
            $("#redCargoTeleop" + i).removeClass('active');
            updateTally("sandstorm", "cargo", i, -1);
        } else {
            $("#redCargo" + i).addClass('active');
            $("#redCargoTeleop" + i).addClass('active');
            updateTally("sandstorm", "cargo", i, 1);
        }
    });
}

//---------------------BLUE SANDSTORM BUTTONS---------------------//

// Create click events for all Blue Sandstorm Hatches
for (let i = 1; i <= 20; i++) {
    $("#blueHatch" + i).click(function(){
        if ($("#blueHatch" + i).hasClass('active')) {
            $("#blueHatch" + i).removeClass('active');
            $("#blueHatchTeleop" + i).removeClass('active');
            updateTally("sandstorm", "hatch", i, -1);
        } else {
            $("#blueHatch" + i).addClass('active');
            $("#blueHatchTeleop" + i).addClass('active');
            updateTally("sandstorm", "hatch", i, 1);
        }
    });
}

// Create click events for all Blue Sandstorm Cargo
for (let i = 1; i <= 20; i++) {
    $("#blueCargo" + i).click(function(){
        if ($("#blueCargo" + i).hasClass('active')) {
            $("#blueCargo" + i).removeClass('active');
            $("#blueCargoTeleop" + i).removeClass('active');
            updateTally("sandstorm", "cargo", i, -1);
        } else {
            $("#blueCargo" + i).addClass('active');
            $("#blueCargoTeleop" + i).addClass('active');
            updateTally("sandstorm", "cargo", i, 1);
        }
    });
}

//-----------------------RED TELEOP BUTTONS-----------------------//

// Create click events for all Red Teleop Hatches
for (let i = 1; i <= 20; i++) {
    $("#redHatchTeleop" + i).click(function(event){
        if ($("#redHatchTeleop" + i).hasClass('active')) {
            $("#redHatchTeleop" + i).removeClass('active');

            updateTally("teleop", "hatch", i, -1);
        } else {
            $("#redHatchTeleop" + i).addClass('active');
            updateTally("teleop", "hatch", i, 1);
        }
    });
}

// Create click events for all Red Teleop Cargo
for (let i = 1; i <= 20; i++) {
    $("#redCargoTeleop" + i).click(function(){
        if ($("#redCargoTeleop" + i).hasClass('active')) {
            $("#redCargoTeleop" + i).removeClass('active');
            updateTally("teleop", "cargo", i, -1);
        } else {
            $("#redCargoTeleop" + i).addClass('active');
            updateTally("teleop", "cargo", i, 1);
        }
    });
}

//-----------------------BLUE TELEOP BUTTONS----------------------//

// Create click events for all Blue Teleop Hatches
for (let i = 1; i <= 20; i++) {
    $("#blueHatchTeleop" + i).click(function(){
        if ($("#blueHatchTeleop" + i).hasClass('active')) {
            $("#blueHatchTeleop" + i).removeClass('active');
            updateTally("teleop", "hatch", i, -1);
        } else {
            $("#blueHatchTeleop" + i).addClass('active');
            updateTally("teleop", "hatch", i, 1);
        }
    });
}

// Create click events for all Blue Teleop Cargo
for (let i = 1; i <= 20; i++) {
    $("#blueCargoTeleop" + i).click(function(){
        if ($("#blueCargoTeleop" + i).hasClass('active')) {
            $("#blueCargoTeleop" + i).removeClass('active');
            updateTally("teleop", "cargo", i, -1);
        } else {
            $("#blueCargoTeleop" + i).addClass('active');
            updateTally("teleop", "cargo", i, 1);
        }
    });
}


