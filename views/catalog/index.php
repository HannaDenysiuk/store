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
                                        <a  href="#"
                                        data-id="<?= $prodItem['id'] ?>"
                                         class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
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
                
            </div>
        </div>
    </div>
</section>
<?php
include(ROOT . "/views/layouts/footer.php");
?>