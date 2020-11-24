<?php


class Appointment
{
    private $conn;

    private $db_table = "appointments";

    public $id;
    public $person_id;
    public $time_from;
    public $time_to;
    public $created_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }


    public function getAllAppointments()
    {
        $sqlQuery = "SELECT id, person_id,time_from,time_to created_at FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function createAppointment()
    {
        $sqlQuery = "INSERT INTO
                        " . $this->db_table . "
                    SET
                        person_id = :person_id, 
                        time_from = :time_from, 
                        time_to = :time_to, 
                        created_at = :created_at";

        $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->person_id = htmlspecialchars(strip_tags($this->person_id));
        $this->time_from = htmlspecialchars(strip_tags($this->time_from));
        $this->time_to = htmlspecialchars(strip_tags($this->time_to));
        $this->created_at = htmlspecialchars(strip_tags($this->created_at));

        // bind data
        $stmt->bindParam(":person_id", $this->person_id);
        $stmt->bindParam(":time_from", $this->time_from);
        $stmt->bindParam(":time_to", $this->time_to);
        $stmt->bindParam(":created_at", $this->created_at);

        if ($stmt->execute()) {
            return true;
        }
        print_r($stmt->errorInfo());
        return false;
    }


    public function getPersonalAppointment()
    {
        $sqlQuery = "SELECT
                        id, 
                        person_id, 
                        time_from, 
                        time_to, 
                        created_at
                      FROM
                        " . $this->db_table . "
                    WHERE 
                       id = ?";

        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->person_id = $dataRow['person_id'];
        $this->time_from = $dataRow['time_from'];
        $this->time_to = $dataRow['time_to'];
        $this->created_at = $dataRow['created_at'];
    }


    public function updateAddress()
    {
        $sqlQuery = "UPDATE
                        " . $this->db_table . "
                    SET
                        contact_name = :contact_name, 
                        business_name = :business_name,  
                        address_one = :address_one, 
                        address_two = :address_two, 
                        city = :city, 
                        county = :county, 
                        country = :country, 
                        postcode = :postcode, 
                        address_type = :address_type, 
                        created = :created
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->contact_name = htmlspecialchars(strip_tags($this->contact_name));
        $this->business_name = htmlspecialchars(strip_tags($this->business_name));
        $this->address_one= htmlspecialchars(strip_tags($this->address_one));
        $this->address_two = htmlspecialchars(strip_tags($this->address_two));
        $this->city = htmlspecialchars(strip_tags($this->city));
        $this->county = htmlspecialchars(strip_tags($this->county));
        $this->country = htmlspecialchars(strip_tags($this->country));
        $this->postcode = htmlspecialchars(strip_tags($this->postcode));
        $this->address_type = htmlspecialchars(strip_tags($this->address_type));
        $this->created_at = htmlspecialchars(strip_tags($this->created_at));

        // bind data
        $stmt->bindParam(":contact_name", $this->contact_name);
        $stmt->bindParam(":business_name", $this->business_name);
        $stmt->bindParam(":address_one", $this->address_one);
        $stmt->bindParam(":address_two", $this->address_two);
        $stmt->bindParam(":city", $this->city);
        $stmt->bindParam(":county", $this->county);
        $stmt->bindParam(":country", $this->country);
        $stmt->bindParam(":postcode", $this->postcode);
        $stmt->bindParam(":address_type", $this->address_type);
        $stmt->bindParam(":created_at", $this->created_at);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }


    function deleteAddress()
    {
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

}