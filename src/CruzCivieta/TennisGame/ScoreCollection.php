<?php


namespace CruzCivieta\TennisGame;


interface ScoreCollection
{
    /**
     * @param $localPoints int
     * @param $visitorPoints int
     * @return ScoreRule
     */
    public function findRule($localPoints, $visitorPoints);
}