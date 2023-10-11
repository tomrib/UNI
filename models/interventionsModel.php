<?php
require_once "database.php";
class interventions
{
    public $db = NULL;
    public int $id = 0;
    public string $text = "";
    public string $interventionDate = "";
    public string $interventionTime = "";
    public string $reportingDate = "";
    public string $reportingTime = "";
    public int $id_customers = 0;
    public int $id_users = 0;
    public int $id_typesInterventions = 0;
    public int $id_subcontractor = 0;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function addIntervention()
    {
        $query = 'INSERT INTO `jg7b_interventions`(
            `text`,
            `reportingDate`,
            `reportingTime`,
            `id_customers`,
            `id_users`,
            `id_typesInterventions`
        )
        VALUES(
            :text,
            :reportingDate,
            :reportingTime,
            :id_customers,
            :id_users,
            :id_typesInterventions
        );';
        $request = $this->db->prepare($query);
        $request->bindValue(':text', $this->text, PDO::PARAM_STR);
        $request->bindValue(':reportingDate', $this->reportingDate, PDO::PARAM_STR);
        $request->bindValue(':reportingTime', $this->reportingTime, PDO::PARAM_STR);
        $request->bindValue(':id_customers', $this->id_customers, PDO::PARAM_INT);
        $request->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $request->bindValue(':id_typesInterventions', $this->id_typesInterventions, PDO::PARAM_INT);

        // Exécution de la requête préparée
        if ($request->execute()) {
            // Récupération de l'ID 
            $lastInsertId = $this->db->lastInsertId();
            return $lastInsertId;
        } else {
            return false;
        }
    }

    public function listIntervention()
    {
        $query = 'SELECT
        jg7b_interventions.id AS id,
        text,
        reportingDate,
        jg7b_typesinterventions.name,
        jg7b_customers.address
    FROM
        jg7b_interventions
        INNER JOIN jg7b_typesinterventions ON jg7b_interventions.id_typesInterventions = jg7b_typesinterventions.id
        INNER JOIN jg7b_customers ON jg7b_interventions.id_customers = jg7b_customers.id;
        ';
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function getInterventionOne()
    {
        $query = 'SELECT
        jg7b_interventions.id AS id,
        text,
        interventionDate,
        jg7b_users.lastname AS userLastname,
        jg7b_users.firstname AS userFirstname,
        jg7b_typesinterventions.name AS interventionType,
        jg7b_customers.address AS customerAddress,
        jg7b_customers.name AS customerName,
        jg7b_customers.phone AS customerPhone,
        jg7b_customers.email AS customerEmail
    FROM
        `jg7b_interventions`
    INNER JOIN jg7b_customers ON jg7b_interventions.id_customers = jg7b_customers.id
    INNER JOIN jg7b_users ON jg7b_interventions.id_users = jg7b_users.id
    INNER JOIN jg7b_typesinterventions ON jg7b_interventions.id_typesInterventions = jg7b_typesinterventions.id
    WHERE
        jg7b_interventions.id = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_OBJ);
    }

    public function updateIntervention()
    {
        $query = 'UPDATE
        `jg7b_interventions`
    SET
        `id_customers` = :id_customers
    WHERE
        jg7b_interventions.id = :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->bindValue(':id_customers', $this->id_customers, PDO::PARAM_STR);
        return $request->execute();
    }

    public function deleteIntervention()
    {
        $query = 'DELETE
        FROM
            `jg7b_interventions`
        WHERE
          jg7b_interventions.id = :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $request->execute();
    }

    public function checkIfInterventionExist($column)
    {
        $query = 'SELECT count(' . $column . ') 
        FROM `jg7b_customers` 
        WHERE ' . $column . ' = :' . $column;
        $request = $this->db->prepare($query);
        $request->bindValue(':' . $column, $this->$column, PDO::PARAM_STR);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_COLUMN);
    }
}
