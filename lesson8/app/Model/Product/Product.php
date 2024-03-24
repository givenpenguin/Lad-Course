<?php

namespace Model\Product;

use db\JsonDataBase;
use Exception;

abstract class Product
{
    private int $id;
    private string $article;
    private string $name;
    private string $brand;
    private string $material;
    private int $sample;
    private int $price;
    private int $quantity;
    private string $category;
    private array $image;

    private JsonDataBase $db;

    public function __construct()
    {
        try {
            $this->db = new JsonDataBase('products');
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function getProductFromDataBase(string $article): self | false
    {
        $product = $this->db->where('article', $article);

        if(!empty($product))
        {
            $this->id = $product['id'];
            $this->article = $product['article'];
            $this->name = $product['name'];
            $this->brand = $product['brand'];
            $this->material = $product['material'];
            $this->sample = $product['sample'];
            $this->price = $product['price'];
            $this->quantity = $product['quantity'];
            $this->category = $product['category'];
            $this->image = $product['image'];

            return $this;
        }
        return false;
    }

    public function getAllProducts(): array | false
    {
        $products = $this->db->selectAll();

        if(!isset($products)) {
            return false;
        }
        return $products;
    }

    public function setProductToDataBase(string $article, string $name, string $brand, string $material, string $sample,
                                         int $price, int $quantity, string $category, array $image): self
    {
        $imagePath = 'resources/images/';

        $this->id = $this->db->getLastId() + 1;
        $this->article = $article;
        $this->name = $name;
        $this->brand = $brand;
        $this->material = $material;
        $this->sample = $sample;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->category = $category;

        $this->image['fileName'] = $imagePath . $image['fileName'];
        $this->image['tmpPath'] = $image['tmpPath'];

        print_r($this->image);

        return $this;
    }

    /**
     * @param string $key
     * @param string $value
     * @return Product|false
     * @uses \Controllers\ProductController::deleteProduct()
     */
    public function deleteProductFromDataBase(string $key, string $value): self | false
    {
        $product = $this->db->where($key, $value);

        if(!isset($product))
        {
            return false;
        }

        if(!$this->db->delete($product))
        {
            return false;
        }
        return $this;
    }

    public function getDataArray(): array
    {
        return [
            'id' => $this->id,
            'article' => $this->article,
            'name' => $this->name,
            'brand' => $this->brand,
            'material' => $this->material,
            'sample' => $this->sample,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'category' => $this->category,
            'image' => $this->image,
        ];
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getArticle(): int
    {
        return $this->article;
    }
    public function setArticle(int $article): void
    {
        $this->article = $article;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    public function getMaterial(): string
    {
        return $this->material;
    }
    public function setMaterial(string $material): void
    {
        $this->material = $material;
    }

    public function getSample(): int
    {
        return $this->sample;
    }
    public function setSample(int $sample): void
    {
        $this->sample = $sample;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getCategory(): string
    {
        return $this->category;
    }
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function getDB(): JsonDataBase
    {
        return $this->db;
    }
    public function setDB(JsonDataBase $db): void
    {
        $this->db = $db;
    }

    public function getImage(): array
    {
        return $this->image;
    }
    public function setImage(array $image): void
    {
        $this->image = $image;
    }
}