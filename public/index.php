<?php

    /* 
    #RewriteEngine On
    #RewriteCond %{REQUEST_URI} !^/public/
    #RewriteRule ^(.*)$ /public/$1 [L]
    */
    
    require_once '../config/constants.php';
    require_once '../core/autoload.php';
    require_once '../routes/web.php';
