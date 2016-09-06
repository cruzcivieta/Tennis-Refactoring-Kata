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
        $rule = current(array_filter($this->scoreRules, function($rule) {
            return $rule->isSupport($this->local, $this->visitor);
        }));

        return $rule->getScore($this->local, $this->visitor);
    }

}