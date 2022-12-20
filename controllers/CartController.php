<?php
class CartController
{
    public  function actionAdd($id)
    {
        Cart::addProduct($id);
        $ref = $_SERVER['HTTP_REFERER'];
        header("location: $ref");
    }
    public  function actionAddAjax($id,$count)
    {
    
        echo Cart::addProduct($id,$count);

        return true;
    }
    public function actionIndex()
    {
        $categories = Category::getCategoriesList();
        $productsInCart = Cart::getProducts();
        $is_session_set = User::isSessionSet();
        if ($productsInCart) {
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductByIds($productsIds);
            $totalPrice = Cart::getTotalPrice($products);
        }
        require_once(ROOT . '/views/cart/index.php');
        return true;
    }
    public function actionCheckout()
    {
        $is_session_set = User::isSessionSet();
        $categories = Category::getCategoriesList();
        $result = false;

        if (isset($_POST['submit'])) {
            //was form send?
            $uname = $_POST['userName'];
            $uphone = $_POST['userPhone'];
            $ucomment = $_POST['userComment'];

            //is valid
            $errors = false;
            if (!User::checkName($uname)) {
                $errors[] = "не правильно введено имя";
            }
            if (!User::checkPhone($uphone)) {
                $errors[] = "не правильно введен номер телефона";
            }

            if ($errors == false) {
                $productsInCart = Cart::getProducts();
                $userId = User::isNOTGest();

                $result = Order::save($uname, $uphone, $ucomment, $userId, $productsInCart);
                if ($result) {
                    Cart::clear();
                }
            } else {
                //if the form was filled in incorrectly
                $productsInCart = Cart::getProducts();
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();
            }
        } else {
            //if form wasn't send
            $productsInCart = Cart::getProducts();
            if ($productsInCart == false) {
                header("location: /");
            } else {
                //in cart are products
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();

                $uname = false;
                $uphone = false;
                $ucomment = false;

                $userId = User::isNOTGest();
                if ($userId) {
                    $user = User::getUser($userId);
                    $uname = $user['name'];
                }
            }
        }

        require_once(ROOT . '/views/cart/checkout.php');
        return true;
    }
    public function actionDelete($id)
    {
        Cart::deleteProduct($id);
        header("Location: /cart");
    }
}
