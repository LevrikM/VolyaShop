<?php

namespace app\controllers;

use app\models\User;

//котроллер користувача(перегляд усіх замовлених товарів,зміна особистої інфомарції,реєстрація,авторизація)
class UserController extends AppController {

    public function signupAction(){
        if(!empty($_POST)){
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if(!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
                $_SESSION['form_data'] = $data;
            }else{
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                if($user->save('user')){
                    $_SESSION['success'] = 'Користувач зареєстрований. Тепер потрібно увійти до облікового запису!';
                    redirect('/user/login');
                }else{
                    $_SESSION['error'] = 'Помилка!';
                }
            }
            redirect();
        }
        $this->setMeta('Реєстрація');
    }

    public function loginAction(){
        if(!empty($_POST)){
            $user = new User();
            if($user->login()){
                $_SESSION['success'] = 'Ви успішно авторизовані';
            }else{
                $_SESSION['error'] = 'Логін чи пароль введено невірно';
            }
            redirect();
        }
        $this->setMeta('Вход');
    }

    public function logoutAction(){
        if(isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect();
    }

    public function cabinetAction(){
        if(!User::checkAuth()) redirect();
        $this->setMeta('Особистий кабінет');
    }

    public function editAction(){
        if(!User::checkAuth()) redirect('/user/login');
        if(!empty($_POST)){
            $user = new \app\models\admin\User();
            $data = $_POST;
            $data['id'] = $_SESSION['user']['id'];
            $data['role'] = $_SESSION['user']['role'];
            $user->load($data);
            if(!$user->attributes['password']){
                unset($user->attributes['password']);
            }else{
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            }
            if(!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
                redirect();
            }
            if($user->update('user', $_SESSION['user']['id'])){
                foreach($user->attributes as $k => $v){
                    if($k != 'password') $_SESSION['user'][$k] = $v;
                }
                $_SESSION['success'] = 'Зміни збережено';
            }
            redirect();
        }
        $this->setMeta('Зміни особистих даних');
    }

    public function ordersAction(){
        if(!User::checkAuth()) redirect('/user/login');
        $orders = \R::findAll('order', 'user_id = ?', [$_SESSION['user']['id']]);
        $this->setMeta('Історія замовлень');
        $this->set(compact('orders'));
    }

}