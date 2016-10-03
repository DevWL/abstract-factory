<?php 

/*
    Abstract factory provides enforce to implement factory methods for classes that inhertis 
*/

/**
 *  Abstract Factory Class
 */
abstract class AbstractFactory
{

    abstract public function createFundaments();
    abstract public function createWall();
    abstract public function createWindow();
    abstract public function createDor();
    abstract public function createRoof();

}

/**
 *  Concreet factory
 */
class PolandFactory extends AbstractFactory
{

    public function createFundaments(){
        return 'fundament'.PHP_EOL;
    }
    public function createWall(){
        return 'walls'.PHP_EOL;
    }
    public function createWindow(){
        return 'windows'.PHP_EOL;
    }
    public function createDor(){
        return 'dors'.PHP_EOL;
    }
    public function createRoof(){
        return 'roof'.PHP_EOL;
    }

}

abstract class Buildig
{
    public $price = null;
    public $size = null;

    abstract function build();
}

class House extends Buildig{
    public $factory;
    public function __construct(AbstractFactory $factory){
        $this->factory = $factory;
    }

    public function build(){
        echo $this->factory->createFundaments();
        echo $this->factory->createWall();
        echo $this->factory->createRoof();
        echo $this->factory->createWindow();
        echo $this->factory->createDor();
    }

}

class Basement extends Buildig{
    public $factory;
    public function __construct(AbstractFactory $factory){
        $this->factory = $factory;
    }

    public function build(){
        echo $this->factory->createFundaments();
        echo $this->factory->createWall();
        echo $this->factory->createDor();
    }

}

class Client
{
    public function orderBuilding($factory, $name){
        if (class_exists($name)){
            $building = new $name(new $factory());
            $this->preset($building);
            return $building;
        }
        throw new Exception("$name is not available", 1);
    }

    public function preset(Buildig $building){
        $building->price = 250000;
        $building->size = 120;
    }
} 