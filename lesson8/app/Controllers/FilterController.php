<?php

namespace Controllers;

use Exception;
use Model\Filter\Filter;

class FilterController
{
    private Filter $filter;

    public function __construct()
    {
        $this->filter = new Filter();
    }

    /**
     * @throws Exception
     */
    public function getAllFilters(): void
    {
        $categories = $this->filter->getCategories();
        $brands = $this->filter->getBrands();

        if(empty($categories + $brands))
        {
            throw new Exception('Фильтры не найдены');
        }

        session_start();
        $_SESSION['filters']['categories'] = $categories;
        $_SESSION['filters']['brands'] = $brands;
        session_write_close();
    }
}