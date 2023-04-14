<?php

namespace app\controllers\admin;

use app\models\admin\FilterAttr;
use app\models\admin\FilterGroup;

//контроллер для додавання/редагування/видалення усіх фільтрів та атрибутів фільтрів сайту
class FilterController extends AppController{

    public function groupDeleteAction(){
        $id = $this->getRequestID();
        $count = \R::count('attribute_value', 'attr_group_id = ?', [$id]);
        if($count){
            $_SESSION['error'] = 'Видалення неможливе, у групі є атрибути';
            redirect();
        }
        \R::exec('DELETE FROM attribute_group WHERE id = ?', [$id]);
        $_SESSION['success'] = 'Видалено';
        redirect();
    }

    public function attributeDeleteAction(){
        $id = $this->getRequestID();
        \R::exec("DELETE FROM attribute_product WHERE attr_id = ?", [$id]);
        \R::exec("DELETE FROM attribute_value WHERE id = ?", [$id]);
        $_SESSION['success'] = 'Видалено';
        redirect();
    }

    public function attributeEditAction(){
        if(!empty($_POST)){
            $id = $this->getRequestID(false);
            $attr = new FilterAttr();
            $data = $_POST;
            $attr->load($data);
            if(!$attr->validate($data)){
                $attr->getErrors();
                redirect();
            }
            if($attr->update('attribute_value', $id)){
                $_SESSION['success'] = 'Зміни збережено';
                redirect();
            }
        }
        $id = $this->getRequestID();
        $attr = \R::load('attribute_value', $id);
        $attrs_group = \R::findAll('attribute_group');
        $this->setMeta('Редагування атрибуту');
        $this->set(compact('attr', 'attrs_group'));
    }

    public function attributeAddAction(){
        if(!empty($_POST)){
            $attr = new FilterAttr();
            $data = $_POST;
            $attr->load($data);
            if(!$attr->validate($data)){
                $attr->getErrors();
                redirect();
            }
            if($attr->save('attribute_value', false)){
                $_SESSION['success'] = 'Атрибут додано';
                redirect();
            }
        }
        $group = \R::findAll('attribute_group');
        $this->setMeta('Новий фільтр');
        $this->set(compact('group'));
    }

    public function groupEditAction(){
        if(!empty($_POST)){
            $id = $this->getRequestID(false);
            $group = new FilterGroup();
            $data = $_POST;
            $group->load($data);
            if(!$group->validate($data)){
                $group->getErrors();
                redirect();
            }
            if($group->update('attribute_group', $id)){
                $_SESSION['success'] = 'Зміни збережено';
                redirect();
            }
        }
        $id = $this->getRequestID();
        $group = \R::load('attribute_group', $id);
        $this->setMeta("Редагування групи {$group->title}");
        $this->set(compact('group'));
    }

    public function groupAddAction(){
        if(!empty($_POST)){
            $group = new FilterGroup();
            $data = $_POST;
            $group->load($data);
            if(!$group->validate($data)){
                $group->getErrors();
                redirect();
            }
            if($group->save('attribute_group', false)){
                $_SESSION['success'] = 'Группа добавлена';
                redirect();
            }
        }
        $this->setMeta('Новая группа фильтров');
    }
    //дістає фільтри з БД
    public function attributeGroupAction(){
        $attrs_group = \R::findAll('attribute_group');
        $this->setMeta('Групи фільтрів');
        $this->set(compact('attrs_group'));
    }
    //дістає атрибути фільтрів з БД
    public function attributeAction(){
        $attrs = \R::getAssoc("SELECT attribute_value.*, attribute_group.title FROM attribute_value JOIN attribute_group ON attribute_group.id = attribute_value.attr_group_id");
        $this->setMeta('Фильтры');
        $this->set(compact('attrs'));
    }
}