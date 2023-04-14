<section class="content-header">
    <h1>
        Очистка кешу
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Головна</a></li>
        <li class="active">Очистка кешу</li>
    </ol>
</section>


<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Назва</th>
                                <th>Опис</th>
                                <th>Дія</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Кеш категорій</td>
                                    <td>Меню категорій на сайті. Кешується на 1 годину.</td>
                                    <td><a class="delete" href="<?=ADMIN;?>/cache/delete?key=category"><i class="fa fa-fw fa-close text-danger"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Кеш фільтрів</td>
                                    <td>Фільтри та атрибути. Кешуєються на 1 годину.</td>
                                    <td><a class="delete" href="<?=ADMIN;?>/cache/delete?key=filter"><i class="fa fa-fw fa-close text-danger"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>