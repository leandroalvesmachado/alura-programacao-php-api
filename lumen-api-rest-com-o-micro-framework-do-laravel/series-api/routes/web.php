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

/*
GET /series - Listar series
GET /series/:id - Localizar serie
POST /series - Inserir nova serie
PUT /series/:id - Atualizar serie
DELETE /series/:id - Remover serie

Cabeçalhos
    Requisição
        - Accept: application/json
    Resposta
        - Content-Type: application/json

HATEOAS é uma restrição que faz parte da arquitetura de aplicações REST, cujo objetivo é 
ajudar os clientes a consumirem o serviço sem a necessidade de conhecimento prévio profundo da API.

O acrônimo HATEOAS vem de Hypermedia As the Engine Of Application State e o termo “hypermedia” 
no seu nome já dá uma ideia de como este componente funciona em uma aplicação RESTful. 
Ao ser implementado, a API passa a fornecer links que indicarão aos clientes 
como navegar através dos seus recursos.
*/

// Subir o servidor no lumen, ele nao ver com o artisan serve 
// php -S localhost:8000 -t public

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// $router->get('/series', function () {
//     return [
//         'Serie 1',
//         'Serie 2'
//     ];
// });

// $router->get('/series', 'SeriesController@index');

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->group(['prefix' => 'series'], function () use ($router) {
        $router->get('', 'SeriesController@index');
        $router->post('', 'SeriesController@store');
        $router->get('{id}', 'SeriesController@show');
        $router->put('{id}', 'SeriesController@update');
        $router->delete('{id}', 'SeriesController@destroy');
    });

    $router->group(['prefix' => 'episodios'], function () use ($router) {
        $router->get('', 'EpisodiosController@index');
        $router->post('', 'EpisodiosController@store');
        $router->get('{id}', 'EpisodiosController@show');
        $router->put('{id}', 'EpisodiosController@update');
        $router->delete('{id}', 'EpisodiosController@destroy');
    });
});
