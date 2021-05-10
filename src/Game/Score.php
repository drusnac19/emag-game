<?php


namespace App\Game;


class Score
{
    protected $snaps = [];

    public function add($attack)
    {
        $this->snaps[] = $attack;
    }

    public function get()
    {
        return $this->snaps;
    }
}