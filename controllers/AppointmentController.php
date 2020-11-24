<?php

require_once __DIR__.'/../vendor/autoload.php';

class AppointmentController extends Appointment
{

    protected $request;

    /**
     * Constructor from calling create appointment method
     * @param array $request
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
        $this->create();

    }

    public function create(){
        if($this->request['appt']){
            $this->createAppointment($this->request);
        }
    }

}