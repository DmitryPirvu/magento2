<?php
error_reporting(-1);
ini_set("display_errors", 1);


class DIContainer
{
    protected $services = [];

    public function __construct(){}

    public function listServices()
    {
        return array_keys($this->services);
    }

    public function setService($service_name, callable $callable)
    {
        $this->services[$service_name] = $callable;
    }

    public function getService($service_name, $args = [])
    {
        if ( ! array_key_exists($service_name, $this->services)) {
            throw new Exception("The service: $service_name does not exist");
        }

        if (!empty($args)) {
            return $this->services[$service_name]($args);
        }

        return $this->services[$service_name]();
    }

    public function __set($service_name, callable $callable)
    {
        $this->setService($service_name, $callable);
    }

    public function __get($service_name)
    {
        return $this->getService($service_name);
    }
}

$config = [
    'aws' => [
        'key' => '123',
        'private_key' => 'abc'
    ],
    'db' => [
        'user' => 'username',
        'pass' => '12345'
    ]
];

$di = new DIContainer();

$di->setService('aws', function ($args) use ($config){
   $obj = new stdClass();
   $obj->name = 'aws';
   $obj->args1 = $args[0];
   $obj->args2 = $args[1];
   $obj->key = $config['aws']['key'];
   $obj->private_key = $config['aws']['private_key'];

   return $obj;
});

$di->setService('db', function () use ($config){
    $obj = new stdClass();
    $obj->name = 'db';
    $obj->user = $config['db']['user'];
    $obj->pass = $config['db']['pass'];

    return $obj;
});

$di->email = function (){
    $obj = new stdClass();
    $obj->name = 'email';
    return $obj;
};

$db = $di->getService('db');
$aws = $di->getService('aws', ['hello', 'world']);

echo "<pre>";
print_r($aws);
print_r($db);
print_r($di->email->name);
print_r($di->listServices());

