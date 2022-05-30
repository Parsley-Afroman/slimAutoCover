<?php 
namespace SlimAutoCover\Models;

class QuotesModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getClientQuotes($name)
    {
        // need to select with a join to get the carType rather than its ID and the same for coverType
        $query = $this->db->prepare("SELECT `id`,`car_type_id`, `cover_id`, `cost` FROM `quotes` WHERE `accepted` = 1 AND `customer_name` = '$name';");
        $query->execute();
        return $query->fetchAll();
    }

    public function putClientQuote($name, $carType, $coverType, $quote)
    {
        $query = $this->db->prepare("INSERT INTO `quotes` (`customer_name`, `car_type_id`, `cover_id`, `cost`, `accepted`) VALUES (:name, :carType, :coverType, :quote, 1);");
        $query->bindParam(':name', $name);
        $query->bindParam(':carType', $carType);
        $query->bindParam(':coverType', $coverType);
        $query->bindParam(':quote', $quote);
        $query->execute();
    }
}
?>