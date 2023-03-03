<?php

namespace app\components;

use \app\models\FactoryRobot;
use \app\models\Robot1;
use \app\models\Robot2;
use \app\models\MergeRobot;

class Application
{
    public function run()
    {
        $this->runAction();
    }

    private function runAction()
    {
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

        var_dump($res);

        var_dump($res->getSpeed());
        var_dump($res->getWeight());
        var_dump($res->getHeight());
    }
}