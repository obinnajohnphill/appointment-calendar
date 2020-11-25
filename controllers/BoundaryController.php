<?php

require_once __DIR__.'/../vendor/autoload.php';

class BoundaryController extends Boundary
{

    protected $request;

    /**
     *
     * Checks if boundary record exists and update or create accordingly
     *
     * @return null
     */
    public function create($request){
        $this->request = $request;
        if($this->request['from'] AND $this->request['to']){
            if($this->checkIfRecordExists()){
                $this->updateBoundary($this->request);
            }else{
                $this->createBoundary($this->request);
            }
        }
    }
}