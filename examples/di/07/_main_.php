<?php

function _main_() {
    simple_autoloader_register('My', __DIR__);
    
    $configValues = new Zend\Config\Ini(__DIR__ . '/di-config.ini', 'production');
    $containerClass = $configValues->container_class;

    $locator = new $containerClass($configValues->di);

    $c = $locator->get('repository', array('dbAdapter' => 'dbAdapter'));
    echo $c . PHP_EOL . PHP_EOL;
    
    $d = $locator->get('repository');
    echo $d . PHP_EOL . PHP_EOL;
    
    $e = $locator->get('repository', array('dbAdapter' => 'dbAdapter'));
    echo $e . PHP_EOL . PHP_EOL;
    
    $f = $locator->get('repository');
    echo $f . PHP_EOL . PHP_EOL;
    
    echo 'Is it the same object (c && d): ';
    var_dump(($c === $d)); 
    echo PHP_EOL;
    
    echo 'Is it the same object (c && e): ';
    var_dump(($c === $e)); 
    echo PHP_EOL;
    
    echo 'Is it the same object (d && f): ';
    var_dump(($d === $f)); 
    echo PHP_EOL;
    
}
