<?php

namespace QuoteModel;

class NewQuoteModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getCarMulitplier($id)
    {
        $query = $this->db->prepare("SELECT `type_multiplier` FROM `car_type` WHERE `id` = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetchAll();
    }

    public function getCoverMulitplier($id)
    {
        $query = $this->db->prepare("SELECT `cover_multiplier` FROM `cover_type` WHERE `id` = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetchAll();
    }
}
