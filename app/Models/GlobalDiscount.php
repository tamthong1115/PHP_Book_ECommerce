<?php

namespace Models;

use Core\Model;
use PDO;

class GlobalDiscount extends Model
{

    public function getAllGlobalDiscounts()
    {
        return $this->getAll('global_discounts');
    }

    public function getLimitGlobalDiscountStillValid(int $limit = 10)
    {
        $sql = "SELECT * FROM global_discounts WHERE valid_until >= NOW() LIMIT :limit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
