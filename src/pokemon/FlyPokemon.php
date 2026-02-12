<?php

namespace classes\pokemon;

use classes\pokemon\Pokemon;
use classes\interfaces\Flyable;

class FlyPokemon extends Pokemon implements Flyable{
    private $type = "Flying";

    public function getType() {
        return $this->type;
    }

    public function fly() {
        return $this->trainer->getNaam() . "'s " . $this->naam . " vliegt";
    }
}