<?php
require_once "database.php";

class business
{
    public $db = NULL;
    public int $id = 0;
    public string $name = "";
    public string $contactName = "";
    public string $address = "";
    public string $phone = "";
    public string $email = "";

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function addCustommer()
    {
        $query = 'INSERT INTO `jg7b_business`(
            `name`,
            `contactName`,
            `address`,
            `phone`,
            `email`
        )
        VALUES(
            :name,
            :contactName,
            :address,
            :phone,
            :email
        )';
                $request = $this->db->prepare($query);
                $request->bindValue(':name', $this->name, PDO::PARAM_STR);
                $request->bindValue(':contactName', $this->contactName, PDO::PARAM_STR);
                $request->bindValue(':address', $this->address, PDO::PARAM_STR);
                $request->bindValue(':phone', $this->phone, PDO::PARAM_STR);
                $request->bindValue(':email', $this->email, PDO::PARAM_STR);
                return $request->execute();
    }

    public function getCustommer(){
        
    }
}
