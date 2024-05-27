<?php
    
    namespace App\Controllers;

    use Core\Controller;
    use Core\View;

    class HomeController extends Controller{


        public function __construct(){
            $this->view = new View();
        }

        public function index(){
            $this->view->getView($this, 'home');
        }//end method

    }//end class