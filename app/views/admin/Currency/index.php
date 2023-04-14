<section class="content-header">
    <h1>
        Список валют
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Головна</a></li>
        <li class="active">Список валют</li>
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
                                <th>ID</th>
                                <th>Найменування</th>
                                <th>Код</th>
                                <th>Значення</th>
                                <th>Дія</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($currencies as $currency): ?>
                                <tr>
                                    <td><?=$currency->id;?></td>
                                    <td><?=$currency->title;?></td>
                                    <td><?=$currency->code;?></td>
                                    <td><?=$currency->value;?></td>
                                    <td>
                                        <a href="<?=ADMIN;?>/currency/edit?id=<?=$currency->id;?>"><i class="fa fa-fw fa-pencil"></i></a>
                                        <a class="delete" href="<?=ADMIN;?>/currency/delete?id=<?=$currency->id;?>"><i class="fa fa-fw fa-close text-danger"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>