<?php

require_once __DIR__.'/../vendor/autoload.php';

class BoundaryController extends Boundary
{

    protected $request;


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