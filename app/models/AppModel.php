<?php

namespace app\models;

use ishop\base\Model;

//модель ддля генерації аласу товару, та функція трансліта укр символів на англійські
class AppModel extends Model{

    public static function createAlias($table, $field, $str, $id){
        $str = self::str2url($str);
        $res = \R::findOne($table, "$field = ?", [$str]);
        if($res){
            $str = "{$str}-{$id}";
            $res = \R::count($table, "$field = ?", [$str]);
            if($res){
                $str = self::createAlias($table, $field, $str, $id);
            }
        }
        return $str;
    }

    public static function str2url($str) {
        // переводимо в траліст
        $str = self::rus2translit($str);
        // в нижній регістр
        $str = strtolower($str);
        // замінам все непотрібне нам на "-"
        $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
        // видаляємо початкові та кінцеві '-'
        $str = trim($str, "-");
        return $str;
    }

    public static function rus2translit($string) {

        $converter = array(

            'а' => 'a',   'б' => 'b',   'в' => 'v',

            'г' => 'g',   'д' => 'd',   'е' => 'e',

            'є' => 'e',   'ж' => 'zh',  'з' => 'z',

            'и' => 'ui',   'і' => 'i',   'к' => 'k',

            'л' => 'l',   'м' => 'm',   'н' => 'n',

            'о' => 'o',   'п' => 'p',   'р' => 'r',

            'с' => 's',   'т' => 't',   'у' => 'u',

            'ф' => 'f',   'х' => 'h',   'ц' => 'c',

            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',

            'ь' => '\'',  'я' => 'ya', 'й' => "yi",



            'А' => 'A',   'Б' => 'B',   'В' => 'V',

            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',

            'Є' => 'E',   'Ж' => 'Zh',  'З' => 'Z',

            'І' => 'I',   'Й' => 'Y',   'К' => 'K',

            'Л' => 'L',   'М' => 'M',   'Н' => 'N',

            'О' => 'O',   'П' => 'P',   'Р' => 'R',

            'С' => 'S',   'Т' => 'T',   'У' => 'U',

            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',

            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',

            'Ь' => '\'',  'И' => 'ui',

            'Ю' => 'Yu',  'Я' => 'Ya',

        );

        return strtr($string, $converter);

    }

}