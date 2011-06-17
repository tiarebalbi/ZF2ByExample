<?php
$basePath = __DIR__ . '/../../..';
$config = (file_exists($basePath . '/config.php')) ? $basePath . '/config.php' : $basePath . '/config.dist.php';
include $config;
set_include_path(__DIR__ . PATH_SEPARATOR . ZF2_PATH . PATH_SEPARATOR . get_include_path());
spl_autoload_register(function ($class) {
    $filename = str_replace(array('\\', '_'), DIRECTORY_SEPARATOR, $class) . '.php';
    return include_once $filename;
});

$configValues   = new Zend\Config\Ini(__DIR__ . '/di-config.ini', 'development');
$containerClass = $configValues->container_class;
$container      = new $containerClass($configValues->di);
$di             = $container->getDiContainer();

$generator = new Zend\Di\ServiceLocator\Generator($di);
$generator->setContainerClass('GeneratedServiceLocator');
$codegen = $generator->getCodeGenerator();
$codegen->setFilename(__DIR__ . '/GeneratedServiceLocator.php');
$codegen->write();
echo "Generated GeneratedServiceLocator class\n";
