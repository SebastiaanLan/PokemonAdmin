<?php

namespace App\pokemon;

use App\pokemon\Pokemon;
use App\interfaces\Swimable;

class WaterPokemon extends Pokemon implements Swimable{
    private $type = "Water";

    public function getType() {
        return $this->type;
    }

    public function swim() {
        return $this->trainer->getNaam() . "'s " . $this->naam . " zwemt";
    }
}