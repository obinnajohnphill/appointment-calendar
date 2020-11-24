<?php

require_once __DIR__.'/../vendor/autoload.php';

class AppointmentController extends Appointment
{

    protected $request;

    /**
     * Constructor from calling create appointment method
     * @param BoundaryController $boundary
     */
    public function __construct(BoundaryController $boundary)
    {
        $this->request = $_POST;
        $this->create();
        $boundary->createBoundary();

    }

    public function create(){
        if($this->request['appt']){
            $this->createAppointment($this->request);
        }
    }

}