<?php
namespace Tddbc;

use PHPUnit\Framework\TestCase;
use Tddbc\Poker;

class PokerTest extends TestCase
{
    /**
     * @var Poker
     */
    private $poker;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->poker = new Poker();
    }

    /**
     * @test
     */
    public function play()
    {
        $this->assertCount(5, $this->poker->play());
    }

    /**
     * @test
     */
    public function judge()
    {
        $hand = [
            (0 * 13 + 1),
            (1 * 13 + 4),
            (2 * 13 + 5),
            (2 * 13 + 8),
            (3 * 13 + 12)
        ];
        $this->assertEquals("High Card", Poker::judge($hand));

        $hand = [
            (0 * 13 + 0),
            (1 * 13 + 0),
            (2 * 13 + 2),
            (2 * 13 + 3),
            (3 * 13 + 4)
        ];
        $this->assertEquals("One Pair", Poker::judge($hand));

        $hand = [
            (0 * 13 + 1),
            (1 * 13 + 1),
            (2 * 13 + 2),
            (3 * 13 + 2),
            (3 * 13 + 4)
        ];
        $this->assertEquals("Two Pair", Poker::judge($hand));

        $hand = [
            (0 * 13 + 1),
            (1 * 13 + 1),
            (2 * 13 + 1),
            (2 * 13 + 2),
            (3 * 13 + 3)
        ];
        $this->assertEquals("Three Cards", Poker::judge($hand));

        $hand = [
            (0 * 13 + 4),
            (1 * 13 + 3),
            (2 * 13 + 6),
            (2 * 13 + 7),
            (3 * 13 + 5)
        ];
        $this->assertEquals("Straight", Poker::judge($hand));

        $hand = [
            (0 * 13 + 11),
            (1 * 13 + 0),
            (2 * 13 + 10),
            (2 * 13 + 9),
            (3 * 13 + 12)
        ];
        $this->assertEquals("Straight", Poker::judge($hand));

        $hand = [
            (1 * 13 + 4),
            (1 * 13 + 11),
            (1 * 13 + 5),
            (1 * 13 + 12),
            (1 * 13 + 0)
        ];
        $this->assertEquals("Flash", Poker::judge($hand));

        $hand = [
            (0 * 13 + 0),
            (1 * 13 + 0),
            (2 * 13 + 0),
            (2 * 13 + 12),
            (3 * 13 + 12)
        ];
        $this->assertEquals("Full House", Poker::judge($hand));

        $hand = [
            (0 * 13 + 0),
            (1 * 13 + 0),
            (2 * 13 + 0),
            (2 * 13 + 12),
            (3 * 13 + 0)
        ];
        $this->assertEquals("Four Cards", Poker::judge($hand));

        $hand = [
            (3 * 13 + 4),
            (3 * 13 + 2),
            (3 * 13 + 5),
            (3 * 13 + 1),
            (3 * 13 + 3)
        ];
        $this->assertEquals("Straight Flash", Poker::judge($hand));

        $hand = [
            (3 * 13 + 9),
            (3 * 13 + 10),
            (3 * 13 + 11),
            (3 * 13 + 12),
            (3 * 13 + 0)
        ];
        $this->assertEquals("Royal Straight Flash", Poker::judge($hand));

        $hand = [
            (2 * 13 + 1),
            (3 * 13 + 10),
            (3 * 13 + 11),
            (3 * 13 + 12),
            (3 * 13 + 0)
        ];
        $this->assertEquals("High Card", Poker::judge($hand));

        $hand = [
            (3 * 13 + 8),
            (3 * 13 + 9),
            (3 * 13 + 10),
            (3 * 13 + 11),
            (3 * 13 + 12)
        ];
        $this->assertEquals("Straight Flash", Poker::judge($hand));
    }
}
