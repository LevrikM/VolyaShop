<?php

namespace app\models\admin;

use app\models\AppModel;

//модель валюти для редагування адміном
class Currency extends AppModel{

    public $attributes = [
        'title' => '',
        'code' => '',
        'symbol_left' => '',
        'symbol_right' => '',
        'value' => '',
        'base' => '',
    ];

    public $rules = [
        'required' => [
            ['title'],
            ['code'],
            ['value'],
        ],
        'numeric' => [
            ['value'],
        ],
    ];

}