<?php
include(ROOT . "/views/layouts/header.php");
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem) : ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?= $categoryItem['id'] ?>" class="<?php if ($product['category_id'] == $categoryItem['id']) echo 'active'; ?>">
                                            <?= $categoryItem['name'] ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                    <!--/category-products-->
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <h2 class="title text-center"><?= $categ  ?></h2>
                <div class="product-details">
                    <!--product-details-->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="view-product">
                                <img id="imgUpdate" src="/template/images/products/<?=$product['image']?>" height="200" width="200" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="product-information">
                                <!--/product-information-->
                                <?php if ($product["is_new"]) {
                                    //  echo "new";
                                ?>
                                    <img src="/template/images/product-details/new.jpg" class="newarrival" alt="" />
                                <?php } ?>
                                <h2><?= $product['name'] ?></h2>
                                <p>Код товара: <?= $product['code'] ?></p>
                                <span>
                                    <span>US $<?= $product['price'] ?></span>
                                    <label>Количество:</label>
                                    <input type="number" id="count"<?php
                                                            if ($product['availability']) :
                                                            ?> value="1" min="1" max="<?= $product['availability'] ?>" <?php endif ?> />
                                    <a href="#" data-id="<?= $product['id'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a> </span>
                                <p><b>Наличие:</b>
                                    <?php if ($product["availability"])
                                        echo "На складі";
                                    else
                                        echo "Немає в наявності";
                                    ?>
                                </p>
                                <p><b>Производитель:</b> <?= $product['brand'] ?></p>
                            </div>
                            <!--/product-information-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h5>Описание товара</h5>
                            <p><?= $product['description'] ?></p>
                        </div>
                    </div>
                </div>
                <!--/product-details-->

            </div>
        </div>
    </div>
</section>


<br />
<br />

<?php
include(ROOT . "/views/layouts/footer.php");
?>