<?php

namespace app\engine;

 class Autoload
 {
    public static function loadClass()
    {
        spl_autoload_register(function ($className) {
            $filename = str_replace('\\', DIRECTORY_SEPARATOR, $className.'.php');
            $filename = substr_replace($filename, '../',0,4);
            if(file_exists($filename)){
                require $filename;
                return true;
            }
            return false;
        });
    }
 }

