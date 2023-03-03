<?php

namespace app\models;


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


