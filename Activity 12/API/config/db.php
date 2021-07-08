<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' =>  getenv('DATABASE_NAME') ? "pgsql:host=". getenv('DATABASE_HOST') . ";port=". getenv('DATABASE_PORT') . ";dbname=" . getenv('DATABASE_NAME') : 'mysql:host=localhost;dbname=balancer',
    'username' => getenv('DATABASE_USERNAME'), // 'root',
    'password' => getenv('DATABASE_PASSWORD'), //|| '',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
