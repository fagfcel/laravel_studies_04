<?php

use Illuminate\Support\Facades\Config;
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

Route::get('mysql_test_dynamic_connection', function(){

    try {

        Config::set('database.connections.mysql',[
            'driver' => 'mysql',
            'url' => env('DB_URL'),
            'host' => 'localhost',
            'port' => 3306,
            'database' => 'laravel_mysql_auth',
            'username' => 'user_laravel_mysql_database',
            'password' => '52nEG8SOMIF5rEtOY4D5SA8AYed4Po',
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ]);

        DB::connection('mysql')->getPdo();

        echo 'Conexão ok!';
        
    } catch (Exception $e) {
        echo 'Deu erro!';
    }

});