<?php


class TimeListController
{
    /**
     * Get available appointments
     *
     * @return string list of times
     */
     public function getAppointmentTimes($person_id): string {

         $boundary = new Boundary();
         $data = $boundary->getPersonalBoundary($person_id);

        $default = '00:00';
        $interval = '+30 minutes';
        $output = '';

         $current = strtotime($data[0][0]);
         $end = strtotime(  $data[0][1]);

         while ($current <= $end) {
            $time = date('H:i', $current);
            $sel = ($time == $default) ? ' selected' : '';

            $output .= "<option value=\"{$time}\"{$sel}>" . date('h.i A', $current) .'</option>';
            $current = strtotime($interval, $current);
         }

        return $output;
    }


    /**
     * Get available boundary times
     *
     * @return string list of times
     */
    public function getBoundaryTimes(): string {

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