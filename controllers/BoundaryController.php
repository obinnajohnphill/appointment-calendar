<?php

require_once __DIR__.'/../vendor/autoload.php';

class BoundaryController extends Boundary
{

    protected $request;

    /**
     * Constructor from calling create boundary method
     * @param array $request
     *
     */
    public function __construct()
    {
        $this->request = $_POST;
        $this->create();

    }

    public function create(){
        if($this->request['from'] AND $this->request['to']){
            if($this->checkIfRecordExists()){
                $this->updateBoundary($this->request);
            }else{
                $this->createBoundary($this->request);
            }
        }
    }
}