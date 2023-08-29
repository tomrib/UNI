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
    public string $contra = "";
    public string $cq = "";
    public int $id_Who  = 1;

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
        $query = 'INSERT INTO `jg7b_users`(`lastname`, `firstname`, `email`, `password`, `address`, `phone`, `contra`, `cq`,`id_Who`) 
        VALUES (:lastname,:firstname,:email,:password,:address,:phone,:phone,:contra,1);';
        $request = $this->db->prepare($query);
        $request->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $request->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->bindValue(':password', $this->password, PDO::PARAM_STR);
        $request->bindValue(':address', $this->address, PDO::PARAM_STR);
        $request->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $request->bindValue(':contra', $this->contra, PDO::PARAM_STR);
        $request->bindValue(':cq', $this->cq, PDO::PARAM_STR);
        return $request->execute();
    }

    public function listUser()
    {
        $query = 'SELECT `id`, `lastname`, `firstname`, `email`, `address`, `phone`, `contra`, `cq`, `id_Who`
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
        $query = 'SELECT `id`,`id_Who`
        FROM `jg7b_users` 
        WHERE email = :email';
        $request = $this->db->prepare($query);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_ASSOC);
    }
}
