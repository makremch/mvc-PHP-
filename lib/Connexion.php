<?php
class Connexion {
    private  $instance = NULL;

    function __construct()
    {
        if (!isset($this->instance)) {
            $servername = "localhost";
            $username = "root";
            $password = "root";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=EL-Pescador", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->instance=$conn;
             } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

        }
        //return self::$instance;
    }
    public function getInstance(){
        return ($this->instance);
    }

}
?>