<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <?=$breadcrumbs;?>
            </ol>
        </div>
    </div>
</div>

<div style="font-family: 'ProximaNova-Semibold'" class="single contact">
    <div class="container">
        <div class="single-main">
            <div class="col-md-11 single-main-left">
                <div class="sngl-top">
                    <div class="col-md-4 single-top-left">
                        <?php if($gallery): ?>
                        <div class="flexslider">
                            <ul class="slides">
                                <?php foreach($gallery as $item): ?>
                                <li data-thumb="images/<?=$item->img;?>">
                                    <div class="thumb-image"> <img src="images/<?=$item->img;?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php else: ?>
                            <img src="images/<?=$product->img;?>" alt="">
                        <?php endif; ?>

                    </div>
                    <?php
                    $curr = \ishop\App::$app->getProperty('currency');
                    $cats = \ishop\App::$app->getProperty('cats');
                    ?>
                    <div class="col-md-8 single-top-right">
                        <div class="single-para simpleCart_shelfItem">
                            <h2 style="font-family: 'ProximaNova-Black'"><?=$product->title;?></h2>

                            <h5 class="item_price" id="base-price" data-base="<?=$product->price * $curr['value'];?>"><?=$curr['symbol_left'];?><?=round($product->price * $curr['value'],2);?><?=$curr['symbol_right'];?></h5>
                            <?php if($product->old_price): ?>
                                <del><?=$curr['symbol_left'];?><?=round($product->old_price * $curr['value'],2);?><?=$curr['symbol_right'];?></del>
                            <?php endif; ?>

                            <br>
                            <div style="font-size: large"><?=$product->description;?></div>


                            <div class="available">
                                <ul>
                                    <li>Розмір
                                        <select>
                                            <option>Оберіть розмір:</option>
                                            <?php foreach($mods as $mod): ?>
                                            <option data-title="<?=$mod->title;?>" data-price="<?=($mod->price+$product->price) * $curr['value'];?>" value="<?=$mod->id;?>"><?=$mod->title;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </li>
                                    <div class="clearfix"> </div>
                                </ul>
                            </div>
                            <ul class="tag-men">
                                <li><span>Категорія:</span>
                                    <span>: <a href="category/<?=$cats[$product->category_id]['alias'];?>"><?=$cats[$product->category_id]['title'];?></a></span></li>
                            </ul>
                            <div class="quantity">
                                <input type="number" size="4" value="1" name="quantity" min="1" step="1">
                            </div>
                            <a id="productAdd" data-id="<?=$product->id;?>" href="cart/add?id=<?=$product->id;?>" class="add-cart item_add add-to-cart-link">Додати в кошик</a>
                            <div style="font-size: 15px;margin-top: 23px"><?=$product->content;?></div>
                        </div>

                    </div>
                    <div class="clearfix"> </div>
                </div>


                <?php if($related): ?>
                <div class="latestproducts">
                    <div class="product-one">
                        <h3>С цим товаром також купують:</h3>
                        <?php foreach($related as $item): ?>
                        <div class="col-md-4 product-left p-left">
                            <div style="max-height: 500px" class="product-main simpleCart_shelfItem">
                                <a href="product/<?=$item['alias'];?>" class="mask"><img class="img-responsive zoom-img" src="images/<?=$item['img'];?>" alt="" /></a>
                                <div class="product-bottom">
                                    <h3><a href="product/<?=$item['alias'];?>"><?=$item['title'];?></a></h3>

                                    <h4 style="display: flex;margin-left: 10px;margin-top: 15px">
                                        <a data-id="<?=$item['id'];?>" class="add-to-cart-link" href="cart/add?id=<?=$item['id'];?>"><i></i></a> <div class="item_price"><?=$curr['symbol_left'];?><?=$item['price'] * $curr['value'];?><?=$curr['symbol_right'];?></div>
                                        <?php if($item['old_price']): ?>
                                            <small style="margin-left: 10px;margin-top: 5px"><del><?=$curr['symbol_left'];?><?=$item['old_price'] * $curr['value'];?><?=$curr['symbol_right'];?></del></small>
                                        <?php endif; ?>
                                        <a style="margin-top: -23px;margin-left: 25px;" data-id="<?=$item['id'];?>" class="add-to-cart-link" href="product/<?=$item['alias'];?>"><img class="imgbuy" src="images/buy.png"></a>
                                    </h4>
                                </div>
                                <?php if($item['old_price']): ?>
                                    <div class="srch">
                                        <span><?= ceil((($item['old_price']-$item['price'])/$item['old_price'])*100) ?> %</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if($recentlyViewed): ?>
                    <div class="latestproducts">
                        <div class="product-one">
                            <h3>Нещодавно переглянуті:</h3>
                            <?php foreach($recentlyViewed as $item): ?>
                                <div class="col-md-4 product-left p-left">
                                    <div style="max-height: 500px" class="product-main simpleCart_shelfItem">
                                        <a href="product/<?=$item['alias'];?>" class="mask"><img class="img-responsive zoom-img" src="images/<?=$item['img'];?>" alt="" /></a>
                                        <div class="product-bottom">
                                            <h3><a href="product/<?=$item['alias'];?>"><?=$item['title'];?></a></h3>

                                            <h4 style="display: flex;margin-left: 10px;margin-top: 15px">
                                                <a data-id="<?=$item['id'];?>" class="add-to-cart-link" href="cart/add?id=<?=$item['id'];?>"><i></i></a> <div class="item_price"><?=$curr['symbol_left'];?><?=$item['price'] * $curr['value'];?><?=$curr['symbol_right'];?></div>
                                                <?php if($item['old_price']): ?>
                                                    <small style="margin-left: 10px;margin-top: 5px"><del><?=$curr['symbol_left'];?><?=$item['old_price'] * $curr['value'];?><?=$curr['symbol_right'];?></del></small>
                                                <?php endif; ?>
                                                <a style="margin-top: -23px;margin-left: 25px;" data-id="<?=$item['id'];?>" class="add-to-cart-link" href="product/<?=$item['alias'];?>"><img class="imgbuy" src="images/buy.png"></a>
                                            </h4>
                                        </div>
                                        <?php if($item['old_price']): ?>
                                            <div class="srch">
                                                <span><?= ceil((($item['old_price']-$item['price'])/$item['old_price'])*100) ?> %</span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>