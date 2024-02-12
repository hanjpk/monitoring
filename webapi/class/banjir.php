<?php
class Nodemcu_log
{

    // Connection
    private $conn;

    // Table
    private $db_table = "dht11";

    // Columns
    public $id;
    public $suhu;
    public $kelembaban;
    public $waktu;

    // Db connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // CREATE
    public function createLogData()
    {
        $sqlQuery = "INSERT INTO
                        " . $this->db_table . "
                    SET
                        suhu = :suhu,
                        kelembaban = :kelembaban ";
        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->suhu = htmlspecialchars(strip_tags($this->suhu));
        $this->kelembaban = htmlspecialchars(strip_tags($this->kelembaban));

        // bind data
        $stmt->bindParam(":suhu", $this->suhu);
        $stmt->bindParam(":kelembaban", $this->kelembaban);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
