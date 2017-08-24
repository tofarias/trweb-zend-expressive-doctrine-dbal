<?php

return [
  'dependencies'   => [
      'factories' => [
          'DBAL' => App\Factory\DBALFactory::class,
          App\Actions\GetAction::class => App\Factory\ActionFactory::class,
          App\Actions\PostAction::class => App\Factory\ActionFactory::class,
          App\Actions\PutAction::class => App\Factory\ActionFactory::class,
          App\Actions\DeleteAction::class => App\Factory\ActionFactory::class
      ]
  ],
  'database' => [
      'dbname' => 'expressive_api',
      'user' => 'root',
      'password' => '123',
      'host' => 'localhost',
      'driver' => 'pdo_mysql'
  ]
];


