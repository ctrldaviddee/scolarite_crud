<?php

class DbConnection{

    private $server = 'localhost';

    private $user = "david";

    private $password = "alex@123";

    private $bd = "crud";

    protected $con;

    public function __construct(){

        try {

            $dns = "mysql:host={$this->server}; dbname={$this->bd}";

            $options = array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->con = new PDO($dns, $this->user, $this->password, $options);

            // header("Location: ../index.php");
            

        } catch (PDOException $e) {

            echo $e->getMessage();
            exit;

        }
        
    }

}

$connect = new DbConnection();


?>