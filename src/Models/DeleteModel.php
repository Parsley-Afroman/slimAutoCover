<?php
namespace SlimAutoCover\Models;

class DeleteModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function DeleteClient($id)
    {
        $query = $this->db->prepare("UPDATE `quotes` SET `accepted` = 0	 WHERE `id` = " . $id . ";");
        $query->execute();
    }
}
?>