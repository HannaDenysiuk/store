<?php
class AdminProductController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();
        $productsList = Product::getProductsList();
        require_once(ROOT . '/views/admin_product/index.php');
        return true;
    }
    public function actionDelete($id)
    {
        self::checkAdmin();
        if (isset($_POST['submit'])) {
            Product::deleteProductById($id);
            header("Location: /admin/product");
        }

        require_once(ROOT . '/views/admin_product/delete.php');
        return true;
    }
    public function actionCreate()
    {
        self::checkAdmin();
        $categoriesList = Category::getCategoriesListAdmin();
        $img = "";
        if (isset($_POST['submit'])) {
            $option['name'] = $_POST['name'];
            $option['code'] = $_POST['code'];
            $option['price'] = $_POST['price'];
            $option['category_id'] = $_POST['category_id'];
            $option['brand'] = $_POST['brand'];
            $option['availability'] = $_POST['availability'];
            $option['is_new'] = $_POST['is_new'];
            $option['is_recommended'] = $_POST['is_recommended'];
            $option['status'] = $_POST['status'];
            $option['description'] = $_POST['description'];
            if (isset($_FILES['image']['name']))
                $option['image'] = $_FILES['image']['name'];
            else
                $option['image'] = $img;
            $errors = false;
            if (!isset($option['name']) || empty($option['name'])) {
                $errors[] = "заполните поля";
            }
            if ($errors == false) {
                $id = Product::createProduct($option);
                if ($img != "") {
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                        //echo "/template/images/products/{$option['image']}"; die;
                        move_uploaded_file($_FILES["image"]["tmp_name"], ROOT . "/template/images/products/{$option['image']}");
                    }
                }
                header("Location: /admin/product");
            }
        }
        require_once(ROOT . '/views/admin_product/create.php');
        return true;
    }
    public function actionUpdate($id)
    {
        self::checkAdmin();
        $categoriesList = Category::getCategoriesListAdmin();
        $product = Product::getProductById($id);
        $img = $product['image'];
        if (isset($_POST['submit'])) {
            $option['name'] = $_POST['name'];
            $option['code'] = $_POST['code'];
            $option['price'] = $_POST['price'];
            $option['category_id'] = $_POST['category_id'];
            $option['brand'] = $_POST['brand'];
            $option['availability'] = $_POST['availability'];
            $option['is_new'] = $_POST['is_new'];
            $option['is_recommended'] = $_POST['is_recommended'];
            $option['status'] = $_POST['status'];
            $option['description'] = $_POST['description'];
            if (isset($_FILES['image']['name']))
                $option['image'] = $_FILES['image']['name'];
            else
                $option['image'] = $img;

            $errors = false;
            if (!isset($option['name']) || empty($option['name'])) {
                $errors[] = "заполните поля";
            }
            if ($errors == false) {
                if (Product::updateProductById($id, $option)) {
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        move_uploaded_file($_FILES["image"]["tmp_name"], ROOT . "/template/images/products/{$option['image']}");
                    }
                }

                header("Location: /admin/product");
            }
        }
        require_once(ROOT . '/views/admin_product/update.php');
        return true;
    }
}
