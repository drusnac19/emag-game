<?php

namespace App\Character;


use App\Contracts\CharacterSkill;

class Character
{
    //about
    protected $name;

    //stats
    protected $health;
    protected $strength;
    protected $defence;
    protected $speed;
    protected $luck;

    //skills
    protected $skills = [];


    public function __construct()
    {

    }

    /*
    |--------------------------------------------------------------------------
    | Skills
    |--------------------------------------------------------------------------
    |
    */

    public function setSkill($skill)
    {
        if ($skill instanceof CharacterSkill)
        {
            if (in_array($skill, $this->skills) == false)
            {
                $this->skills[] = $skill;
            }

        } else
        {
            throw new \Exception(__FUNCTION__ . 'expected paramter to be an instance of ' . CharacterSkill::class . ', but' . gettype($skill) . ' given');
        }

    }


    /*
    |--------------------------------------------------------------------------
    | About
    |--------------------------------------------------------------------------
    |
    */

    public function damage($value)
    {
        $this->health = $this->health - $value;

        $this->health = ($this->health < 0) ? 0 : $this->health;
    }

    /*
    |--------------------------------------------------------------------------
    | About
    |--------------------------------------------------------------------------
    |
    */

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Stats
    |--------------------------------------------------------------------------
    |
    */

    public function getHealth()
    {
        return $this->health;
    }

    public function getStrength()
    {
        return $this->strength;
    }

    public function getDefence()
    {
        return $this->defence;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function getLuck()
    {
        return $this->luck;
    }


    public function setHealth($value)
    {
        $this->health = $this->getRandomValueBetween($value);

        return $this;
    }

    public function setStrength($value)
    {
        $this->strength = $this->getRandomValueBetween($value);

        return $this;
    }

    public function setDefence($value)
    {
        $this->defence = $this->getRandomValueBetween($value);

        return $this;
    }

    public function setSpeed($value)
    {
        $this->speed = $this->getRandomValueBetween($value);

        return $this;
    }

    public function setLuck($value)
    {
        $this->luck = $this->getRandomValueBetween($value);

        return $this;
    }

    protected function getRandomValueBetween($interval)
    {
        if (is_array($interval))
        {
            $interval = array_map('intval', $interval);

            return rand(array_shift($interval), array_pop($interval));
        }

        return intval($interval);
    }

}