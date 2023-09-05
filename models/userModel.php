<?php
require_once "database.php";
class user
{
    public $db = NULL;
    public int $id = 0;
    public string $lastname = "";
    public string $firstname = "";
    public string $birthday = "";
    public string $email = "";
    public string $password = "";
    public string $address = "";
    public string $phone = "";
    public string $socialInsuranceNumber = "";
    public int $id_usersTypes  = 0;
    public int $id_contractsTypes = 0;
    public string $beginningContract = "";
    public string $endContract = "";

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
        $query = 'INSERT INTO `jg7b_users`(`lastname`, `firstname`,`birthday`,`email`, `password`, `address`, `phone`, `socialInsuranceNumber`, `id_usersTypes`, `id_contractsTypes`,`beginningContract`,`endContract`) 
        VALUES (:lastname,:firstname,:birthday,:email,:password,:address,:phone,:socialInsuranceNumber,1,:id_contractsTypes,:beginningContract,:endContract);';
        $request = $this->db->prepare($query);
        $request->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $request->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $request->bindValue(':birthday', $this->birthday, PDO::PARAM_STR);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->bindValue(':password', $this->password, PDO::PARAM_STR);
        $request->bindValue(':address', $this->address, PDO::PARAM_STR);
        $request->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $request->bindValue(':socialInsuranceNumber', $this->socialInsuranceNumber, PDO::PARAM_STR);
        $request->bindValue(':id_contractsTypes', $this->id_contractsTypes, PDO::PARAM_STR);
        $request->bindValue(':beginningContract', $this->beginningContract, PDO::PARAM_STR);
        $request->bindValue(':endContract', $this->endContract, PDO::PARAM_STR);
        return $request->execute();
    }

    public function listUser()
    {
        $query = 'SELECT
        jg7b_users.id AS id,
        `lastname`,
        `firstname`,
        `birthday`,
        `email`,
        `password`,
        `address`,
        `phone`,
        `socialInsuranceNumber`,
        `id_usersTypes`,
        `beginningContract`,
        `endContract`,
        jg7b_contractstypes.name AS contra
    FROM
        `jg7b_users`
    INNER JOIN `jg7b_contractstypes` ON jg7b_users.id_contractsTypes = jg7b_contractstypes.id
    ORDER BY
        jg7b_users.id DESC;';
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

    //getUserOne per permet d affiche les infomation pour l update dans les champ coresponden
    public function getUserOne()
    {
        $query = 'SELECT
        jg7b_users.id,
        lastname,
        firstname,
        birthday,
        email,
        PASSWORD,
        address,
        phone,
        socialInsuranceNumber,
        beginningContract,
        endContract,
        jg7b_userstypes.name AS usersType,jg7b_userstypes.id AS usersTypeId,
        jg7b_contractstypes.id AS contraId,
        jg7b_contractstypes.name AS contra
    FROM
        `jg7b_users`
    INNER JOIN jg7b_contractstypes ON jg7b_users.id_contractsTypes = jg7b_contractstypes.id
    INNER JOIN jg7b_userstypes ON jg7b_users.id_usersTypes = jg7b_userstypes.id
    WHERE
        jg7b_users.id = :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_STR);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateUser()
    {
        $query = 'UPDATE `jg7b_users`
        SET `lastname` = :lastname,
        `firstname` = :firstname,
        `birthday` = :birthday
        `email` = :email,
        `address` = :address,
        `phone` = :phone,
        `socialInsuranceNumber` = :socialInsuranceNumber,
        `id_usersTypes` = :id_usersTypes,
        `id_contractsTypes` = :id_contractsTypes,
        `beginningContract` = :beginningContract,
        `endContract` = :endContract
        WHERE jg7b_users.id = :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $request->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $request->bindValue(':birthday', $this->birthday, PDO::PARAM_STR);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->bindValue(':address', $this->address, PDO::PARAM_STR);
        $request->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $request->bindValue(':socialInsuranceNumber', $this->socialInsuranceNumber, PDO::PARAM_STR);
        $request->bindValue(':id_usersTypes', $this->id_usersTypes, PDO::PARAM_INT);
        $request->bindValue(':id_contractsTypes', $this->id_contractsTypes, PDO::PARAM_INT);
        $request->bindValue(':beginningContract', $this->beginningContract, PDO::PARAM_STR);
        $request->bindValue(':endContract', $this->endContract, PDO::PARAM_STR);
        return $request->execute();
    }

    public function seachUser()
    {
        $query = 'SELECT
        jg7b_users.id AS id,
        `lastname`,
        `firstname`,
        `birthday`,
        `email`,
        `password`,
        `address`,
        `phone`,
        `socialInsuranceNumber`,
        `id_usersTypes`,
        `beginningContract`,
        `endContract`,
        jg7b_contractstypes.name AS contra
    FROM
        `jg7b_users`
    INNER JOIN `jg7b_contractstypes` ON jg7b_users.id_contractsTypes = jg7b_contractstypes.id
   WHERE lastname LIKE %:lastname% OR firstname LIKE %:firstname% OR birthday LIKE %:birthday% OR email LIKE %:email%
   OR address LIKE %:address% OR phone LIKE %:phone% OR socialInsuranceNumber LIKE %:socialInsuranceNumber%;';
        $request = $this->db->prepare($query);
        $request->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $request->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $request->bindValue(':birthday', $this->birthday, PDO::PARAM_STR);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->bindValue(':address', $this->address, PDO::PARAM_STR);
        $request->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $request->bindValue(':socialInsuranceNumber', $this->socialInsuranceNumber, PDO::PARAM_STR);
        $request->bindValue(':beginningContract', $this->beginningContract, PDO::PARAM_STR);
        $request->bindValue(':endContract', $this->endContract, PDO::PARAM_STR);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
}
