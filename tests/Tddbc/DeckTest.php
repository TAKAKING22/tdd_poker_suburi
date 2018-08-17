<?php
namespace Tddbc;

use PHPUnit\Framework\TestCase;
use Tddbc\Deck;

class DeckTest extends TestCase
{
    /**
     * @var deck
     */
    private $deck;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->deck = new Deck();
    }

    /**
     * @test
     */
    public function shuffle()
    {
        $this->assertCount(52, $this->deck->shuffle());
    }

    /**
     * @test
     */
    public function draw()
    {
        $this->assertCount(5, $this->deck->draw());
    }
}
