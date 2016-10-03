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

/**
 *  Concreet factory
 */
class UKFactory extends AbstractFactory
{

    public function createFundaments(){
        return 'fundamentUK'.PHP_EOL;
    }
    public function createWall(){
        return 'wallsUK'.PHP_EOL;
    }
    public function createWindow(){
        return 'windowsUK'.PHP_EOL;
    }
    public function createDor(){
        return 'dorsUK'.PHP_EOL;
    }
    public function createRoof(){
        return 'roofUK'.PHP_EOL;
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
    private $_budget;
    private $_size;

    public function orderBuilding($factory, $building){
        if (class_exists($building)){
            $building = new $building(new $factory());
            $this->preset($building);
            return $building;
        }
        throw new Exception("$building is not available", 1);
    }

    public function preset(Buildig $building){
        $this->validate();
        $building->price = $this->_budget;
        $building->_size = $this->_size;
        $this->clear();
    }

    public function validate(){
        $error = false;
        if($this->_budget == null) $error = true;
        if($this->_size == null) $error = true;
        if($error) throw new Exception("Set order values", 1);
        

    }

    public function clear(){
        $this->_budget = null;
        $this->_size = null;
    }

    /**
     * Sets the value of _budget.
     *
     * @param mixed $_budget the _budget
     *
     * @return self
     */
    public function _setBudget($budget)
    {
        $this->_budget = $budget;
    }

    /**
     * Sets the value of _size.
     *
     * @param mixed $_size the _size
     *
     * @return self
     */
    public function _setsize($size)
    {
        $this->_size = $size;
    }

} 