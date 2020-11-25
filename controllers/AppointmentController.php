<?php

require_once __DIR__.'/../vendor/autoload.php';

class AppointmentController extends Appointment
{

    protected $request;
    protected $boundary;

    /**
     * Constructor that calls create appointment method
     * Sets up boundary class via dependency injection
     * @param $request
     * @param BoundaryController $boundary
     */
    public function __construct($request, BoundaryController $boundary)
    {
        $this->request = $request;
        $this->boundary = $boundary;
        if($this->request['delete'] == 'yes'){
            $this->delete();
        }else{
            $this->create();
        }

    }

    /**
     * Calls the create appointment model method
     *
     * @return null
     */
    public function create(){
        if($this->request['appt']){
            $this->createAppointment($this->request);
        }

    }


    /**
     * Calls the delete appointment model method
     *
     * @return null
     */
    public function delete(){
       $this->deleteAllAppointments($this->request['person_id']);
    }

}