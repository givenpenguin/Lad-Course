<?php

namespace Model\Filter;

class Filter extends AbstractFilter
{
    const CATEGORIES = 'categories';
    const BRANDS = 'brands';

    public function getCategories(): array | false
    {
        $categories = $this->getAllFilters(self::CATEGORIES);

        if(empty($categories))
        {
            return false;
        }
        return $categories;
    }

    public function getBrands(): array | false
    {
        $brands = $this->getAllFilters(self::BRANDS);

        if(empty($brands))
        {
            return false;
        }
        return $brands;
    }
}