<?php


namespace app\models;


class Dice
{

    private $roll;
    const PAIR = 2;
    const THREE_OF_A_KIND = 3;
    const FOUR_OF_A_KIND = 4;
    const SMALL_STRAIGHT = [1, 2, 3, 4, 5];
    const LARGE_STRAIGHT = [2, 3, 4, 5, 6];

    /**
     * Dice constructor.
     * @param array $roll
     */
    public function __construct($roll = [])
    {
        sort($roll);
        $this->roll = $roll;
    }

    /**
     * @return array
     */
    public function retrieveRoll()
    {
        return $this->roll;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->roll);
    }

    /**
     * @return array
     */
    public function retrieveHighestPair()
    {
        return $this->findHighestRepeatedNumber(static::PAIR);
    }

    /**
     * @return array
     */
    public function retrieveHighestThreeOfaKind()
    {
        return $this->findHighestRepeatedNumber(static::THREE_OF_A_KIND);
    }

    /**
     * @return array
     */
    public function retrieveFourOfaKind()
    {
        return $this->findHighestRepeatedNumber(static::FOUR_OF_A_KIND);
    }

    private function findHighestRepeatedNumber($number)
    {
        $reverseRoll = array_reverse($this->roll);
        $differentDices = array_unique($reverseRoll);

        if (count($differentDices) === 6) {
            return [];
        }

        foreach ($differentDices as $dice) {
            $equalsDices = $this->findEqualsDicesBy($reverseRoll, $dice);

            if (count($equalsDices) === $number) {
                return $equalsDices;
            }
        }

        return [];
    }

    /**
     * @param $reverseRoll
     * @param $dice
     * @return array
     */
    private function findEqualsDicesBy($reverseRoll, $dice)
    {
        return array_filter($reverseRoll, function ($element) use ($dice) {
            return $element === $dice;
        });
    }

    /**
     * @return array
     */
    public function retrieveDicesOfNumber($number)
    {
        return array_filter($this->roll, function ($dice) use ($number) {
            return $dice === $number;
        });
    }

    /**
     * @return bool
     */
    public function isSmallStraight()
    {
        $dices = $this->retrieveFirstFiveDifferentDices();

        return $dices === static::SMALL_STRAIGHT;
    }

    /**
     * @return bool
     */
    public function isLargeStraight()
    {
        return $this->retrieveFirstFiveDifferentDices() === static::LARGE_STRAIGHT;
    }

    /**
     * @return array
     */
    private function retrieveFirstFiveDifferentDices()
    {
        $differentDices = array_unique($this->roll);

        return array_slice($differentDices, 0, 5);
    }

    public function retrieveFullHouse()
    {
        $pair = $this->retrieveHighestPair();
        $three = $this->retrieveHighestThreeOfaKind();
        $fullHouse = array_merge([], $pair, $three);

        return count($fullHouse) === 5 ? $fullHouse : [];
    }
}