<?php

require_once __DIR__.'/../vendor/autoload.php';

class AppointmentController extends BoundaryController
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
        $this->createAppointment();
    }

    /**
     *
     * Get times as option-list.
     *
     * @return string List of times
     */
    function getTimes (): string {

        $default = '00:00';
        $interval = '+30 minutes';
        $output = '';

        $current = strtotime('00:00');
        $end = strtotime('23:59');

        while ($current <= $end) {
            $time = date('H:i', $current);
            $sel = ($time == $default) ? ' selected' : '';

            $output .= "<option value=\"{$time}\"{$sel}>" . date('h.i A', $current) .'</option>';
            $current = strtotime($interval, $current);
        }

        return $output;
    }

    public function createAppointment(){
        var_dump($this->request);
        die();
    }

}