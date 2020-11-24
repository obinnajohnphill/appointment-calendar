<?php


class TimeListController
{
    protected $appointment;
    protected $boundary;

    /**
     * Constructor from calling create appointment method
     * @param AppointmentController $appointment
     * @param BoundaryController $boundary
     */
    public function __construct(AppointmentController $appointment, BoundaryController $boundary)
    {
        $this->appointment = $appointment;
        $this->boundary =  $boundary;
        $this->getTimes();
    }

    /**
     *
     * Get times as option-list.
     *
     * @return string List of times
     */
     public function getTimes(): string {

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

}