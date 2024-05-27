<?php 

    use Core\Route;

    //import Controllers
    use App\Controllers\HomeController;

    
    Route::get('/', [HomeController::class, 'index']);
    
    Route::get('/contact', function (){
        echo 'hola amingo 2';
    });

    Route::get('/users/:user', function($param){
        echo 'desde users '.$param;
    });
    Route::refer();
