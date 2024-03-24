<?php

namespace Helpers;

use Controllers\FilterController;
use Controllers\ProductController;
use Exception;

class ProductSessionHandler
{
    public function getCategory(string $key, string $value): string | false
    {
        session_start();
        foreach ($_SESSION['products'] as $item) {
            if(isset($item[$key]) && $item[$key] === $value)
            {
                return $item['category'];
            }
        }
        return false;
    }

    public function deleteProductFromSession(string $deletionField, string $deletionValue): bool
    {
        foreach ($_SESSION['products'] as $key => $item) {
            if(isset($item[$deletionField]) && $item[$deletionField] === $deletionValue)
            {
                unset($_SESSION['products'][$key]);
                return true;
            }
        }
        return false;
    }

    /**
     * @throws Exception
     */
    public function restartSession(): void
    {
        session_start();
        $_SESSION = [];
        session_destroy();
        (new ProductController())->getAllProducts();
        (new FilterController())->getAllFilters();
    }
}