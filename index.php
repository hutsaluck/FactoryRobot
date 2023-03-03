<?php

class FactoryRobot
{
    public function addType(Robot $robot)
    {
        return new $robot();
    }

    public function createRobot1( int $numberRobot ): array
    {
        $robots = [];

        $i = 1;
        while ($i <= $numberRobot){
            $robots[] = new Robot1();
            $i++;
        }
        return $robots;
    }

    public function createRobot2( int $numberRobot ): array
    {
        $robots = [];

        $i = 1;
        while ($i <= $numberRobot){
            $robots[] = new Robot2();
            $i++;
        }
        return $robots;
    }

    public function createMergeRobot( int $numberRobot ): array
    {
        $robots = [];

        $i = 1;
        while ($i <= $numberRobot){
            $robots[] = new MergeRobot();
            $i++;
        }
        return $robots;
    }
}

class Robot
{

    protected $speed;
    protected $weight;
    protected $height;

    public function getSpeed()
    {
        return $this->speed;
    }


    public function getWeight()
    {
        return $this->weight;
    }
    public function getHeight()
    {
        return $this->height;
    }

    public function setSpeed( $speed )
    {
        $this->speed = $speed;
    }

    public function setWeight( $weight )
    {
        $this->weight = $weight;
    }

    public function setHeight( $height )
    {
        $this->height = $height;
    }
}

class Robot1 extends Robot
{

}

class Robot2 extends Robot
{

}

class MergeRobot extends Robot
{
    private  $createRobots = [];

    public function setSpeed($speed = 0)
    {
        foreach ($this->createRobots as $createRobot){
            $this->speed += $createRobot->getSpeed();
        }
    }

    public function setWeight($weight = 0)
    {
        foreach ($this->createRobots as $createRobot){
            $this->weight += $createRobot->getWeight();
        }
    }
    public function setHeight($weight = 0)
    {
        foreach ($this->createRobots as $createRobot){
            $this->height += $createRobot->getHeight();
        }
    }

    public function addRobot($listRobot)
    {
        if(is_array($listRobot)){
            $robots = $listRobot;
            foreach ($robots as $robot){
                $this->createRobots[] = $robot;
            }
        } else {
            $this->createRobots[] = $listRobot;
        }

        $this->setSpeed();
        $this->setWeight();
        $this->setHeight();

        return $this->createRobots;
    }
}

$factory = new FactoryRobot();

$factory->addType(new Robot1());
$factory->addType(new Robot2());

$mergeRobot = new MergeRobot();
$mergeRobot->addRobot(new Robot2());
$mergeRobot->addRobot($factory->createRobot2(2));


$factory->addType($mergeRobot);

$listMergeRobot = $factory->createMergeRobot(1);
$res = reset($listMergeRobot);

$robot1 = $factory->addType(new Robot1());
$robot1->setSpeed(6);
$robot1->setWeight(5);
$robot1->setHeight(10);

$robot2 = $factory->addType(new Robot2());
$robot2->setSpeed(6);
$robot2->setWeight(5);
$robot2->setHeight(12);

$res->addRobot([$robot1, $robot2]);


echo '<pre>';

var_dump($res);

var_dump($res->getSpeed());
var_dump($res->getWeight());
var_dump($res->getHeight());

