<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    try {
        DB::connection()->getPdo();
        echo "Conexão com a base de dados: ". DB::connection()->getDatabaseName();
    } catch (Exception $e) {
        //throw $th;
        die("Não foi possivel conectar com a base de dados. Erro: " . $e->getMessage());
    }
});
