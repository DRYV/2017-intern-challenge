<?php
namespace App;

use Illuminate\Database\Capsule\Manager as Capsule;

class Connection
{
    public function __construct()
    {
        $this->capsule = new Capsule;
        // Same as database configuration file of Laravel.
        $this->capsule->addConnection([
            'driver' => 'sqlite',
            'database' => __DIR__ . '/database.sqlite',
            'prefix' => '',
        ], 'default');
        $this->capsule->bootEloquent();
        $this->capsule->setAsGlobal();
        // Hold a reference to established connection just in case.
        $this->connection = $this->capsule->getConnection('default');
    }
}