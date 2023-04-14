<?php

namespace app\controllers\admin;

//контроллер який дістає інформацію по кількості(користувачів,замовлень,товарів,категорій) з БД
class MainController extends AppController {

    public function indexAction(){
        $countNewOrders = \R::count('order', "status = '0'");
        $countUsers = \R::count('user');
        $countProducts = \R::count('product');
        $countCategories = \R::count('category');
        $this->setMeta('Панель керування');
        $this->set(compact('countNewOrders', 'countCategories', 'countProducts', 'countUsers'));
    }

}