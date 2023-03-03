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

    private $speed;
    private $weight;

    public function getSpeed()
    {
        return $this->speed;
    }


    public function getWeight()
    {
        return $this->weight;
    }

    public function setSpeed( $speed )
    {
        $this->speed = $speed;
    }

    public function setWeight( $weight )
    {
        $this->weight = $weight;
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
    public function addRobot($listRobot)
    {
        $createRobots = [];
        if(is_array($listRobot)){
            $robots = $listRobot;
            foreach ($robots as $robot){
                $createRobots[] = new $robot();
            }
        } else {
            $createRobots[] = new $listRobot();
        }

        return $createRobots;
    }
}

$factory = new FactoryRobot();

$factory->addType(new Robot1());
$factory->addType(new Robot2());

echo '<pre>';
//var_dump($factory->createRobot1(5));
//var_dump($factory->createRobot2(2));


$mergeRobot = new MergeRobot();
$mergeRobot->addRobot(new Robot2());
$mergeRobot->addRobot($factory->createRobot2(2));
$factory->addType($mergeRobot);
$listMergeRobot = $factory->createMergeRobot(1);
$res = reset($listMergeRobot);

//Результатом роботи методу буде мінімальна швидкість з усіх об’єднаних роботів
var_dump($res);
var_dump($res->getSpeed());
// Результатом роботи методу буде сума всіх ваг об’єднаних роботів
var_dump($res->getWeight());

