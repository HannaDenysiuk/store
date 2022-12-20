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
                                        <a href="/category/<?= $categoryItem['id'] ?>" class="<?php if ($categoryId == $categoryItem['id']) echo 'active'; ?>">
                                            <?= $categoryItem['name'] ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center"><?= $categ ?></h2>
                    <?php foreach ($categoryProducts as $prodItem) : ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img id="imgUpdate" src="/template/images/products/<?= $prodItem['image'] ?>" height="200" width="200" alt="" />
                                        <h2>$<?= $prodItem['price'] ?></h2>
                                        <p>
                                            <a href="/product/<?= $prodItem['id'] ?>"><?= $prodItem['name'] ?></a>
                                        </p>
                                        <a href="#" data-id="<?= $prodItem['id'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                    </div>
                                    <?php if ($prodItem['is_new']) : ?>
                                        <img src="/template/images/home/new.png" class="new" alt="">
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach ?>
                </div>
                <!--features_items-->
                <?= $pagination->get(); ?>
            </div>
        </div>
    </div>
</section>
<?php
include(ROOT . "/views/layouts/footer.php");
?>