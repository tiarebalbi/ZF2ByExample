<?php

use Zend\Di\ServiceLocator;

class GeneratedServiceLocator extends ServiceLocator
{

    public function get($name, array $params = array())
    {
        switch ($name) {
            case 'repository':
            case 'My\RepositoryA':
                return $this->getMyRepositoryA();
        
            case 'My\EntityA':
                return $this->getMyEntityA();
        
            case 'dbAdapter':
            case 'My\DbAdapter':
                return $this->getMyDbAdapter();
        
            case 'My\RepositoryB':
                return $this->getMyRepositoryB();
        
            case 'mapper':
            case 'My\Mapper':
                return $this->getMyMapper();
        
            default:
                return parent::get($name, $params);
        }
    }

    public function getMyRepositoryA()
    {
        if (isset($this->services['My\RepositoryA'])) {
            return $this->services['My\RepositoryA'];
        }
        
        $object = new \My\RepositoryA();
        $this->services['My\RepositoryA'] = $object;
        return $object;
    }

    public function getMyEntityA()
    {
        if (isset($this->services['My\EntityA'])) {
            return $this->services['My\EntityA'];
        }
        
        $object = new \My\EntityA();
        $this->services['My\EntityA'] = $object;
        return $object;
    }

    public function getMyDbAdapter()
    {
        if (isset($this->services['My\DbAdapter'])) {
            return $this->services['My\DbAdapter'];
        }
        
        $object = new \My\DbAdapter('readonly', 'mypassword');
        $this->services['My\DbAdapter'] = $object;
        return $object;
    }

    public function getMyRepositoryB()
    {
        if (isset($this->services['My\RepositoryB'])) {
            return $this->services['My\RepositoryB'];
        }
        
        $object = new \My\RepositoryB();
        $this->services['My\RepositoryB'] = $object;
        return $object;
    }

    public function getMyMapper()
    {
        if (isset($this->services['My\Mapper'])) {
            return $this->services['My\Mapper'];
        }
        
        $object = new \My\Mapper();
        $this->services['My\Mapper'] = $object;
        return $object;
    }

    public function getRepository()
    {
        return $this->get('My\RepositoryA');
    }

    public function getMapper()
    {
        return $this->get('My\Mapper');
    }

    public function getDbAdapter()
    {
        return $this->get('My\DbAdapter');
    }


}

