<?php
 require('../controllers/AppointmentController.php');
 $times = AppointmentController::getTimes();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Appointment Calendar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a href="#" class="navbar-brand">Appointment Calendar</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>

<div class="container">
    <div class="jumbotron">
        <h6>Book Appointment for two persons (1 & 2)</h6><br/>
    </div>
    <div class="row">
        <div class="col-sm-6" style="background-color:lavender;">
            <h3>Person 1 Calendar</h3><br/>
            <form action="/action" method="post">
                <div class="form-group">
                    <label for="appt1">Select a appointment:</label>
                    <select name="person_1_appt" id="appt1" class="form-control"><?php echo $times; ?></select>
                </div><br/>
                <div class="form-group">
                    <label for="boundary1">Set a boundary:</label>
                    <p>from <select type="time" class="form-control" id="boundary1" name="person_1_from"><?php echo $times; ?></select></p>
                    <p>to  <select  type="time" class="form-control" id="boundary1.2" name="person_1_to"><?php echo $times; ?></select></p>
                </div><br/>
                <input name="person1_id" value="1"hidden/>
                <button type="submit" class="btn btn-primary">Submit</button><br/><br/>
            </form>
        </div>

        <div class="col-sm-6" style="background-color:lavenderblush;">
            <h3>Person 2 Calendar</h3><br/>
            <form action="/action" method="post">
                <div class="form-group">
                    <label for="appt2">Select a appointment:</label>
                    <select name="person_2_appt" id="appt2" class="form-control"><?php echo $times; ?></select>
                </div><br>
                <div class="form-group">
                    <label for="boundary2">Set a boundary:</label>
                    <p>from <select type="time" class="form-control" id="boundary2" name="person_2_from"><?php echo $times; ?></select></p>
                    <p>to   <select type="time" class="form-control" id="boundary2.2" name="person_2_to"><?php echo $times; ?></select></p>
                </div><br/>
                <input name="person2_id" value="2"hidden/>
                <button type="submit" class="btn btn-primary">Submit</button><br/><br/>
            </form>
        </div>
    </div>
</div>
</body>
</html>


