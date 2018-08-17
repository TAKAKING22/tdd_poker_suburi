<?php
namespace Tddbc;

class Deck
{
    public $deck;

    public function __construct()
    {
        $this->deck = $this->shuffle();
    }

    /**
     * shuffle
     *
     * @return array
     */
    public function shuffle()
    {
        $cards = [];
        for ($i = 1; $i < 53; $i++) {
           $cards[] = $i;
        }

        shuffle($cards);
        return $cards;
    }

    /**
     * draw
     *
     * @return array
     */
    public function draw()
    {
        $hand = [];
        for ($i = 0; $i < 5; $i++) {
            $hand[] = array_pop($this->deck);
        }
        return $hand;
    }
}
