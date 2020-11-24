<?php

// Include router class
include('../routes/Route.php');

##.......WEB Routes.........
Route::add('/',function(){
    require '../views/index.php';
});

Route::add('/action',function(){
    require '../controllers/AppointmentController.php';
    new AppointmentController($_POST, new BoundaryController());
},'post');

Route::run('/');

