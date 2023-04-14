<section class="content-header">
    <h1>
        Список категорій
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Головна</a></li>
        <li><a href="<?=ADMIN;?>/category">Список категорій</a></li>
        <li class="active">Нова категорія</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                    <form action="<?=ADMIN;?>/category/add" method="post" data-toggle="validator">
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="title">Найменування категорії</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Найменування категорії" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Батьківська категорія</label>
                                <?php new \app\widgets\menu\Menu([
                                    'tpl' => WWW . '/menu/select.php',
                                    'container' => 'select',
                                    'cache' => 0,
                                    'cacheKey' => 'admin_select',
                                    'class' => 'form-control',
                                    'attrs' => [
                                        'name' => 'parent_id',
                                        'id' => 'parent_id',
                                    ],
                                    'prepend' => '<option value="0">Самостійна категорія</option>',
                                ]) ?>
                            </div>
                            <div class="form-group">
                                <label for="keywords">Ключові слова</label>
                                <input type="text" name="keywords" class="form-control" id="keywords" placeholder="Ключові слова">
                            </div>
                            <div class="form-group">
                                <label for="description">Опис</label>
                                <input type="text" name="description" class="form-control" id="description" placeholder="Опис">
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