<?php
class ProductController{

    public function actionView($id){
        $categories = Category::getCategoriesList();
        $product = Product::getProductById($id);
        $categ = Category::getCategoryNameById($product['category_id']);
        $is_session_set = User::isSessionSet();
        require_once(ROOT . "/views/product/view.php");
        return true;
    }
}