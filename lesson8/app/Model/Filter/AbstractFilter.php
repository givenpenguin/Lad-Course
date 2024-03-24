<?php

namespace Model\Filter;

use db\JsonDataBase;
use Exception;

abstract class AbstractFilter
{
    public function getAllFilters(string $entities): array | false
    {
        try {
            $db = new JsonDataBase($entities);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }

        $filters = $db->selectAll();

        if(!isset($filters))
        {
            return false;
        }
        return $filters;
    }
}