<?php
 require('../controllers/TimeListController.php');
 require('../models/Appointment.php');
 $appt1_times = TimeListController::getAppointmentTimes(2);
 $appt2_times = TimeListController::getAppointmentTimes(1);
 $bound_times = TimeListController::getBoundaryTimes();
 $appointment = new Appointment();
 $boundary = new Boundary();
 $appt1 =  $appointment->getPersonalAppointment(1);
 $appt2 =  $appointment->getPersonalAppointment(2);
 $bound1 =  $boundary->getPersonalBoundary(1);
 $bound2 =  $boundary->getPersonalBoundary(2);
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
                    <select name="appt" id="appt1" class="form-control"><?php echo $appt1_times; ?></select>
                </div><br/>
                <div class="form-group">
                    <label for="boundary1">Set a boundary:</label>
                    <p>from <select type="time" class="form-control" id="boundary1" name="from"><?php echo $bound_times; ?></select></p>
                    <p>to  <select  type="time" class="form-control" id="boundary1.2" name="to"><?php echo $bound_times; ?></select></p>
                </div><br/>
                <input name="person_id" value="1" hidden/>
                <button type="submit" class="btn btn-primary">Submit</button><br/><br/>
            </form>
            <p>
              Appointments:
                <?php
                   if (isset($appt1) AND !empty($appt1)){
                      echo json_encode($appt1);
                    }else{
                        echo 'There is no appointment booked yet';
                    }
                ?>
            </p><br/>
            <p>
                Boundary Set:
                <?php
                if (isset($bound1) AND !empty($bound1)){
                    echo json_encode($bound1);
                }else{
                    echo 'There is boundary set yet';
                }
                ?>
            </p><br/>
            <form action="/delete" method="post">
                <input name="person_id" value="1" hidden/>
                <input name="delete" value="yes" hidden/>
               <button type="submit" class="btn btn-danger">Clear Person1 Appt</button><br/><br/>
            </form>
        </div>

        <div class="col-sm-6" style="background-color:lavenderblush;">
            <h3>Person 2 Calendar</h3><br/>
            <form action="/action" method="post">
                <div class="form-group">
                    <label for="appt2">Select a appointment:</label>
                    <select name="appt" id="appt2" class="form-control"><?php echo  $appt2_times; ?></select>
                </div><br>
                <div class="form-group">
                    <label for="boundary2">Set a boundary:</label>
                    <p>from <select type="time" class="form-control" id="boundary2" name="from"><?php echo $bound_times; ?></select></p>
                    <p>to   <select type="time" class="form-control" id="boundary2.2" name="to"><?php echo $bound_times; ?></select></p>
                </div><br/>
                <input name="person_id" value="2" hidden/>
                <button type="submit" class="btn btn-primary">Submit</button><br/><br/>
            </form>
            <p>
                Appointments:
                <?php
                if (isset($appt2) AND !empty($appt2)){
                    echo json_encode($appt2);
                }else{
                    echo 'There is no appointment booked yet';
                }
                ?>
            </p><br/>
            <p>
                Boundary Set:
                <?php
                if (isset($bound2) AND !empty($bound2)){
                    echo json_encode($bound2);
                }else{
                    echo 'There is boundary set yet';
                }
                ?>
            </p><br/>
            <form action="/delete" method="post">
                <input name="person_id" value="2" hidden/>
                <input name="delete" value="yes" hidden/>
                <button type="submit" class="btn btn-danger">Clear Person2 Appt</button><br/><br/>
            </form>
        </div>
    </div>
</div>
</body>
</html>


