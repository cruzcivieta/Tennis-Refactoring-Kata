<?php


namespace CruzCivieta\TennisGame;


class NormalScore implements ScoreRule
{
    const POINT_RULES = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Forty',
    ];

    /**
     * @param $localPoint int
     * @param $visitorPoint int
     * @return bool
     */
    public function isSupport($localPoint, $visitorPoint)
    {
        return true;
    }

    /**
     * @param $localPoint int
     * @param $visitorPoint int
     * @return string
     */
    public function getScore($localPoint, $visitorPoint)
    {
        return $this->format(
            $this->getPoints($localPoint),
            $this->getPoints($visitorPoint)
        );
    }

    /**
     * @param $tempScore
     * @return string
     */
    private function getPoints($tempScore)
    {
        return static::POINT_RULES[$tempScore];
    }

    /**
     * @param $scorePlayerOne
     * @param $scorePlayerTwo
     * @return string
     */
    private function format($scorePlayerOne, $scorePlayerTwo)
    {
        return $scorePlayerOne . '-' . $scorePlayerTwo;
    }
}