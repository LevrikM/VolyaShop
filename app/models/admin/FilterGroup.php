<?php

namespace app\models\admin;

use app\models\AppModel;

//модель самих фільтрів для редагування адміном
class FilterGroup extends AppModel{

    public $attributes = [
        'title' => '',
    ];

    public $rules = [
        'required' => [
            ['title'],
        ],
    ];

}