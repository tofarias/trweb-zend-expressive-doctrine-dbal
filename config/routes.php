<?php

use Zend\Expressive\Helper\BodyParams\BodyParamsMiddleware;

$app->post('/api/login', App\Actions\LoginAction::class);

$app->route('/api', App\Actions\ApiAction::class,['GET','OPTIONS']);

$app->get('/api/series[/{id:\d+}]', [App\Auth\Guard::class, App\Actions\GetAction::class]);

$app->post('/api/series', [App\Auth\Guard::class, App\Actions\PostAction::class]);

$app->put('/api/series/{id:[0-9]+}', [BodyParamsMiddleware::class,App\Auth\Guard::class, App\Actions\PutAction::class]);

$app->delete('/api/series/{id}', [App\Auth\Guard::class, App\Actions\DeleteAction::class]);