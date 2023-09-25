<?php
require_once "database.php";
class customersUser
{
    public $db = NULL;
    public int $id = 0;
    public string $startDatePlanned = "";
    public string $endDatePlanned = "";
    public string $startDateReal = "";
    public string $endDateReal = "";
    public int $id_customers = 0;
    public int  $id_dates = 0;
    public int $id_users = 0;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAddressCustomer()
    {
        $query = 'SELECT jg7b_customers.id, `name`
              FROM jg7b_customersusers
              INNER JOIN jg7b_customers ON jg7b_customersusers.id_customers = jg7b_customers.id
              WHERE jg7b_customersusers.id_users = :id_users AND jg7b_customersusers.id_dates = :id_dates;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id_users', $this->id_users, PDO::PARAM_STR);
        $request->bindValue(':id_dates', $this->id_dates, PDO::PARAM_STR);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateDateReal($column)
    {
        $query = 'UPDATE jg7b_customersusers
    SET ' . $column . ' = TIME(NOW())
    WHERE id_users = :id_users AND id_customers = :id_customers AND id_dates = :id_dates;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id_users', $this->id_users, PDO::PARAM_STR);
        $request->bindValue(':id_dates', $this->id_dates, PDO::PARAM_STR);
        $request->bindValue(':id_customers', $this->id_customers, PDO::PARAM_STR);
        return $request->execute();
    }
}

