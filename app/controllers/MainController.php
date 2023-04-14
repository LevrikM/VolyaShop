<?php

namespace app\controllers;

use ishop\Cache;

//контрллер який робить запит на бд щоб отримати товари на головній сторінці
class MainController extends AppController {

    public function indexAction(){
        $hits = \R::find('product', "hit = '1' AND status = '1' LIMIT 50");
        $this->setMeta('Головна сторінка', 'Опис', 'Ключі');
        $this->set(compact('hits'));
    }

}