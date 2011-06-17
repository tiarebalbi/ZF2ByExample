<?php

use Zend\Di\DependencyInjection,
    Zend\Di\DependencyInjector as DIC,
    Zend\Di\Configuration as DiConfiguration,
    Zend\Di\Definition\Compiler as DiCompiler,
    Zend\Code\Scanner\DirectoryScanner;

class DependencyInjector implements DependencyInjection
{
    protected $di;

    public function __construct($config, DIC $di = null)
    {
        if (is_object($config)) {
            if (method_exists($config, 'toArray')) {
                $config = $config->toArray();
            } elseif ($config instanceof Traversable) {
                $config = iterator_to_array($config);
            }
        }
        if (!is_array($config)) {
            throw new InvalidArgumentException('Configuration must be an array or Traversable object');
        }
        $config = new DiConfiguration($config);

        if (null === $di) {
            $di = new DIC();
        }

        $compiler = new DiCompiler();
        $compiler->addCodeScannerDirectory(new DirectoryScanner(__DIR__ . '/My/'));
        $definition = $compiler->compile();
        $di->setDefinition($definition)
           ->configure($config);

        $this->di = $di;
    }

    public function getDiContainer()
    {
        return $this->di;
    }

    public function get($name, array $params = null)
    {
        return $this->di->get($name, $params);
    }

    public function newInstance($name, array $params = null)
    {
        return $this->di->newInstance($name, $params);
    }
}
