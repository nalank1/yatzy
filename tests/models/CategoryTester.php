<?php

use PHPUnit\Framework\TestCase;
require 'app\models\Category.php'; 

class YatzyTest extends TestCase
{
    private $category;

    protected function setUp(): void
    {
        $this->category = new Category();
    }

    public function testIsFive()
    {
        $this->assertTrue($this->category->isFive());
    }

    public function testIsSix()
    {
        $this->assertTrue($this->category->isSix());
    }

    public function testIsYatzy()
    {
        $this->assertTrue($this->category->isYatzy());
    }

    public function testIsChance()
    {
        $this->assertTrue($this->category->isChance());
    }

    public function testIsPairCategory()
    {
        $this->assertTrue($this->category->isPairCategory());
    }

    public function testIsThreeOfaKind()
    {
        $this->assertTrue($this->category->isThreeOfaKind());
    }

    public function testIsFourOfaKind()
    {
        
        $this->assertTrue($this->category->isFourOfaKind());
    }
}
