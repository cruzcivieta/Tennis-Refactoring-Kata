<?php


namespace CruzCivieta\TennisGame;


class Player
{
    private $name;

    /**
     * Player constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
}