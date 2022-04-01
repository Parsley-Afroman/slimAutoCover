<?php

namespace SlimAutoCover\Models;

class CarTypeModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getCarType()
    {
        $query = $this->db->prepare("SELECT `id`, `type` FROM `car_type`");
        $query->execute();
        return $query->fetchAll();
    }

    public function getCarMultiplier($id)
    {
        $query = $this->db->prepare("SELECT `type_multiplier` FROM `car_type` WHERE `id` = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetchAll();

    }
}


