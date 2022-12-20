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
                        <?php foreach ($categories as $categItem) : ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="/category/<?= $categItem['id'] ?>"><?= $categItem['name'] ?></a></h4>
                                </div>
                            </div>
                        <?php
                        endforeach ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">Последние товары</h2>
                    <?php foreach ($products as $prodItem) : ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img id="imgUpdate" src="/template/images/products/<?=$prodItem['image']?>" height="200" width="200" alt="" />
                                        <h2>$<?= $prodItem['price'] ?></h2>
                                        <p>
                                            <a href="/product/<?= $prodItem['id'] ?>"><?= $prodItem['name'] ?></a>
                                        </p>
                                        <a  href="#" data-id="<?= $prodItem['id'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
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

                <div class="recommended_items">
                    <!--recommended_items-->
                    <h2 class="title text-center">Рекомендуемые товары</h2>
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            $addactive = "";
                            $count = 0;
                            foreach ($is_recommended as $item) :
                                if ($count == 0) {
                                    $addActive = "active"; ?>
                                    <div class="item <?= $addActive ?>">
                                    <?php
                                } else if ($count % 3 == 0) {
                                    $addActive = ""; ?>
                                    </div>
                                    <div class="item <?= $addActive ?>">
                                    <?php
                                } ?>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img id="imgUpdate" src="/template/images/products/<?=$item['image']?>" height="200" width="200" alt="" />
                                                    <h2> $<?= $item['price'] ?></h2>
                                                    <p><?= $item['name'] ?></p>
                                                    <a  href="#" 
                                                    data-id="<?= $item['id'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php $count++;
                            endforeach ?>
                                    </div>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
                <!--/recommended_items-->
            </div>
        </div>
    </div>
</section>
<?php
include(ROOT . "/views/layouts/footer.php");
?>