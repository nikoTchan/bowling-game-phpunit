<?php

namespace Bowling;

class GameTest extends \PHPUnit_Framework_TestCase
{

    private $game;

    public function testGame()
    {
        $this->rollMany(20, 0);
        $this->assertSame(0, $this->game->score());
    }

    public function testGameAllOnes()
    {

        $this->rollMany(20, 1);
        $this->assertSame(20, $this->game->score());
    }

    /**
     * @return Game
     */
    public function setUp()
    {
        $this->game = new Game();
    }

    /**
     * @param $n
     * @param $pins
     */
    protected function rollMany($n, $pins)
    {
        for ($i = 0; $i < $n; $i++) {
            $this->game->roll($pins);
        }
    }
}
