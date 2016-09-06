<?php


namespace CruzCivieta\TennisGame;


class ScoreBoard
{
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
            $rule = new DeuceRule();
            $score = $rule->getScore($this->local, $this->visitor);
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