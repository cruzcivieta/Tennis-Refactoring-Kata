<?php


namespace CruzCivieta\TennisGame;


class TennisScoreCollection implements ScoreCollection
{
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

    public function findRule($localPoints, $visitorPoints)
    {
        return current(array_filter($this->scoreRules, function (ScoreRule $rule) use ($localPoints, $visitorPoints) {
            return $rule->isSupport($localPoints, $visitorPoints);
        }));
    }
}