<?php


namespace CruzCivieta\TennisGame;


class WinGameScore implements ScoreRule
{

    /**
     * @param $localPoint int
     * @param $visitorPoint int
     * @return bool
     */
    public function isSupport($localPoint, $visitorPoint)
    {
        return $this->gameIsFinished($localPoint, $visitorPoint);
    }

    /**
     * @param $localPoint int
     * @param $visitorPoint int
     * @return string
     */
    public function getScore($localPoint, $visitorPoint)
    {
        $partial = $localPoint - $visitorPoint;

        return $partial > 0 ? "Win for player1" : "Win for player2";
    }

    /**
     * @param $localPoint
     * @param $visitorPoint
     * @return bool
     */
    private function gameIsFinished($localPoint, $visitorPoint)
    {
        return $this->gameMoreFourPoints($localPoint, $visitorPoint)
                    && $this->isTheDifferenceGreaterThanOnePoint($localPoint, $visitorPoint);
    }

    /**
     * @param $localPoint
     * @param $visitorPoint
     * @return bool;
     */
    private function gameMoreFourPoints($localPoint, $visitorPoint)
    {
        return $localPoint >= 4 || $visitorPoint >= 4;
    }

    private function isTheDifferenceGreaterThanOnePoint($localPoint, $visitorPoint)
    {
        $partial = abs($localPoint - $visitorPoint);

        return $partial >= 2;
    }

}