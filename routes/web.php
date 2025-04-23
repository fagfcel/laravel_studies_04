<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/mysql', function(){
    try {
        DB::connection('mysqlAlex')->getPdo();
        echo "Conexão com a base de dados: ". DB::connection()->getDatabaseName();
    } catch (Exception $e) {
        //throw $th;
        die("Não foi possivel conectar com a base de dados. Erro: " . $e->getMessage());
    }
});

Route::get('/sqlite', function(){
    try {
        DB::connection()->getPdo();
        echo "Conexão com a base de dados: ". DB::connection()->getDatabaseName();
    } catch (Exception $e) {
        die("Não foi possivel conectar com a base de dados. Erro: " . $e->getMessage());
    }
});

Route::get('/mysql_test_two_databases', function(){
    try {
        DB::connection('mysql_users')->getPdo();
        echo "Sucesso: " . DB::connection('mysql_users')->getDatabaseName();

        echo "<br/>";

        DB::connection('mysql_app')->getPdo();
        echo "Sucesso: ". DB::connection('mysql_app')->getDatabaseName();
        echo "<br/>";

    } catch (Exception $e) {
        die ("ERROR:" . $e->getMessage());
    }
});