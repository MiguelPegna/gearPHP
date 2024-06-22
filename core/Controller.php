<?php
    namespace core;

    class Controller{

        public $info;
        
        public function __construct(){
        }

        /**
        * Description: method for obtain view of controller 
        * @param object $controller -> name of controller 
        * @param string $view -> name of view
        */
        public function view($controller, $view){
            $controller = get_class($controller);   //path Controller  TODO: App\Controllers\NameController
            $cleanPathController = str_replace('app\Controllers\\', '', $controller);  //Remove the path and just keep the name of controller   TODO: NameController
            $viewController = str_replace('Controller', '', $cleanPathController);     //Remove the word Controller and just Keep the simple name of controller  TODO Name
            
            $view = str_replace('.', '/', $view);
            $pathFile='../resources/views/'.$viewController. '/'. $view. '.php';
            if(file_exists($pathFile)){
                ob_start();
                # Converts the received arguments into variables.
                if ($this->info !== null) {
                    extract($this->info);
                }
                include "$pathFile";
                $view = ob_get_clean();
                echo $view;
            }
            else{
                return Route::notFound();
            }
        }
        
        /**
        * Description: method for send variables to view 
        * @param string $key -> name of variable 
        * @param string $value -> value of variable 
        */
        public function setVar($key, $value){
            $this->info[$key] = $value;
        }

        /**
        * Description: method for send scripts JS or CCS sheets
        * @param string $ext -> cjs = JS in commonJS  || mjs = JS in EsModule || css = css file
        * @param string $name -> JS file name or css file name 
        */
        public function getScript($ext, $name){
            if($ext != 'cjs' || $ext != 'mjs' || $ext != 'css'){
                $file = '';
            }
            if($ext == 'cjs' ){  //script in commonJS
                $file = '<script src="'. JS_FILES .$name. '.js"></script>';
            }
            if($ext == 'mjs' ){
                $file = '<script type="module" src="'. JS_FILES .$name. '.js"></script>';
            }
            if($ext == 'css' ){    //script in EsModule
                $file = '<link href="'. CSS_FILES .$name. '.css" rel="stylesheet">';
            }
            return $file;
        }

    }