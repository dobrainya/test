<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=test-db;dbname=test',
    'username' => 'test',
    'password' => '12345',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
