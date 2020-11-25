<?php

require_once __DIR__.'/../vendor/autoload.php';

class Appointment extends Database
{
    private $db_table = "appointments";

    protected  $id;
    protected  $person_id;
    protected  $time_from;
    protected  $time_to;
    protected  $created_at;
    protected  $boundary;

    /**
     *
     * Instantiates boundary class
     *
     * @return null
     */
    public function __construct()
    {
        $this->boundary = new BoundaryController();
    }

    /**
     *
     * Creates appointment record
     *
     * @return null
     */
    public function createAppointment($request){
        try {
            $conn = new Database();
            $connection = $conn->getConnection();
            // sanitize
            $this->person_id = htmlspecialchars($request['person_id']);
            $this->time_from = htmlspecialchars($request['appt']);
            $time = strtotime($request['appt']);
            $this->time_to = htmlspecialchars(date("H:i", strtotime('+30 minutes', $time)));
            $this->created_at = date('Y-m-d H:i:s');

            // prepare and bind
            $stmt = $connection->prepare("INSERT INTO " . $this->db_table . " (person_id, time_from, time_to,created_at) VALUES (?, ?, ?,?)");
            $stmt->bind_param("ssss", $person_id, $time_from, $time_to, $created_at);

            // set parameters and execute
            $person_id = $this->person_id;
            $time_from = $this->time_from;
            $time_to = $this->time_to;
            $created_at = $this->created_at;
            $stmt->execute();
            $stmt->close();
            $connection->close();
            $this->boundary->create($request);
            header("Location: /");
            exit();
        }
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }

    /**
     *
     * Gets the appointment record for the person
     *
     * @return array of appointment record
     */
    public function getPersonalAppointment($person_id)
    {
        try {
            $sql = "SELECT * FROM " . $this->db_table . "  WHERE person_id=? ORDER BY time_from ASC ";
            $conn = new Database();
            $connection = $conn->getConnection();
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("i", $person_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = array($row['time_from'],$row['time_to']);
            }
            return $data;
        }
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }


    /**
     *
     * Deletes appointment record
     *
     * @return null
     */
    function deleteAllAppointments($person_id)
    {
        try {
        $sql = "DELETE FROM " . $this->db_table . "  WHERE person_id=?";
        $conn = new Database();
        $connection = $conn->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $person_id);
        $stmt->execute();
        header("Location: /");
        exit();
        }
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }

}