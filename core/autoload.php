<?php
    //load the classes
    spl_autoload_register(function($class){
        $path = '../'. str_replace('\\', '/', $class). '.php';  //TODO /nomDir/className
        if(file_exists($path)){
            require_once($path);
        }
        else{
            die("Class $class don't found");
        }
    });
    
?>