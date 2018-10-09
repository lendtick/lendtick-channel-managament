<?php 
return [

  'default' => env('DB_CONNECTION'),

  'connections' => [

   'sqlsrv' => [
     'driver'    => env('DB_CONNECTION'),
     'host'      => env('DB_HOST'),
     'database'  => env('DB_DATABASE'),
     'username'  => env('DB_USERNAME'),
     'password'  => env('DB_PASSWORD'),
     'charset'   => 'utf8',
     'collation' => 'utf8_unicode_ci',
     'prefix'    => 'channel.',
     'strict'    => false,
   ], 
   'mongodb' => [
    'driver'   => 'mongodb',
    'host'     => env('MONGO_DB_HOST','137.116.150.95'),
    'port'     => env('MONGO_DB_PORT',27017),
    'database' => env('MONGO_DB_DATABASE'),
    'username' => env('MONGO_DB_USERNAME'),
    'password' => env('MONGO_DB_PASSWORD'),
    'options'  => [
      'db' => 'sync' 
    ]
  ],
],
];
