<?php
require_once "database.php";

class imginterventions
{
    public $db = NULL;
    public int $id = 0;
    public string $img = "";
    public int $id_interventions  = 0;


    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function addImgIntervention()
    {
        $query = 'INSERT INTO `jg7b_imginterventions` (
            `img`,
            `id_interventions`
        ) VALUES (
            :img,
            :id_interventions
        );';
        $request = $this->db->prepare($query);
        $request->bindValue(':img', $this->img, PDO::PARAM_STR);
        $request->bindValue(':id_interventions', $this->id_interventions, PDO::PARAM_STR);
        return $request->execute();
    }

    public function getImgId()
    {
        $query = 'SELECT
        `img`
    FROM
        `jg7b_imginterventions`
    WHERE
        jg7b_imginterventions.id_interventions = :id_interventions;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id_interventions', $this->id_interventions,PDO::PARAM_STR);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
}
