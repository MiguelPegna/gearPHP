<?php
    
    namespace app\Controllers;

    use core\Controller;
    use app\Models\HomeModel;

    class HomeController extends Controller{
        public $model;
        
        public function __construct(){
            $this->model = new HomeModel();
        }

        public function index(){
            $this->setVar('title', 'Home Page');
            $this->view('home.home');
        }//end method

        public function countries(){
            header("Access-Control-Allow-Origin: *");
            
            $data = $this->model->index();
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

    }//end class