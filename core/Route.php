<?php 

    namespace Core;

    class Route {

        private static $routes = [];

        public static function get($uri, $function){
            self::$routes['GET'][$uri] = $function;
        }

        public static function post($uri, $function){
            self::$routes['POST'][$uri] = $function;
        }


        public static function refer(){
            $path = $_SERVER['REQUEST_URI'];

            if(strpos($path, '?') ){  //if send vars GET in url
                //$path = trim($path, '/');
                $path = substr($path, 0, strpos($path, '?'));
            }
            self::findRoute($path);
        }

        public static function findRoute($path){
            $method = $_SERVER['REQUEST_METHOD'];

            foreach (self::$routes[$method] as $route => $callback){
                if(strpos($route, ':') !== false){
                    $route = preg_replace('#:[a-zA-Z0-9]+#', '([a-zA-Z0-9]+)', $route);
                }

                if(preg_match("#^$route$#", $path, $matches)){
                    //make new array since position one for use them like params
                    $params = array_slice($matches, 1);

                    if(is_callable($callback)){
                        //divide the array in params for use them in callback
                        $response = $callback(...$params);
                    }

                    if(is_array($callback)){
                        $controller = new $callback[0];
                        $response = $controller->{$callback[1]}(...$params);
                    }
                    
                    if(is_array($response) || is_object($response)) {
                        header('Content-Type:', 'application/json');
                        echo json_encode($response);
                    }
                    else{
                        echo $response;
                    }
                    return;
                }
            }
            self::notFound();
        }

        /**
        * return error if the route not'is found
        */
        public static function notFound(){
            echo '404 not Found';
        }

    }//end class
        
