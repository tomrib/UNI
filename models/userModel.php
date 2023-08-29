<?php
require_once "database.php";
class user
{
    public $db = NULL;
    public int $id = 0;
    public string $lastname = "";
    public string $firstname = "";
    public string $email = "";
    public string $password = "";
    public string $address = "";
    public int $phone = 0;
    public string $socialInsuranceNumber = "";
    public int $id_usersTypes  = 0;
    public int $id_contractsTypes = 0;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function addUser()
    {
        $query = 'INSERT INTO `jg7b_users`(`lastname`, `firstname`, `email`, `password`, `address`, `phone`, `socialInsuranceNumber`,`id_usersTypes`,`id_contractsTypes`) 
        VALUES (:lastname,:firstname,:email,:password,:address,:phone,:contra,:socialInsuranceNumber,1,:id_contractsTypes);';
        $request = $this->db->prepare($query);
        $request->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $request->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->bindValue(':password', $this->password, PDO::PARAM_STR);
        $request->bindValue(':address', $this->address, PDO::PARAM_STR);
        $request->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $request->bindValue(':socialInsuranceNumber', $this->socialInsuranceNumber, PDO::PARAM_STR);
        $request->bindValue(':id_contractsTypes', $this->id_contractsTypes, PDO::PARAM_STR);
        return $request->execute();
    }

    public function listUser()
    {
        $query = 'SELECT `id`, `lastname`, `firstname`, `email`, `address`, `phone`, `contra`, `socialInsuranceNumber`, `id_contractsTypes`
        FROM `jg7b_users`;';
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function checkIfUserExists($column)
    {
        $query = 'SELECT count(' . $column . ') 
        FROM `jg7b_users` 
        WHERE ' . $column . ' = :' . $column;
        $request = $this->db->prepare($query);
        $request->bindValue(':' . $column, $this->$column, PDO::PARAM_STR);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getPassword()
    {
        $query = 'SELECT password 
        FROM `jg7b_users` 
        WHERE email = :email';
        $request = $this->db->prepare($query);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }

    public function getIds()
    {
        $query = 'SELECT `id`,`id_usersTypes`
        FROM `jg7b_users` 
        WHERE email = :email';
        $request = $this->db->prepare($query);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteUser()
    {
        $query = 'DELETE FROM `jg7b_users` WHERE id = :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $request->execute();
    } 
}
