<?php 

    use Core\Route;

    use App\Controllers\HomeController;

    
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/users', [HomeController::class, 'users']);
    
    Route::get('/contact', function (){
        echo 'hola amingo 2';
    });

    Route::get('/users/:user', function($param){
        echo 'desde users '.$param;
    });
    Route::refer();
