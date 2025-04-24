<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/mysql_test', function(){
    DB::connection('mysql')->getPdo();
    echo 'Conexão OK!';
});