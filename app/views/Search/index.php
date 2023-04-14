<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?=PATH;?>">Головна</a></li>
                <li>Пошук за запитом "<?=h($query);?>"</li>
            </ol>
        </div>
    </div>
</div>

<div class="prdt prdt2">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-12 prdt-left">
                <?php if(!empty($products)): ?>
                <div class="product-one">
                    <?php $curr = \ishop\App::$app->getProperty('currency'); ?>
                    <?php foreach($products as $product): ?>
                        <div class="col-md-3 product-left p-left">
                            <div style="max-height: 500px" class="product-main simpleCart_shelfItem">
                                <a href="product/<?=$product->alias;?>" class="mask"><img class="img-responsive zoom-img" src="images/<?=$product->img;?>" alt="" /></a>
                                <div class="product-bottom">
                                    <h3><a href="product/<?=$product->alias;?>"><?=$product->title;?></a></h3>

                                    <h4 style="display: flex;margin-left: 10px;margin-top: 15px">
                                        <a data-id="<?=$product->id;?>" class="add-to-cart-link" href="cart/add?id=<?=$product->id;?>"><i></i></a> <div class="item_price"><?=$curr['symbol_left'];?><?=round($product->price * $curr['value'],2);?><?=$curr['symbol_right'];?></div>
                                        <?php if($product->old_price): ?>
                                            <small style="margin-left: 10px;margin-top: 5px"><del><?=$curr['symbol_left'];?><?=round($product->old_price * $curr['value'],2);?><?=$curr['symbol_right'];?></del></small>
                                        <?php endif; ?>
                                    </h4>
                                </div>
                                <?php if($product->old_price): ?>
                                    <div class="srch">
                                        <span><?= ceil((($product->old_price-$product->price)/$product->old_price)*100) ?> %</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="clearfix"></div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
