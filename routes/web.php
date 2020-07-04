<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('produtos', 'ProdutoController@getAll');
    $router->get('produtos/{id}', 'ProdutoController@getOne');
    $router->post('produtos', 'ProdutoController@create');
    $router->delete('produtos/{id}', 'ProdutoController@delete');

    $router->get('sabores', 'SaborController@getAll');
    $router->get('sabores/{id}', 'SaborController@getOne');

    $router->get('adicionais', 'AdicionalController@getAll');
    $router->get('adicionais/{id}', 'AdicionalController@getOne');

    $router->get('pedidos', 'PedidoController@getAll');
    $router->get('pedidos/{id}', 'PedidoController@getOne');
});
