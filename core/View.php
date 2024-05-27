<?php

    namespace Core;

    class View{

        public function getView($controller, $view, $info=''){
            $controller = get_class($controller);   //path Controller
            $cleanPathController = str_replace('App\Controllers\\', '', $controller);  //Remove the path and just keep the name of controller   TODO: NameController
            $viewController = str_replace('Controller', '', $cleanPathController);     //Remove the word Controller and just Keep the simple name of controlle  TODO Name
            
            $view = str_replace('.', '/', $view);
            $pathFile='../resources/views/'.$viewController. '/'. $view. '.php';
            if(file_exists($pathFile)){
                ob_start(); 
                $view = require_once('../resources/views/'.$viewController. '/'. $view. '.php');
                //$view = ob_get_clean();
                return $view;
            }
        }

    }//end class