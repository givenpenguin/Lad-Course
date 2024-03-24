<?php

namespace Controllers;

use Helpers\ProductSessionHandler;
use Model\Product\Chain;
use Model\Product\Earrings;
use Model\Product\Ring;
use Exception;

class ProductController
{
    private Ring $rings;
    private Earrings $earrings;
    private Chain $chains;

    private ProductSessionHandler $prodSessHand;

    public function __construct()
    {
        $this->rings = new Ring();
        $this->earrings = new Earrings();
        $this->chains = new Chain();
        $this->prodSessHand = new ProductSessionHandler();
    }

    /**
     * @throws Exception
     */
    public function getAllProducts(): void
    {
        $products = array_merge($this->rings->getAllProducts(),
            $this->earrings->getAllProducts(),
            $this->chains->getAllProducts());

        if(!isset($products))
        {
            throw new Exception('Продукты не найдены');
        }

        session_start();
        $_SESSION['products'] = $products;
        session_write_close();
    }

    /**
     * @throws Exception
     */
    public function addProduct(array $post, array $files): void
    {
        $article = trim(htmlspecialchars($post['article'] ?? false));
        $name = trim(htmlspecialchars($post['name'] ?? false));
        $brand = trim(htmlspecialchars($post['brand'] ?? false));
        $material = trim(htmlspecialchars($post['material'] ?? false));
        $sample = trim(htmlspecialchars($post['sample'] ?? false));
        $price = trim(htmlspecialchars($post['price'] ?? false));
        $quantity = trim(htmlspecialchars($post['quantity'] ?? false));

        $image = ['fileName' => trim(htmlspecialchars($files['image']['name'] ?? false)),
            'tmpPath' => $files['image']['tmp_name']];

        $size = trim(htmlspecialchars($post['size'] ?? false));
        $insert = trim(htmlspecialchars($post['insert'] ?? false));
        $lock = trim(htmlspecialchars($post['lock'] ?? false));
        $model = trim(htmlspecialchars($post['model'] ?? false));
        $length = trim(htmlspecialchars($post['length'] ?? false));

        $category = null;

        if($size && $insert) {
            $category = 'Кольца';
            $product = $this->rings->getProductFromDataBase($article);
        } else if($lock && $model) {
            $category = 'Серьги';
            $product = $this->earrings->getProductFromDataBase($article);
        } else if($length) {
            $category = 'Цепи';
            $product = $this->chains->getProductFromDataBase($article);
        }

        if(empty($category))
        {
            throw new Exception('Ошибка категории');
        }

        if(!empty($product))
        {
            throw new Exception('Продукт с таким артикулом уже существует');
        }

        $product = match ($category) {
            'Кольца' => $this->rings->setRingToDataBase($article, $name, $brand, $material, $sample, $price,
                $quantity, $category, $image, $size, $insert),
            'Серьги' => $this->earrings->setEarringToDataBase($article, $name, $brand, $material, $sample, $price,
                $quantity, $category, $image, $lock, $model),
            'Цепи' => $this->chains->setChainToDataBase($article, $name, $brand, $material, $sample, $price,
                $quantity, $category, $image, $length),
            default => throw new Exception('Категория не найдена'),
        };

        if(empty($product))
        {
            throw new Exception('Не удалось записать продукт в базу');
        }

        $this->prodSessHand->restartSession();

        header("Location: /pages/admin.php");
        exit();
    }

    /**
     * @throws Exception
     */
    public function deleteProduct(array $post): void
    {
        $categoryItems = [
            "Кольца" => $this->rings,
            "Серьги" => $this->earrings,
            "Цепи" => $this->chains,
        ];

        $deletionField = 'article';
        $deletionValue = $post[$deletionField] ?? false;
        $category = $this->prodSessHand->getCategory($deletionField, $deletionValue);

        if (!isset($category)) {
            throw new Exception('Не удалось определить категорию');
        }

        foreach ($categoryItems as $key => $item) {
            if ($category === $key) {
                if (!$item->deleteProductFromDataBase($deletionField, $deletionValue)) {
                    throw new Exception('Не удалось удалить продукт из базы');
                }
            }
        }

        if(!$this->prodSessHand->deleteProductFromSession($deletionField, $deletionValue))
        {
            throw new Exception('Не удалось удалить продукт из сессии');
        }

        header("Location: /pages/admin.php");
        exit();
    }
}