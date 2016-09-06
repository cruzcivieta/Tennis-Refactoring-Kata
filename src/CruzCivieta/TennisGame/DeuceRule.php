<?php


namespace CruzCivieta\TennisGame;


class DeuceRule implements ScoreRule
{
    const DEFAULT_SCORE = "Deuce";
    const DEUCE_SCORES = [
        0 => 'Love-All',
        1 => 'Fifteen-All',
        2 => 'Thirty-All',
    ];

    /**
     * @param $localPoint int
     * @param $visitorPoint int
     * @return bool
     */
    public function isSupport($localPoint, $visitorPoint)
    {
        return $localPoint === $visitorPoint;
    }

    /**
     * @param $localPoint int
     * @param $visitorPoint int
     * @return string
     */
    public function getScore($localPoint, $visitorPoint)
    {
        if (!array_key_exists($localPoint, static::DEUCE_SCORES)) {
            return static::DEFAULT_SCORE;
        }

        return static::DEUCE_SCORES[$localPoint];
    }
}