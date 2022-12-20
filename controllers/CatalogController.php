<?php



class CatalogController
{

    public function actionIndex()
    {
        $categories = Category::getCategoriesList();
        $products = Product::getProductsList(Configuration::getCountOfProd);
        $is_session_set = User::isSessionSet();
        require_once(ROOT . "/views/catalog/index.php");
        return true;
    }
    public function actionCategory($categoryId, $page = 1) //беремо з шляху
    {
        $categories = Category::getCategoriesList();
        $categoryProducts = Product::getProductsListByCategory($categoryId, $page);
 
        $total = Product::getProductInCategory($categoryId);

        $pagination = new Pagination($total, $page, Configuration::SHOW_BY_DEFAULT, 'page-');
   
        $categ = Category::getCategoryNameById($categoryId);
        $is_session_set = User::isSessionSet();
        require_once(ROOT . "/views/catalog/category.php");
        return true;
    }
}
