<?php
require_once "database.php";
class note
{
    public $db = NULL;
    public int $id = 0;
    public string $text = "";
    public string $date = "";
    public int $id_users  = 0;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function addNote()
    {
        $query = 'INSERT INTO `jg7b_notes`(`text`, `date`, `id_users`)
        VALUES(
        :text,
        NOW(),
        :id_users
        )';
        $request = $this->db->prepare($query);
        $request->bindValue(':text', $this->text, PDO::PARAM_STR);
        $request->bindValue(':id_users', $this->id_users, PDO::PARAM_STR);
        return $request->execute();
    }

    public function listsNote()
    {
        $query = "SELECT 
        jg7b_notes.id AS idNote,
        text,
        jg7b_users.firstname AS firstname,
        DATE_FORMAT(date, '%d/%m/%Y') AS date,
        DATE_FORMAT(date, '%H:%i') AS timer
        FROM jg7b_notes
        INNER JOIN jg7b_users ON jg7b_notes.id_users = jg7b_users.id
        ORDER BY
        jg7b_notes.id DESC";
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function deleteNote()
    {
        $query = 'DELETE
        FROM
        `jg7b_notes`
        WHERE
        jg7b_notes.id = :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $request->execute();
    }

    public function checkIfNotesExist($column)
    {
        $query = 'SELECT count(' . $column . ') 
        FROM `jg7b_users` 
        WHERE ' . $column . ' = :' . $column;
        $request = $this->db->prepare($query);
        $request->bindValue(':' . $column, $this->$column, PDO::PARAM_STR);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_COLUMN);
    }
}
    