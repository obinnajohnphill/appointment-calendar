<?php

require_once __DIR__.'/../vendor/autoload.php';

class AppointmentController extends Appointment
{

    protected $request;
    protected $boundary;

    /**
     * Constructor from calling create appointment method
     * @param $request
     * @param BoundaryController $boundary
     */
    public function __construct($request, BoundaryController $boundary)
    {
        $this->request = $request;
        $this->boundary = $boundary;
        $this->create();


    }

    public function create(){
        if($this->request['appt']){
            $this->createAppointment($this->request);
        }

    }

}