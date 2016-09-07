<?php


namespace CruzCivieta\TennisGame;


class AdvantageScore implements ScoreRule
{
    const ADVANTAGE_PLAYER_1 = "Advantage player1";
    const ADVANTAGE_PLAYER_2 = "Advantage player2";

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
        return $this->isAdvantageForLocalPlayer($localPoint, $visitorPoint)
            ? static::ADVANTAGE_PLAYER_1
            : static::ADVANTAGE_PLAYER_2;
    }

    private function isAdvantageForLocalPlayer($localPoint, $visitorPoint)
    {
        return ($localPoint - $visitorPoint) === 1;
    }
}