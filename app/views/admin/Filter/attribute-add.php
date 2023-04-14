<section class="content-header">
    <h1>
        Новий фільтр
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Головна</a></li>
        <li><a href="<?=ADMIN;?>/filter/attribute">Список фільтрів</a></li>
        <li class="active">Новий фільтр</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN;?>/filter/attribute-add" method="post" data-toggle="validator" id="add">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="value">Найменування</label>
                            <input type="text" name="value" class="form-control" id="value" placeholder="Найменування" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Група</label>
                            <select name="attr_group_id" id="category_id" class="form-control">
                                <option>Оберіть групу</option>
                                <?php foreach($group as $item): ?>
                                    <option value="<?=$item->id;?>"><?=$item->title;?></option>
                                <?php endforeach; ?>
                            </select>
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