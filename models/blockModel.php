<?php
require_once "database.php";
class block
{
    public $db = NULL;
    public int $id = 0;
    public string $text = "";

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function addBlock()
    {
        $query = 'INSERT INTO `jg7b_block`(`text`) VALUES (:text);';
        $request = $this->db->prepare($query);
        $request->bindValue(':text', $this->text, PDO::PARAM_STR);
        return $request->execute();
    }

    public function listBlock()
    {
        $query = 'SELECT `id`, `text` FROM `jg7b_block` ;';
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function deleteBlock()
    {
        $query = 'DELETE FROM `jg7b_block` WHERE jg7b_block.id = :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $request->execute();
    }
    public function countBlock()
    {
        $query = 'SELECT COUNT(id) AS id
        FROM jg7b_block
        GROUP BY id;';
        $request = $this->db->query($query);
        return $request->fetch(PDO::FETCH_ASSOC);
    }
}
