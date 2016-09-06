<?php


namespace CruzCivieta\TennisGame;


class AdvantageScore implements ScoreRule
{
    /**
     * @param $localPoint int
     * @param $visitorPoint int
     * @return bool
     */
    public function isSupport($localPoint, $visitorPoint)
    {
        return $localPoint >= 4 || $visitorPoint >= 4;
    }

    /**
     * @param $localPoint int
     * @param $visitorPoint int
     * @return string
     */
    public function getScore($localPoint, $visitorPoint)
    {
        $minusResult = $localPoint - $visitorPoint;

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
}