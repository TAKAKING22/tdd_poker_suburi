<?php
namespace Tddbc;
use Tddbc\Deck;

class Poker
{
    /**
     * play
     *
     * @return string
     */
    public function play()
    {
        $deck = new Deck();
        $hand = $deck->draw();
        
        return $hand;
    }

    public static function judge($hand)
    {
        return self::isOnePair($hand);
    }
    
    private static function isOnePair($hand)
    {
        $pairs = array();

        foreach ($hand as $card) {
            $rank = $card % 13;

            if (isset($pairs[$rank])) {
                return true;
            } else {
                $pairs[$rank] = 1;
            }
        }

        return false;
    }
}
