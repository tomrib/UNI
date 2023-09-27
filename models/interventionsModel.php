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
    }public function addIntervention()
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
        $request->bindValue(':id_customers', $this->id_customers, PDO::PARAM_INT); // Utilisez PARAM_INT pour les entiers
        $request->bindValue(':id_users', $this->id_users, PDO::PARAM_INT); // Utilisez PARAM_INT pour les entiers
        $request->bindValue(':id_typesInterventions', $this->id_typesInterventions, PDO::PARAM_INT); // Utilisez PARAM_INT pour les entiers
    
        // Exécution de la requête préparée
        if ($request->execute()) {
            // Récupération de l'ID 
            $lastInsertId = $this->db->lastInsertId();
            return $lastInsertId;
        } else {
            return false;
        }
    }
}
