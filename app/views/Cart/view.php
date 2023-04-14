<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?= PATH ?>">Головна</a></li>
                <li>Корзинка</li>
            </ol>
        </div>
    </div>
</div>

<div class="prdt prdtZakaz">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-12">
                <div class="product-one cart">
                    <div class="register-top heading">
                        <h2>Оформлення замовлення</h2>
                    </div>
                    <br><br>
                    <?php if(!empty($_SESSION['cart'])):?>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>Світлина</th>
                                    <th>Найменування</th>
                                    <th>Кіл-ть</th>
                                    <th>Ціна</th>
                                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($_SESSION['cart'] as $id => $item): ?>
                                    <tr>
                                        <td><a href="product/<?=$item['alias'] ?>"><img src="images/<?= $item['img'] ?>" alt="<?=$item['title'] ?>"></a></td>
                                        <td><a href="product/<?=$item['alias'] ?>"><?=$item['title'] ?></a></td>
                                        <td><?=$item['qty'] ?></td>
                                        <td><?=$item['price'] ?></td>
                                        <td><a href="/cart/delete/?id=<?=$id ?>"><span data-id="<?=$id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></a></td>
                                    </tr>
                                <?php endforeach;?>
                                <tr>
                                    <td>Разом:</td>
                                    <td colspan="4" class="text-right cart-qty"><?=$_SESSION['cart.qty'] ?></td>
                                </tr>
                                <tr>
                                    <td>На суму:</td>
                                    <td colspan="4" class="text-right cart-sum"><?= $_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . " {$_SESSION['cart.currency']['symbol_right']}" ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 account-left">
                            <form method="post" action="cart/checkout" role="form" data-toggle="validator">
                                <?php if(!isset($_SESSION['user'])): ?>
                                    <div class="form-group has-feedback">
                                        <label for="login">Login</label>
                                        <input type="text" name="login" class="form-control" id="login" placeholder="Login" value="<?= isset($_SESSION['form_data']['login']) ? $_SESSION['form_data']['login'] : '' ?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="pasword">Password</label>
                                        <input type="password" name="password" class="form-control" id="pasword" placeholder="Password" value="<?= isset($_SESSION['form_data']['password']) ? $_SESSION['form_data']['password'] : '' ?>" data-minlength="6" data-error="Пароль должен включать не менее 6 символов" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="name">Ім'я</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Ім'я" value="<?= isset($_SESSION['form_data']['name']) ? $_SESSION['form_data']['name'] : '' ?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?= isset($_SESSION['form_data']['email']) ? $_SESSION['form_data']['email'] : '' ?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="address">Адреса</label>
                                        <input type="text" name="address" class="form-control" id="address" placeholder="Адоеса" value="<?= isset($_SESSION['form_data']['address']) ? $_SESSION['form_data']['address'] : '' ?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <label for="address">Нотатки</label>
                                    <textarea name="note" class="form-control"></textarea>
                                </div>
                                <script src="https://pay.fondy.eu/static_common/v1/checkout/ipsp.js"></script>
                                <script>
                                    function checkoutInit(url) {
                                        $ipsp('checkout').scope(function() {
                                            this.setCheckoutWrapper('#checkout_wrapper');
                                            this.addCallback(__DEFAULTCALLBACK__);
                                            this.action('show', function(data) {
                                                $('#checkout_loader').remove();
                                                $('#checkout').show();
                                            });
                                            this.action('hide', function(data) {
                                                $('#checkout').hide();
                                            });
                                            this.action('resize', function(data) {
                                                $('#checkout_wrapper').width(480).height(data.height);
                                            });
                                            this.loadUrl(url);
                                        });
                                    };
                                    var button = $ipsp.get("button");
                                    button.setMerchantId(1521128);
                                    button.setAmount(<?= $item['price']; ?>, 'UAH', true);
                                    button.setHost('pay.fondy.eu');
                                    checkoutInit(button.getUrl());
                                </script>
                                <div id="checkout">
                                    <div id="checkout_wrapper"></div>
                                </div>
                            </form>
                            <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
                        </div>
                    <?php else: ?>
                        <h3>Корзинка порожня</h3>
                    <?php endif;?>
                </div>

            </div>
        </div>
    </div>
</div>
<!--product-end-->