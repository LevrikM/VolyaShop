<?php

namespace ishop;
//одинак використовується цей патерн в деяких класах
trait TSingletone{

    private static $instance;

    public static function instance(){
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }

}