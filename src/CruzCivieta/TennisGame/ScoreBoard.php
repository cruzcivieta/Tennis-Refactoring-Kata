<?php


namespace CruzCivieta\TennisGame;


class ScoreBoard
{
    private $local = 0;
    private $visitor = 0;

    /**
     * @var ScoreCollection
     */
    private $scoreRules;

    /**
     * ScoreBoard constructor.
     */
    public function __construct()
    {
        $this->scoreRules = new TennisScoreCollection();
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
        $rule = $this->scoreRules
            ->findRule($this->local, $this->visitor);

        return $rule->getScore($this->local, $this->visitor);
    }
}