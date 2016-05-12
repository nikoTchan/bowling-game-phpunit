<?php
namespace Bowling;

class Game
{
    /** @var int[] $rolls  */
    private $rolls = array();
    /** @var int $currentRoll */
    private $currentRoll = 0;

    /**
     * Game constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param int $pins
     */
    public function roll($pins)
    {
        $this->rolls[$this->currentRoll++] = $pins;
    }

    /**
     * @return int
     */
    public function score()
    {
        $score = 0;
        $frameIndex = 0;
        for ($frame = 0; $frame < 10; $frame++) {
            if ($this->isStrike($frameIndex) == 10) {
                $score += 10 + $this->strikeBonus($frameIndex);
                $frameIndex++;
            } elseif ($this->isSpare($frameIndex)) {
                $score += 10 + $this->spareBonus($frameIndex);
                $frameIndex += 2;
            } else {
                $score += $this->sumOfBallsInFrame($frameIndex);
                $frameIndex += 2;
            }
        }

        return $score;
    }

    /**
     * @param int $frameIndex
     *
     * @return int
     */
    private function sumOfBallsInFrame($frameIndex) {
        return $this->rolls[$frameIndex] + $this->rolls[$frameIndex+1];
    }

    /**
     * @param int $frameIndex
     *
     * @return bool
     */
    private function isSpare($frameIndex)
    {
        return ($this->sumOfBallsInFrame($frameIndex) == 10);
    }

    /**
     * @param int $frameIndex
     *
     * @return bool
     */
    private function isStrike($frameIndex)
    {
        return ($this->rolls[$frameIndex] == 10);
    }

    /**
     * Get the spare bonus in the frame.
     *
     * @param int $frameIndex
     *
     * @return int
     */
    private function spareBonus($frameIndex)
    {
        return $this->rolls[$frameIndex+2];
    }

    /**
     * Get the strike bonus in the frame.
     *
     * @param int $frameIndex
     *
     * @return int
     */
    private function strikeBonus($frameIndex)
    {
        return $this->rolls[$frameIndex+1] + $this->rolls[$frameIndex+2];
    }
}