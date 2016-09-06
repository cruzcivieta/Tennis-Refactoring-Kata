<?php


namespace CruzCivieta\TennisGame;


class NormalScore implements ScoreRule
{
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
        $scorePlayerOne = $this->getPoints($localPoint);
        $scorePlayerTwo = $this->getPoints($visitorPoint);

        $score = $scorePlayerOne . '-' . $scorePlayerTwo;

        return $score;
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