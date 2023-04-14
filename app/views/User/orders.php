<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?=PATH;?>">Головна</a></li>
                <li><a href="<?=PATH;?>/user/cabinet">Особистий кабінет</a></li>
                <li>Історія замовлень</li>
            </ol>
        </div>
    </div>
</div>

<div style="margin-bottom: 611px" class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-12 prdt-left">
                <?php if($orders): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped table-condensed">
                            <thead>
                            <tr>
                                <th style="width: 10%">ID</th>
                                <th style="width: 30%">Статус</th>
                                <th style="width: 20%">Сума</th>
                                <th style="width: 20%">Дата створення</th>
                                <th style="width: 20%">Дата зміни</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($orders as $order): ?>
                                <?php
                                if($order['status'] == '1'){
                                    $class = 'success';
                                    $text = 'Завершено';
                                }else{
                                    $class = '';
                                    $text = 'Новий';
                                }
                                ?>
                                <tr class="<?=$class;?>">
                                    <td><?=$order->id;?></td>
                                    <td><?=$text;?></td>
                                    <td><?=$order->sum;?> <?=$order->currency;?></td>
                                    <td><?=$order->date;?></td>
                                    <td><?=$order->update_at;?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="text-danger">Ви поки що нічого не замовляли...</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>