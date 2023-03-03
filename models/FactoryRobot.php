<?php

namespace app\models;

class FactoryRobot
{
    public function addType( Robot $robot)
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