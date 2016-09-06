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
    private $player1Name = '';
    private $player2Name = '';

    public function __construct($player1Name, $player2Name)
    {
        $this->player1Name = $player1Name;
        $this->player2Name = $player2Name;
    }

    public function wonPoint($playerName)
    {
        if ('player1' == $playerName) {
            $this->m_score1++;
        } else {
            $this->m_score2++;
        }
    }

    public function getScore()
    {
        $score = "";
        if ($this->isDeuce()) {
            $score = $this->convertIntoDeuceScore();
        } elseif ($this->hasMoreFourPoint()) {
            $score = $this->getScoreForFourOrMorePoints();
        } else {
            for ($i = 1; $i < 3; $i++) {
                if ($i == 1) {
                    $tempScore = $this->m_score1;
                } else {
                    $score .= "-";
                    $tempScore = $this->m_score2;
                }
                $score .= $this->getPoints($tempScore, $score);
            }
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

