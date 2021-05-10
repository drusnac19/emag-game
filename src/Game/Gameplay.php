<?php


namespace App\Game;


//characters
use App\Character\Character;
use App\Character\Skill\MagicShieldSkill;
use App\Character\Skill\RapidStrikeSkill;

use App\Game\Score;
use App\Game\Attack;


class Gameplay
{
    protected $score;

    protected $hero;
    protected $enemy;

    public function __construct()
    {
        $this->addHero();
        $this->addEnemy();

        $hero = $this->hero;
        $enemy = $this->enemy;

        $i = 0;

        $score = $this->getScoreInstance();

        while ($hero->getHealth() >= 0 && $i++ <= 3)
        {
            $attack = (new Attack($hero, $enemy))->run();

            $score->add($attack);

        }

        echo '<pre>', print_r($score->get()), '</pre>';

    }


    public function addHero()
    {
        //create Orderus
        $orderus = new Character();

        $orderus->setName('Orderus');

        $orderus->setHealth([70, 100]);
        $orderus->setStrength([70, 80]);
        $orderus->setDefence([45, 55]);
        $orderus->setSpeed([40, 50]);
        $orderus->setLuck([10, 30]);

        $orderus->setSkill(new MagicShieldSkill);
        $orderus->setSkill(new RapidStrikeSkill);

        return $this->hero = $orderus;
    }

    public function addEnemy()
    {
        //create Wild Beast
        $enemy = new Character();

        $enemy->setName('Wild beast');

        $enemy->setHealth([60, 90]);
        $enemy->setStrength([60, 90]);
        $enemy->setDefence([40, 60]);
        $enemy->setSpeed([40, 60]);
        $enemy->setLuck([25, 40]);

        return $this->enemy = $enemy;
    }

    protected function getScoreInstance()
    {
        return $this->score = is_null($this->score) ? new Score() : $this->score;
    }


}