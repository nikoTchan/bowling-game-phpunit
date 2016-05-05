<?php
namespace Bowling;

class Game
{

    private $score;

    /**
     * Game constructor.
     */
    public function __construct()
    {
    }

    public function roll($int)
    {
        $this->score += $int;
    }

    public function score()
    {
        return $this->score;
    }
}