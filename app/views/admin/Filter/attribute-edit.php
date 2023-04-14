<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Редагування фільтру <?=h($attr->value);?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Головна</a></li>
        <li><a href="<?=ADMIN;?>/filter/attribute">Список фільтрів</a></li>
        <li class="active">Редагування</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN;?>/filter/attribute-edit" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="value">Найменування</label>
                            <input type="text" name="value" class="form-control" id="value" placeholder="Найменування" required value="<?=h($attr->value);?>">
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Група</label>
                            <select name="attr_group_id" id="category_id" class="form-control">
                                <?php foreach($attrs_group as $item): ?>
                                    <option value="<?=$item->id;?>"<?php if($item->id == $attr->attr_group_id) echo ' selected'; ?>><?=$item->title;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="id" value="<?=$attr->id;?>">
                        <button type="submit" class="btn btn-success">Зберегти</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>