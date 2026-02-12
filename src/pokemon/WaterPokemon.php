<?php

namespace classes\pokemon;

use classes\pokemon\Pokemon;
use classes\interfaces\Swimable;

class WaterPokemon extends Pokemon implements Swimable{
    private $type = "Water";

    public function getType() {
        return $this->type;
    }

    public function swim() {
        return $this->trainer->getNaam() . "'s " . $this->naam . " zwemt";
    }
}