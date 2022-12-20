<?php


class SiteController
{
  public function actionIndex()
  {
    $categories = Category::getCategoriesList();
    $products = Product::getProductsList();
    $is_recommended = Product::getProductsIs_recomendet();
    $is_session_set = User::isSessionSet();
    require_once(ROOT . "/views/site/index.php");
    return true;
  }

}
