<?php

namespace Model\Product;

class Ring extends Product
{
    private int $size;
    private string $insert;

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

        if(empty($product))
        {
            return false;
        }

        $this->size = $product['size'];
        $this->insert = $product['insert'];

        return $this;
    }

    #[\Override]
    public function getAllProducts(): array | false
    {
        $products = parent::getAllProducts();

        if(!isset($products)) {
            return false;
        }

        $rings = [];

        foreach ($products as $product) {
            if($product['category'] === 'Кольца') {
                $rings[] = $product;
            }
        }

        if(!isset($rings)) {
            return false;
        }
        return $rings;
    }

    public function setRingToDataBase(string $article, string $name, string $brand, string $material, string $sample,
                                      int $price, int $quantity, string $category, array $image, int $size,
                                      string $insert): self | false
    {
        if(empty(parent::setProductToDataBase($article, $name, $brand, $material, $sample, $price,
            $quantity, $category, $image)))
        {
            return false;
        }

        $this->size = $size;
        $this->insert = $insert;

        if(!$this->getDB()->insert($this->getDataArray()))
        {
            return false;
        }
        return $this;
    }

    public function getDataArray(): array
    {
        $array = parent::getDataArray();
        return array_merge($array, ['size' => $this->size, 'insert' => $this->insert]);
    }
}