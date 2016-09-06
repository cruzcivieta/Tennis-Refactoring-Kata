<?php

namespace CruzCivieta\TennisGame;

class TennisGame1 implements TennisGame
{
    /**
     * @var Player
     */
    private $localPlayer;

    /**
     * @var Player
     */
    private $visitorPlayer;

    /**
     * @var ScoreBoard
     */
    private $scoreBoard;

    public function __construct($playerOneName, $playerSecondName)
    {
        $this->localPlayer = new Player($playerOneName);
        $this->visitorPlayer = new Player($playerSecondName);

        $this->scoreBoard = new ScoreBoard();
    }

    public function wonPoint($playerName)
    {
        $this->givePoint($playerName);
    }

    public function getScore()
    {
        return $this->scoreBoard->getScore();
    }

    /**
     * @param $playerName
     */
    private function givePoint($playerName)
    {
        if ($this->localPlayer->isYou($playerName)) {
            $this->scoreBoard->pointForLocal();
        } else {
            $this->scoreBoard->pointForVisitor();
        }
    }
}

