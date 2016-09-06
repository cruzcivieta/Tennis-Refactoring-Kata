<?php

namespace CruzCivieta\TennisGame;

class TennisGame1 implements TennisGame
{
    const DEUCE = "Deuce";
    const DEUCE_SCORES = [
        0 => 'Love-All',
        1 => 'Fifteen-All',
        2 => 'Thirty-All',
    ];

    private $m_score1 = 0;
    private $m_score2 = 0;

    /**
     * @var Player
     */
    private $localPlayer;

    /**
     * @var Player
     */
    private $visitorPlayer;

    public function __construct($playerOneName, $playerSecondName)
    {
        $this->localPlayer = new Player($playerOneName);
        $this->visitorPlayer = new Player($playerSecondName);
    }

    public function wonPoint($playerName)
    {
        if ($this->localPlayer->isYou($playerName)) {
            $this->m_score1++;
        } else {
            $this->m_score2++;
        }
    }

    public function getScore()
    {
        if ($this->isDeuce()) {
            $score = $this->convertIntoDeuceScore();
        } elseif ($this->hasMoreFourPoint()) {
            $score = $this->getScoreForFourOrMorePoints();
        } else {
            $scorePlayerOne = $this->getPoints($this->m_score1);
            $scorePlayerTwo = $this->getPoints($this->m_score2);

            $score = $scorePlayerOne . '-' . $scorePlayerTwo;
        }

        return $score;
    }

    /**
     * @return string
     */
    private function convertIntoDeuceScore()
    {
        if (!array_key_exists($this->m_score1, static::DEUCE_SCORES)) {
            return static::DEUCE;
        }

        return static::DEUCE_SCORES[$this->m_score1];
    }

    /**
     * @return bool
     */
    private function isDeuce()
    {
        return $this->m_score1 == $this->m_score2;
    }

    /**
     * @return bool
     */
    private function hasMoreFourPoint()
    {
        return $this->m_score1 >= 4 || $this->m_score2 >= 4;
    }

    /**
     * @return string
     */
    private function getScoreForFourOrMorePoints()
    {
        $minusResult = $this->m_score1 - $this->m_score2;

        if ($minusResult == 1) {
            $score = "Advantage player1";
            return $score;
        } elseif ($minusResult == -1) {
            $score = "Advantage player2";
            return $score;
        } elseif ($minusResult >= 2) {
            $score = "Win for player1";
            return $score;
        } else {
            $score = "Win for player2";
            return $score;
        }
    }

    /**
     * @param $tempScore
     * @return string
     */
    private function getPoints($tempScore)
    {
        $points = [
            0 => 'Love',
            1 => 'Fifteen',
            2 => 'Thirty',
            3 => 'Forty',
        ];

        return $points[$tempScore];
    }
}

