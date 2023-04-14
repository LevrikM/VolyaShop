<?php

namespace ishop;

//клас взаємодію з бд
class Db{

    use TSingletone;

    protected function __construct(){
        $db = require_once CONF . '/config_db.php';
        class_alias('\RedBeanPHP\R','\R');
        \R::setup($db['dsn'], $db['user'], $db['pass']);
        if( !\R::testConnection() ){
            throw new \Exception("Немає з'єднання з БД", 500);
        }
        \R::freeze(true);
        if(DEBUG){
            \R::debug(true, 1);
        }
        //розширує таблиці для використання нижнього підкреслення(по дефолту немона)
        \R::ext('xdispense', function($type){
            return \R::getRedBean()->dispense( $type );
        });
    }

}