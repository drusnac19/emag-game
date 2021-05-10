<?php


namespace App\Game;


class Attack
{
    protected $attacker;

    protected $defender;

    public function __construct($attacker, $defender)
    {
        $this->attacker = $attacker;

        $this->defender = $defender;
    }

    public function run()
    {
        $attacker = $this->attacker;

        $defender = $this->defender;

        //before attack
        $health = $defender->getHealth();

        //The damage done by the attacker is calculated with the following formula
        $damage = $attacker->getStrength() - $defender->getDefence();

        //The damage is subtracted from the defender’s health.
        $defender->damage($damage);

        $score = [
            'attacker' => $attacker->getName(),
            'defender' => $defender->getName(),
//            'skills_used' => [],
            'damage_done' => $damage,
            'defender_healt_has' => $health,
            'defender_healt_left' => $defender->getHealth(),
        ];

        return $score;
    }

}