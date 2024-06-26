<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance System</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <style>
        body {
            background-image: url('images/bill.jpg');
            background-size: cover;
            background-attachment: fixed;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: background-image 1s ease-in-out; /* Added transition for smoother image changes */
        }

        .container {
            background-color: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            transition: background-color 0.3s ease-in-out;
            margin-left: 210px; /* Adjust margin-left to move the container to the left */
        }

        .login-logo img {
            max-width: 100%;
        }
         h1 {
            font-weight: bold;
            font-size: 31px;
            margin-top: 10px;
            margin-bottom: 50px;
            font-family: 'Argent CF', sans-serif;
        }

        h3 {
            color: #007bff;
            text-align: center;
            margin-bottom: 20px;
        }

        select,
        input {
            margin-bottom: 20px;
            width: 100%;
            font-size: 18px;
            padding: 10px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: 1px solid #007bff;
            width: 100%;
            font-size: 18px;
            padding: 10px;
            transition: background-color 0.3s ease-in-out;
        }

        button:hover {
            background-color: #0056b3;
        }

        .alert {
            margin-top: 20px;
            text-align: center;
        }

        .alert-danger {
            background-color: red;
            border: 1px solid #f5c6cb;
            color: white;
        }

        .alert-success{
            background-color: white;
            border: 1px solid white;
            color: black;
        }

        #date,
        #time {
            color: black;
            font-family: Arial, sans-serif;
            font-size: 25px;
            margin-bottom: 20px;
            text-align: center;
        }
        .container1{
            background-color: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 430px; /* Adjust maximum width */
            height: 500px; /* Adjust height */
            width: 50%; /* Adjust width */
            transition: background-color 0.3s ease-in-out;
            margin-right: 200px; /* Adjust margin-left to move the container to the left */
        }
          /* Circle styles */
        .circle {
            width: 79px;
            height: 79px;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 50%;
            position: absolute;
            top: 92%;
            left: 95%;
            transform: translate(-50%, -50%);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border: 2px solid maroon;
            background-image: url('images/programmer.gif');
            background-size: cover;
            transition: background-image 1s ease-in-out; /* Added transition for smoother image changes */
            z-index: 0; /* Ensure it's behind the content */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center mb-4 login-logo">
            <img class="img-fluid" src="images/UC1.png" alt="Logo">
        </div>
        <h3>Enter Employee ID</h3>
        <p id="date"></p>
        <p id="time"></p>
        <form id="attendance">
            <div class="form-group">
                <select class="form-control" name="status">
                    <option value="in">Time In</option>
                    <option value="out">Time Out</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="employee" name="employee" placeholder="Employee ID" required>
            </div>
            <button type="submit" class="btn btn-primary">Sign In</button>
        </form>
        <footer style="text-align: center; margin-top: 20px; font-size: 15px">
             <p>Forgot to Time In? <a href="http://localhost/attendtrack/tito.php" id="forgot-link">Click here</a></p>
        </footer>
    </div>
    <div class="container1" style="text-align: center;">
        <div class="alert alert-success" style="display:none;">
            <span class="result"><i class="icon fa fa-check"></i> <span class="message"></span></span>
        </div>
        <div class="alert alert-danger" style="display:none;">
            <span class="result"><i class="icon fa fa-warning"></i> <span class="message"></span></span>
        </div>
        <img class="img-fluid1" src="images/4foo.gif" alt="Logo" style="display: block; margin: 0 auto; width: 190px; height: auto; margin-top: 30px;">
        <h1 style="font-weight: bold; font-size: 31px; margin-top: 10px; margin-bottom: 50px; font-family: 'Argent CF', sans-serif;">Good morning! Wishing you a day filled with positivity, productivity, and endless possibilities.</h1>
    </div>
    <!-- <div class="circle"></div> -->
    <?php include 'scripts.php' ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script type="text/javascript">

// Variable to track if a submission is allowed
var submissionAllowed = true;

// Function to enable submission after a delay
function enableSubmission() {
    submissionAllowed = true;
}

setInterval(function() {
    $('#employee').focus();
}, 7000);

$(function() {
    // Background image rotation setup
    var images = ['images/bill.jpg', 'images/bill2.jpg']; // List of background images
    var currentIndex = 0; // Index of the current background image

    function changeBackground() {
        $('body').css('background-image', 'url(' + images[currentIndex] + ')');
        currentIndex = (currentIndex + 1) % images.length;
    }
    // Change background every 30 seconds
    setInterval(changeBackground, 30000);

    // Date and time update setup
    setInterval(function() {
        var momentNow = moment();
        $('#date').html(momentNow.format('dddd').substring(0, 3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));
        $('#time').html(momentNow.format('hh:mm:ss A'));
    }, 1000);

    // Function to reset the page state
    function resetPage() {
        $('.alert').hide();
        $('.img-fluid1').show();
        $('h1').show();
    }

    // Form submission handling
    $('#attendance').submit(function(e) {
        e.preventDefault();

        if (!submissionAllowed) {
            return;
        }

        // Disable submission
        submissionAllowed = false;

        var attendance = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'attendance.php',
            data: attendance,
            dataType: 'json',
            success: function(response) {
                if (response.error) {
                    $('.alert').hide();
                    $('.alert-danger').show();
                    $('.message').html(response.message);
                    $('#employee').val('');
                    $('.img-fluid1').hide();
                    $('h1').hide();

                    // Enable submission after 3 seconds
                    setTimeout(enableSubmission, 500);
                } else {
                    $('.alert').hide();
                    $('.alert-success').show();
                    $('.message').html(response.message);
                    $('#employee').val('');
                    $('#employee').focus();
                    // Hide welcome text only
                    $('h1').hide();
                    $('.img-fluid1').hide();

                    // Enable submission after 1 second
                    setTimeout(enableSubmission, 500);

                    // Set a timer to reset the page state after 60 seconds
                    setTimeout(resetPage, 60000);
                }
            }
        });
    });

    // New code to set default select option based on time
    function setDefaultOption() {
        const currentTime = moment();
        const currentHour = currentTime.hour();

        let defaultOption;
        if (currentHour >= 12 && currentHour < 13) {
            defaultOption = "out"; 
        } else if (currentHour >= 13 && currentHour < 17) {
            defaultOption = "in"; 
        } else if (currentHour >= 17) {
            defaultOption = "out"; 
        } else {
            defaultOption = "in"; 
        }

        $('select[name="status"]').val(defaultOption).change(); // Set the default value and trigger the change event
    }

    setDefaultOption(); // Set the initial default option
    setInterval(setDefaultOption, 60000); // Update every minute to ensure accuracy

    // Event handling for changing the select option color
    $('select[name="status"]').change(function() {
        var selectedOption = $(this).val();
        if (selectedOption === "in") {
            $(this).css({
                'background-color': 'green',
                'color': 'white'
            });
            $('button[type="submit"]').text("Sign In"); // Change button text to "Sign In"
        } else if (selectedOption === "out") {
            $(this).css({
                'background-color': 'red',
                'color': 'white'
            });
            $('button[type="submit"]').text("Sign Out"); // Change button text to "Sign Out"
        }
    }).change(); // Trigger the change event to ensure correct styling

    // Initial focus on employee input field
    $('#employee').focus();
});

</script>
</body>
</html>