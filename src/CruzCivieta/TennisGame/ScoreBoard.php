<?php


namespace CruzCivieta\TennisGame;


class ScoreBoard
{
    const DEUCE = "Deuce";
    const DEUCE_SCORES = [
        0 => 'Love-All',
        1 => 'Fifteen-All',
        2 => 'Thirty-All',
    ];

    private $local = 0;
    private $visitor = 0;

    public function pointForLocal()
    {
        $this->local++;
    }

    public function pointForVisitor()
    {
        $this->visitor++;
    }

    public function getScore()
    {
        if ($this->isDeuce()) {
            $score = $this->convertIntoDeuceScore();
        } elseif ($this->hasMoreFourPoint()) {
            $rule = new AdvantageScore();
            $score = $rule->getScore($this->local, $this->visitor);
        } else {
            $rule = new NormalScore();
            $score = $rule->getScore($this->local, $this->visitor);
        }

        return $score;
    }

    /**
     * @return string
     */
    private function convertIntoDeuceScore()
    {
        if (!array_key_exists($this->local, static::DEUCE_SCORES)) {
            return static::DEUCE;
        }

        return static::DEUCE_SCORES[$this->local];
    }

    /**
     * @return bool
     */
    private function isDeuce()
    {
        return $this->local == $this->visitor;
    }

    /**
     * @return bool
     */
    private function hasMoreFourPoint()
    {
        return $this->local >= 4 || $this->visitor >= 4;
    }

}