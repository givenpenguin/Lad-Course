<?php

namespace Model\Product;

class Earrings extends Product
{
    private string $lock;
    private string $model;

    public function __construct()
    {
        parent::__construct();
    }

    #[\Override]
    public function getProductFromDataBase(string $article): Product | false
    {
        if(empty(parent::getProductFromDataBase($article))){
            return false;
        }

        $product = $this->getDB()->where('article', $this->getArticle());

        if(!empty($product))
        {
            $this->lock = $product['lock'];
            $this->model = $product['model'];

            return $this;
        }
        return false;
    }

    #[\Override]
    public function getAllProducts(): array | false
    {
        $products = parent::getAllProducts();
        $earrings = [];

        foreach ($products as $product) {
            if($product['category'] === 'Серьги') {
                $earrings[] = $product;
            }
        }

        if(!isset($earrings)) {
            return false;
        }
        return $earrings;
    }

    public function setEarringToDataBase(string $article, string $name, string $brand, string $material, string $sample,
                                       int $price, int $quantity, string $category, array $image, string $lock,
                                       string $model): self | false
    {
        if(empty(parent::setProductToDataBase($article, $name, $brand, $material, $sample, $price,
            $quantity, $category, $image)))
        {
            return false;
        }

        $this->lock = $lock;
        $this->model = $model;

        if(!$this->getDB()->insert($this->getDataArray()))
        {
            return false;
        }
        return $this;
    }

    public function getDataArray(): array
    {
        $array = parent::getDataArray();
        return array_merge($array, ['lock' => $this->lock, 'model' => $this->model]);
    }
}