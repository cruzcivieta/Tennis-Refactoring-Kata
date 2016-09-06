<?php


namespace CruzCivieta\TennisGame;


class ScoreBoard
{
    private $local = 0;
    private $visitor = 0;

    /**
     * @var ScoreRule[]
     */
    private $scoreRules;

    /**
     * ScoreBoard constructor.
     */
    public function __construct()
    {
        $this->scoreRules = [
            new DeuceScore(),
            new AdvantageScore(),
            new NormalScore(),
        ];
    }


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
        return $this->findRule()->getScore($this->local, $this->visitor);
    }

    /**
     * @return mixed
     */
    private function findRule()
    {
        return current(array_filter($this->scoreRules, function (ScoreRule $rule) {
            return $rule->isSupport($this->local, $this->visitor);
        }));
    }

}