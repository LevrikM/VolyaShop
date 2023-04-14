<?php if(!empty($products)): ?>
    <?php $curr = \ishop\App::$app->getProperty('currency'); ?>
    <?php foreach($products as $product): ?>
        <div class="col-md-4 product-left p-left">
            <div style="max-height: 500px" class="product-main simpleCart_shelfItem">
                <a href="product/<?=$product->alias;?>" class="mask"><img class="img-responsive zoom-img" src="images/<?=$product->img;?>" alt="" /></a>
                <div class="product-bottom">
                    <h3><a href="product/<?=$product->alias;?>"><?=$product->title;?></a></h3>

                    <h4 style="display: flex;margin-left: 10px;margin-top: 15px">
                        <a data-id="<?=$product->id;?>" class="add-to-cart-link" href="cart/add?id=<?=$product->id;?>"><i></i></a> <div class="item_price"><?=$curr['symbol_left'];?><?=round($product->price * $curr['value'],2);?><?=$curr['symbol_right'];?></div>
                        <?php if($product->old_price): ?>
                            <small style="margin-left: 10px;margin-top: 5px"><del><?=$curr['symbol_left'];?><?=round($product->old_price * $curr['value'],2);?><?=$curr['symbol_right'];?></del></small>
                        <?php endif; ?>
                </div>
                <?php if($product->old_price): ?>
                    <div class="srch">
                        <span><?= ceil((($product->old_price - $product->price)/$product->old_price)*100) ?> %</span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="clearfix"></div>
    <div class="text-center">
        <p>(<?=count($products)?> товару(ів) з <?=$total;?>)</p>
        <?php if($pagination->countPages > 1): ?>
            <?=$pagination;?>
        <?php endif; ?>
    </div>
<?php else: ?>
    <h3>Товару не найдено...</h3>
<?php endif; ?>
