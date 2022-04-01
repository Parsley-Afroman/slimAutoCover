<?php

namespace SlimAutoCover\Models;

class CoverTypeModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getCoverType()
    {
        $query = $this->db->prepare("SELECT `id`, `name` AS `cover` FROM `cover_type`");
        $query->execute();
        return $query->fetchAll();
    }

    public function getCoverMultiplier()
    {
        $query = $this->db->prepare("SELECT `id`, `cover_multiplier` FROM `cover_type`");
        $query->execute();
        return $query->fetchAll();
    }
}


