<?php
class Cart
{
    public static function AddProduct($id, $count = 1)
    {

        $productInCart = array();

        if (isset($_SESSION['products'])) {
            $productInCart = $_SESSION['products'];
        }
        if (array_key_exists($id, $productInCart))
            $productInCart[$id]+=$count;
        else
            $productInCart[$id] = $count;


        $_SESSION['products'] = $productInCart;

        return self::countItems();
    }
    public static function countItems()
    {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count += $quantity;
            }
            return $count;
        } else
            return 0;
    }
    public static function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }
    public static function getTotalPrice($products)
    {
        $productInCart = self::getProducts();
        $total = 0;
        if ($productInCart) {
            foreach ($products as  $value) {
                $total += $value['price'] * $productInCart[$value['id']];
            }
        }
        return $total;
    }
    public static function clear()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }
    public static function deleteProduct($id)
    {
        $productInCart = self::getProducts();
        unset($productInCart[$id]);
        $_SESSION['products'] = $productInCart;
    }
}
