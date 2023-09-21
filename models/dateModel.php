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
        $query = 'SELECT `id`, DATE_FORMAT(date, "%d %b %Y") AS date FROM `jg7b_dates` WHERE date = :date;';
        $request = $this->db->prepare($query);
        $request->bindValue(':date', $this->date, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_OBJ);
    }
    
}