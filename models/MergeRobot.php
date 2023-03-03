<?php

namespace app\models;

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