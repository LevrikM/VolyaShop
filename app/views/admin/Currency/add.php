<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Нова валюта
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Головна</a></li>
        <li><a href="<?=ADMIN;?>/currency">Список валют</a></li>
        <li class="active">Нова валюта</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN;?>/currency/add" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="title">Найменування валюти</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Найменування валюти" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="code">Код валюти</label>
                            <input type="text" name="code" class="form-control" id="code" placeholder="Код валюти" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <label for="symbol_left">Символ зліва</label>
                            <input type="text" name="symbol_left" class="form-control" id="symbol_left" placeholder="Символ зліва">
                        </div>
                        <div class="form-group">
                            <label for="symbol_right">Символ справа</label>
                            <input type="text" name="symbol_right" class="form-control" id="symbol_right" placeholder="Символ справа">
                        </div>
                        <div class="form-group has-feedback">
                            <label for="value">Значення</label>
                            <input type="text" name="value" class="form-control" id="value" placeholder="Значення" required data-error="Допускаются цифри та десяткова крапка." pattern="^[0-9.]{1,}$">
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="value">
                                <input type="checkbox" name="base">
                                Базова валюта</label>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">Додати</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>