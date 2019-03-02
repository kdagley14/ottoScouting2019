$('#createTables').click(function(){
    $.ajax({
        url: 'php-database/createNewTables.php',
        type: 'POST',
        dataType:'json',
        data: {
        },
        success: function(response) {
            if (response === 1) {
                alert("Tables successfully created.");
            } else {
                alert(response);
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(thrownError);
        }
    });
});

$('#uploadSchedule').click(function(){
    var eventKey = $('#eventKey').val();
    if (eventKey === "") {
        alert("Please enter a value for eventKey");
    } else {
        $.ajax({
            url: 'php-database/uploadMatchSchedule.php',
            type: 'POST',
            dataType:'json',
            data: {
                eventKey: eventKey
            },
            success: function(response) {
                console.log(response);
                if (response === 1) {
                    alert("Match schedule successfully imported.");
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