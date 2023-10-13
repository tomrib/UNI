<?php
require_once "database.php";

class customer
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

    public function addCustomer()
    {
        $query = 'INSERT INTO `jg7b_customers`(
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

    public function listCustomer()
    {
        $query = 'SELECT
        `id`,
        `name`,
        `contactName`,
        `address`,
        `phone`,
        `email`
    FROM
        `jg7b_customers`
        ORDER BY
        jg7b_customers.name ASC';
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCustomerOne()
    {
        $query = 'SELECT
        `id`,
        `name`,
        `contactName`,
        `address`,
        `phone`,
        `email`
    FROM
        `jg7b_customers`
        WHERE jg7b_customers.id = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_OBJ);
    }

    public function updateCustomer()
    {
        $query = 'UPDATE
        `jg7b_customers`
    SET
        `name` = :name,
        `contactName` = :contactName,
        `address` = :address,
        `phone` = :phone,
        `email` = :email
    WHERE
        jg7b_customers.id = :id ;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->bindValue(':name', $this->name, PDO::PARAM_STR);
        $request->bindValue(':contactName', $this->contactName, PDO::PARAM_STR);
        $request->bindValue(':address', $this->address, PDO::PARAM_STR);
        $request->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        return $request->execute();
    }

    public function deleteCustomer()
    {
        $query = 'DELETE FROM `jg7b_customers`
    WHERE
        jg7b_customers.id = :id ;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $request->execute();
    }

    public function checkIfCustomersExist($column)
    {
        $query = 'SELECT count(' . $column . ') 
        FROM `jg7b_customers` 
        WHERE ' . $column . ' = :' . $column;
        $request = $this->db->prepare($query);
        $request->bindValue(':' . $column, $this->$column, PDO::PARAM_STR);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getCustomerAddAdmin()
    {
        $query = 'SELECT
        `id`,
        `address`
    FROM
    `jg7b_customers`';
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
}
