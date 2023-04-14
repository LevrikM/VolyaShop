<section class="content-header">
    <h1>
        Редагування товару <?=$product->title;?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Головна</a></li>
        <li><a href="<?=ADMIN;?>/product">Список товарів</a></li>
        <li class="active">Редагування</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN;?>/product/edit" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="title">Найменування товару</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Найменування товару" value="<?=h($product->title);?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Батьківська категорія</label>
                            <?php new \app\widgets\menu\Menu([
                                'tpl' => WWW . '/menu/select.php',
                                'container' => 'select',
                                'cache' => 0,
                                'cacheKey' => 'admin_select',
                                'class' => 'form-control',
                                'attrs' => [
                                    'name' => 'category_id',
                                    'id' => 'category_id',
                                ],
                            ]) ?>
                        </div>

                        <div class="form-group">
                            <label for="keywords">Ключові слова</label>
                            <input type="text" name="keywords" class="form-control" id="keywords" placeholder="Ключові слова" value="<?=h($product->keywords);?>">
                        </div>

                        <div class="form-group">
                            <label for="description">Опис</label>
                            <input type="text" name="description" class="form-control" id="description" placeholder="Опис" value="<?=h($product->description);?>">
                        </div>

                        <div class="form-group has-feedback">
                            <label for="price">Ціна</label>
                            <input type="text" name="price" class="form-control" id="description" placeholder="Ціна" pattern="^[0-9.]{1,}$" value="<?=$product->price;?>" required data-error="Допускаются цифри та десятична крапка.">
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="old_price">Стара ціна</label>
                            <input type="text" name="old_price" class="form-control" id="description" placeholder="Стара ціна(якщо є)" pattern="^[0-9.]{1,}$" value="<?=$product->old_price;?>" data-error="Допускаются цифри та десятична крапка.">
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="content">Контент</label>
                            <textarea name="content" id="editor1" cols="80" rows="10"><?=$product->content;?></textarea>
                        </div>

                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="status"<?=$product->status ? ' checked' : null;?>> Статус
                            </label>
                        </div>

                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="hit"<?=$product->hit ? ' checked' : null;?>> Хіт
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="related">Пов'язані товари</label>
                            <select name="related[]" class="form-control select2" id="related" multiple>
                                <?php if(!empty($related_product)): ?>
                                    <?php foreach($related_product as $item): ?>
                                        <option value="<?=$item['related_id'];?>" selected><?=$item['title'];?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <?php new \app\widgets\filter\Filter($filter, WWW . '/filter/admin_filter_tpl.php'); ?>
                        <div class="form-group">
                            <div class="col-md-4">
                                <div class="box box-danger box-solid file-upload">
                                    <div class="box-header">
                                        <h3 class="box-title">Базова світлина</h3>
                                    </div>
                                    <div class="box-body">
                                        <div id="single" class="btn btn-success" data-url="product/add-image" data-name="single">Виберіть файл</div>
                                        <div class="single">
                                            <img src="/images/<?=$product->img;?>" alt="" style="max-height: 150px;">
                                        </div>
                                    </div>
                                    <div class="overlay">
                                        <i class="fa fa-refresh fa-spin"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="box box-primary box-solid file-upload">
                                    <div class="box-header">
                                        <h3 class="box-title">Картинки галереї</h3>
                                    </div>
                                    <div class="box-body">
                                        <div id="multi" class="btn btn-success" data-url="product/add-image" data-name="multi">Виберіть файл</div>
                                        <div class="multi">
                                            <?php if(!empty($gallery)): ?>
                                                <?php foreach($gallery as $item): ?>
                                                    <img src="/images/<?=$item;?>" alt="" style="max-height: 150px; cursor: pointer;" data-id="<?=$product->id;?>" data-src="<?=$item;?>" class="del-item">
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="overlay">
                                        <i class="fa fa-refresh fa-spin"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="id" value="<?=$product->id;?>">
                        <button type="submit" class="btn btn-success">Зберегти</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>