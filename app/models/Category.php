<?php


namespace app\models;


class Category
{
    const ONE = 1;
    const CHANCE = 19;
    const YATZY = 20;
    const TWO = 2;
    const THREE = 3;
    const FOUR = 4;
    const FIVE = 5;
    const SIX = 6;
    const PAIRS = 7;
    const THREE_OF_A_KIND = 8;
    const FOUR_OF_A_KIND = 9;
    const SMALL_STRAIGHT = 10;
    const LARGE_STRAIGHT = 11;
    const FULL_HOUSE = 12;


    private $category;

    /**
     * Category constructor.
     * @param $category
     */
    private function __construct($category)
    {
        $this->category = $category;
    }

    public static function random()
    {
        $constants = get_defined_constants();

        return new static($constants[array_rand($constants)]);
    }

    public static function chance()
    {
        return new static(static::CHANCE);
    }

    public static function yatzy()
    {
        return new static(static::YATZY);
    }

    public static function one()
    {
        return new static(static::ONE);
    }

    public static function two()
    {
        return new static(static::TWO);
    }

    public static function three()
    {
        return new static(static::THREE);
    }

    public static function four()
    {
        return new static(static::FOUR);
    }

    public static function five()
    {
        return new static(static::FIVE);
    }

    public static function six()
    {
        return new static(static::SIX);
    }

    public static function pairs()
    {
        return new static(static::PAIRS);
    }

    public static function threeOfaKind()
    {
        return new static(static::THREE_OF_A_KIND);
    }

    public static function fourOfaKind()
    {
        return new static(static::FOUR_OF_A_KIND);
    }

    public static function smallStraight()
    {
        return new static(static::SMALL_STRAIGHT);
    }

    public static function largeStraight()
    {
        return new static(static::LARGE_STRAIGHT);
    }

    public static function fullHouse()
    {
        return new static(static::FULL_HOUSE);
    }

    public function isCategory($category)
    {
        return $this->category == $category;
    }

    public function isOne()
    {
        return $this->isCategory(static::ONE);
    }

    public function isTwo()
    {
        return $this->isCategory(static::TWO);
    }

    public function isThree()
    {
        return $this->isCategory(static::THREE);
    }

    public function isFour()
    {
        return $this->isCategory(static::FOUR);
    }

    public function isFive()
    {
        return $this->isCategory(static::FIVE);
    }

    public function isSix()
    {
        return $this->isCategory(static::SIX);
    }

    public function isYatzy()
    {
        return $this->isCategory(static::yatzy);
    }

    public function isChance()
    {
        return $this->isCategory(static::CHANCE);
    }

    public function isPairCategory()
    {
        return $this->isCategory(static::PAIRS);
    }

    public function isThreeOfaKind()
    {
        return $this->isCategory(static::THREE_OF_A_KIND);
    }

    public function isFourOfaKind()
    {
        return $this->isCategory(static::FOUR_OF_A_KIND);
    }
}