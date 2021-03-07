<?php

function psr4(string $namespace)
{
    return match ($namespace) {
        'Core'   => "core",
        'App'    => "src",
        'Test'   => 'tests',
        default => false
      };
}

spl_autoload_register(function ($class_name) {
    $class_name = str_replace('\\', '/', $class_name);
    $class_name_explode = explode('/', $class_name);

    $namespace = psr4($class_name_explode[0]);
    if ($namespace) {
        $class_name = preg_replace('/'.$class_name_explode[0].'/', $namespace, $class_name, 1);
    }
    require __DIR__ . '/' . $class_name . '.php';
});
