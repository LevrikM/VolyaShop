
<?php /*if($brands): */?><!--
<div class="about">
    <div class="container">
        <div class="about-top grid-1">
            <?php /*foreach($brands as $brand): */?>
                <div class="col-md-4 about-left">
                <figure class="effect-bubba">
                    <img class="img-responsive" src="images/<?/*=$brand->img;*/?>" alt=""/>
                    <figcaption>
                        <h2><?/*=$brand->title;*/?></h2>
                        <p><?/*=$brand->description;*/?></p>
                    </figcaption>
                </figure>
            </div>
            <?php /*endforeach; */?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
--><?php /*endif; */?>

<?php if($hits): ?>
<?php $curr = \ishop\App::$app->getProperty('currency'); ?>
<div class="product">
    <div  class="container">
        <div class="product-top">
            <div class="product-one">
            <?php foreach($hits as $hit): ?>
                <div class="col-md-3 product-left">
                    <div style="max-height: 500px" class="product-main simpleCart_shelfItem">
                        <a href="product/<?=$hit->alias;?>" class="mask"><img class="img-responsive zoom-img" src="images/<?=$hit->img;?>" alt="" /></a>
                        <div class="product-bottom">
                            <h3><a href="product/<?=$hit->alias;?>"><?=$hit->title;?></a></h3>

                            <h4 style="display: flex;margin-left: 10px;margin-top: 15px">
                                <a data-id="<?=$hit->id;?>" class="add-to-cart-link" href="cart/add?id=<?=$hit->id;?>"><i></i></a> <div class="item_price"><?=$curr['symbol_left'];?><?=round($hit->price * $curr['value'],2);?><?=$curr['symbol_right'];?></div>
                            <?php if($hit->old_price): ?>
                                <small style="margin-left: 10px;margin-top: 5px"><del><?=$curr['symbol_left'];?><?=round($hit->old_price * $curr['value'],2);?><?=$curr['symbol_right'];?></del></small>
                            <?php endif; ?>
                            </h4>
                        </div>
                        <?php if($hit->old_price): ?>
                            <div class="srch">
                                <span><?= ceil((($hit->old_price-$hit->price)/$hit->old_price)*100) ?> %</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

