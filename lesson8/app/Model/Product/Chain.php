<?php

namespace Model\Product;

class Chain extends Product
{
    private int $length;

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
            $this->length = $product['length'];

            return $this;
        }
        return false;
    }

    #[\Override]
    public function getAllProducts(): array | false
    {
        $products = parent::getAllProducts();
        $chains = [];

        foreach ($products as $product) {
            if($product['category'] === 'Цепи') {
                $chains[] = $product;
            }
        }

        if(!isset($chains)) {
            return false;
        }
        return $chains;
    }

    public function setChainToDataBase(string $article, string $name, string $brand, string $material, string $sample,
                                      int $price, int $quantity, string $category, array $image,
                                      int $length): self | false
    {
        if(empty(parent::setProductToDataBase($article, $name, $brand, $material, $sample, $price,
            $quantity, $category, $image)))
        {
            return false;
        }

        $this->length = $length;

        if(!$this->getDB()->insert($this->getDataArray()))
        {
            return false;
        }
        return $this;
    }

    public function getDataArray(): array
    {
        $array = parent::getDataArray();
        return array_merge($array, ['length' => $this->length]);
    }
}