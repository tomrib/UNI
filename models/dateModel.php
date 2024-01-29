<?php
require_once "database.php";

class date
{
    public $db = NULL;
    public int $id = 0;
    public string $date = "";
    

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getTodayDate(){
        $query = 'SELECT `id`, DATE_FORMAT(date, "%d %b %Y") AS date FROM `jg7b_dates` WHERE date = date(NOW());';
        $request = $this->db->query($query);
        return $request->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Cette fonction permet de créer dans la base de données les dates fournies par le planning.
     * Pour chaque jour de la semaine, elle va demander à la base de donnée de créer la date, si elle n'existe pas déjà.
     * 
     * Étant donné que la colone 'date' n'est pas primaire ni unique, on est obligé de triché pour dire à la base de donnée de ne pas faire de duplication.
     * (INSERT IGNORE ne fonctionne donc pas, par exemple.)
     * 
     * @param array $weekDays Tableau des jours de la semaine fourni par le planning dans le controlleur. 
     * @return void
     */
    public function createPlanningDates(array $weekDays): void {
        $request = 'INSERT INTO `jg7b_dates` (`date`)
                    SELECT DATE(:daydate) FROM (SELECT 1) t
                    WHERE NOT EXISTS (SELECT `date` FROM `jg7b_dates` WHERE `date`=DATE(:daydate));';

        foreach ($weekDays as $day) {
            $statement = $this->db->prepare($request);
            $statement->bindValue(':daydate', $day['date']);
            $statement->execute();
        }
    }
}