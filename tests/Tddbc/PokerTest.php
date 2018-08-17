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
            (1 * 13 + 1),
            (2 * 13 + 2),
            (2 * 13 + 3),
            (3 * 13 + 4)
        ];

        $this->assertEquals(true, Poker::judge($hand));
    }
}
