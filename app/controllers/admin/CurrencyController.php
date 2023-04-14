<?php

namespace app\controllers\admin;

use app\models\admin\Currency;

//контроллер для додавання/редагування/видалення усіх валют сайту
class CurrencyController extends AppController{

    public function indexAction(){
        $currencies = \R::findAll('currency');
        $this->setMeta('Валюти магазину');
        $this->set(compact('currencies'));
    }

    public function deleteAction(){
        $id = $this->getRequestID();
        $currency = \R::load('currency', $id);
        \R::trash($currency);
        $_SESSION['success'] = "Зміни збережено";
        redirect();
    }

    public function editAction(){
        if(!empty($_POST)){
            $id = $this->getRequestID(false);
            $currency = new Currency();
            $data = $_POST;
            $currency->load($data);
            $currency->attributes['base'] = $currency->attributes['base'] ? '1' : '0';
            if(!$currency->validate($data)){
                $currency->getErrors();
                redirect();
            }
            if($currency->update('currency', $id)){
                $_SESSION['success'] = "Зміни збережено";
                redirect();
            }
        }

        $id = $this->getRequestID();
        $currency = \R::load('currency', $id);
        $this->setMeta("Редагування валюти {$currency->title}");
        $this->set(compact('currency'));
    }

    public function addAction(){
        if(!empty($_POST)){
            $currency = new Currency();
            $data = $_POST;
            $currency->load($data);
            $currency->attributes['base'] = $currency->attributes['base'] ? '1' : '0';
            if(!$currency->validate($data)){
                $currency->getErrors();
                redirect();
            }
            if($currency->save('currency')){
                $_SESSION['success'] = 'Валюту додано';
                redirect();
            }
        }
        $this->setMeta('Нова валюта');
    }

}