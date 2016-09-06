<?php


namespace CruzCivieta\TennisGame;


interface ScoreRule
{
    /**
     * @param $localPoint int
     * @param $visitorPoint int
     * @return bool
     */
    public function isSupport($localPoint, $visitorPoint);

    /**
     * @param $localPoint int
     * @param $visitorPoint int
     * @return string
     */
    public function getScore($localPoint, $visitorPoint);
}