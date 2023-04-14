<?php

namespace app\controllers\admin;

use app\models\AppModel;
use app\models\User;
use ishop\base\Controller;

//контроеллер, який перевіряє користувача на адміна, та повертає айдішник(суперглобальник контроллер для адмінки)
class AppController extends Controller {

    public $layout = 'admin';//шаблон за замовчуваням

    public function __construct($route){//конструктор авторизації адміна
        parent::__construct($route);
        if(!User::isAdmin() && $route['action'] != 'login-admin'){
            redirect(ADMIN . '/user/login-admin');
        }
        new AppModel();
    }
    //отримати айді користувача
    public function getRequestID($get = true, $id = 'id'){
        if($get){
            $data = $_GET;
        }else{
            $data = $_POST;
        }
        $id = !empty($data[$id]) ? (int)$data[$id] : null;
        if(!$id){
            throw new \Exception('Page not found', 404);
        }
        return $id;
    }

}