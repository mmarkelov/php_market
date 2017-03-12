<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id']; ?>">
                                            <?php echo $categoryItem['name']; ?>
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
                    <h2 class="title text-center">Корзина</h2>

                    <?php if ($productsInCart): ?>
                        <p>Вы выбрали такие товары:</p>
                        <table class="table-bordered table-striped table">
                            <tr>
                                <th>Код товара</th>
                                <th>Название</th>
                                <th>Стоимость, $</th>
                                <th>Количество, шт</th>
                                <th>Сумма, $</th>
                                <th>Удалить</th>
                            </tr>
                            <?php foreach ($products as $product): ?>
                                <tr class="goods">
                                    <td><?php echo $product['code']; ?></td>
                                    <td>
                                        <a href="/product/<?php echo $product['id']; ?>">
                                            <?php echo $product['name']; ?>
                                        </a>
                                    </td>
                                    <td price="<?php echo $product['id']; ?>"><?php echo $product['price']; ?></td>
                                    <td>
                                        <div class="col-sm-3 col-sm-offset-2">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default decr" type="button">-</button>
                                                </span>
                                                <input type="text" value="<?php echo $productsInCart[$product['id']]; ?>" data-id="<?php echo $product['id']; ?>" class="input text-center cart-quantity" style="width: 40px; height: 34px"/> 
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default incr" type="button">+</button>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td id="currentSum-<?php echo $product['id']; ?>" class="currentSum" >
                                        <?php echo $product['price'] * $productsInCart[$product['id']]; ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-default checkout" href="/cart/delete/<?php echo $product['id']; ?>">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>                        
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="4" >Общая стоимость, $:</td>
                                <td id="sum"><?php echo $totalPrice; ?></td>
                            </tr>

                        </table>

                        <a class="btn btn-default checkout" href="/cart/checkout"><i class="fa fa-shopping-cart"></i> Оформить заказ</a>
                    <?php else: ?>
                        <p>Корзина пуста</p>

                        <a class="btn btn-default checkout" href="/"><i class="fa fa-shopping-cart"></i> Вернуться к покупкам</a>
                    <?php endif; ?>

                </div>



            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>