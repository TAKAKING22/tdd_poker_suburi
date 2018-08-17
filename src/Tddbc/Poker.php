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
        if (self::isRoyalStraightFlash($hand)) {
            return "Royal Straight Flash";
        }
        if (self::isStraightFlash($hand)) {
            return "Straight Flash";
        }
        if (self::isFourCards($hand)) {
            return "Four Cards";
        }
        if (self::isFullHouse($hand)) {
            return "Full House";
        }
        if (self::isFlash($hand)) {
            return "Flash";
        }
        if (self::isStraight($hand)) {
            return "Straight";
        }
        if (self::isThreeCards($hand)) {
            return "Three Cards";
        }
        if (self::isTwoPair($hand)) {
            return "Two Pair";
        }
        if (self::isOnePair($hand)) {
            return "One Pair";
        }

        return "High Card";
    }

    private static function isRoyalStraightFlash($hand)
    {
        $ranks = [];
        foreach ($hand as $card) {
            $rank = $card % 13;
            $ranks[] = $rank;
        }
        sort($ranks);

        $royal_straight = [0, 9, 10, 11, 12];
        if ($royal_straight == $ranks && self::isFlash($hand)) {
            return true;
        }        
    }

    private static function isStraightFlash($hand)
    {
        return (self::isStraight($hand) && self::isFlash($hand));
    }

    private static function isFourCards($hand)
    {
        $rank_counts = [];
        foreach ($hand as $card) {
            $rank = $card % 13;
            if (isset($rank_counts[$rank])) {
                $rank_counts[$rank]++;
            } else {
                $rank_counts[$rank] = 1; 
            }
        }

        $max_count = 0;
        foreach ($rank_counts as $rank_count) {
            if ($rank_count > $max_count) {
                $max_count = $rank_count;
            }
        }
        if ($max_count == 4) {
            return true;
        }

        return false;
    }

    private static function isFullHouse($hand)
    {
        return (self::isThreeCards($hand) && self::isOnePair($hand));
    }

    private static function isFlash($hand)
    {
        $marks = [];
        foreach ($hand as $card) {
            $mark = (int)($card / 13);
            $marks[] = $mark;
        }

        for ($i = 0; $i < count($marks) - 1; $i++) {
            if ($marks[$i + 1] != $marks[$i]) {
                return false;
            } 
        }

        return true;
    }

    private static function isStraight($hand)
    {
        $ranks = [];
        foreach ($hand as $card) {
            $rank = $card % 13;
            $ranks[] = $rank;
        }
        sort($ranks);

        $royal_straight = [0, 9, 10, 11, 12];
        if ($royal_straight == $ranks) {
            return true;
        }
        for ($i = 0; $i < (count($ranks) - 1); $i++) {
            if ($ranks[$i + 1] - $ranks[$i] != 1) {
                return false;
            }
        }

        return true;
    }

    private static function isThreeCards($hand)
    {
        $rank_counts = [];
        foreach ($hand as $card) {
            $rank = $card % 13;
            if (isset($rank_counts[$rank])) {
                $rank_counts[$rank]++;
            } else {
                $rank_counts[$rank] = 1; 
            }
        }

        $max_count = 0;
        foreach ($rank_counts as $rank_count) {
            if ($rank_count > $max_count) {
                $max_count = $rank_count;
            }
        }
        if ($max_count == 3) {
            return true;
        }

        return false;
    }

    private static function isTwoPair($hand)
    {
        $rank_counts = [];
        foreach ($hand as $card) {
            $rank = $card % 13;
            if (isset($rank_counts[$rank])) {
                $rank_counts[$rank]++;
            } else {
                $rank_counts[$rank] = 1; 
            }
        }

        $pair_count = 0;
        foreach ($rank_counts as $rank_count) {
            if ($rank_count == 2) {
                $pair_count++;
            }
        }

        if ($pair_count == 2) {
            return true;
        }
        return false;
    }

    private static function isOnePair($hand)
    {
        $rank_counts = [];
        foreach ($hand as $card) {
            $rank = $card % 13;
            if (isset($rank_counts[$rank])) {
                $rank_counts[$rank]++;
            } else {
                $rank_counts[$rank] = 1; 
            }
        }

        $pair_count = 0;
        foreach ($rank_counts as $rank_count) {
            if ($rank_count == 2) {
                $pair_count++;
            }
        }

        if ($pair_count == 1) {
            return true;
        }
        return false;
    }
}
