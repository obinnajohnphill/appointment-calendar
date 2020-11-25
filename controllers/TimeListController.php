<?php


class TimeListController
{
    /**
     *
     * Get times as option-list.
     *
     * @return string List of times
     */
     public function getAppointmentTimes($person_id): string {

         $boundary = new Boundary();
         $data = $boundary->getPersonalBoundary($person_id);

        $default = '00:00';
        $interval = '+30 minutes';
        $output = '';

        //$current = strtotime('00:00');
        //$end = strtotime('23:59');

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
     *
     * Get times as option-list.
     *
     * @return string List of times
     */
    public function getBoundaryTimes($person_id): string {

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