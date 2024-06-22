<?php

    namespace app\Models;

    use core\Statements;

    class HomeModel{
        protected $response;

        public function index() {
            $query = "SELECT * FROM users;";
            $request = Statements::select_all($query);
            $this->response = $request;
            return $this->response;
        }

        public function show($id) {
            $query = "SELECT * FROM users where user_id =$id";
            $request = Statements::select_one($query);
            $this->response = $request;
            return $this->response;
        }

        public function store() {
            $query = "INSERT INTO users (col1, col2) VALUES(?, ?)";
            $data = ['valCol1', 'valCol2'];
            $request = Statements::insert($query, $data);
            $request ? $this->response = $request : $this->response = false;
            return $this->response;
        }

        public function update($params){
            $query = "UPDATE users SET col1=?, col2=?) WHERE id=";
            $data = [$params['valCol1'], $params['valCol2']];
            $request = Statements::insert($query, $data);
            $request ? $this->response = $request : $this->response = false;
            return $this->response;
        }
    }