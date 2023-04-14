<section class="content-header">
    <h1>
        Редагування валюти <?= $currency->title ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= ADMIN ?>/"><i class="fa fa-dashboard"></i> Головна</a></li>
        <li><a href="<?= ADMIN ?>/currency">Список валют</a></li>
        <li class="active">Редагування</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form method="post" action="<?= ADMIN ?>/currency/edit" role="form" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="title">Найменування валюти</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Найменування валюти" required value="<?= h($currency->title) ?>">
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="code">Код валюти</label>
                            <input type="text" name="code" class="form-control" id="code" placeholder="Код валюти" required value="<?= h($currency->code) ?>">
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <label for="symbol_left">Символ зліва</label>
                            <input type="text" name="symbol_left" class="form-control" id="symbol_left" placeholder="Символ зліва" value="<?= h($currency->symbol_left) ?>">
                        </div>
                        <div class="form-group">
                            <label for="symbol_right">Символ справа</label>
                            <input type="text" name="symbol_right" class="form-control" id="symbol_right" placeholder="Символ справа" value="<?= h($currency->symbol_right) ?>">
                        </div>
                        <div class="form-group has-feedback">
                            <label for="value">Значення</label>
                            <input type="text" name="value" class="form-control" id="value" placeholder="Значення" pattern="^[0-9.]{1,}$" required data-error="Допускаются цифри та десяткова крапка." value="<?= $currency->value ?>">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label>
                                <input name="base" type="checkbox"<?php if($currency->base) echo ' checked' ?>> Базова валюта
                            </label>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="id" value="<?= $currency->id ?>">
                        <button type="submit" class="btn btn-success">Зберегти</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
