<?php


class Boundary
{
    private $conn;

    private $db_table = "boundaries";

    public $id;
    public $person_id;
    public $time_from;
    public $time_to;
    public $created_at;


    public function createBoundary($request){
        try {
            $conn = new Database();
            $connection = $conn->getConnection();
            // sanitize
            $this->person_id = htmlspecialchars($request['person_id']);
            $this->time_from = htmlspecialchars($request['from']);
            $this->time_to = htmlspecialchars($request['to']);
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
            header("Location: /");
            exit();
        }
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }


    public function getPersonalBoundary($person_id)
    {
        try {
            $sql = "SELECT * FROM " . $this->db_table . "  WHERE person_id=?";
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



    function deleteAllBoundaries($person_id)
    {
        try {
            $sql = "DELETE FROM " . $this->db_table . "  WHERE person_id=?";
            $conn = new Database();
            $connection = $conn->getConnection();
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("i", $person_id);
            $stmt->execute();
        }
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }

}