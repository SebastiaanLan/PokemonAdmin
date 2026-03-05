<?php

namespace App\pokemon;

use App\pokemon\Pokemon;
use App\interfaces\Flyable;

class FlyPokemon extends Pokemon implements Flyable{
    private $type = "Flying";

    public function getType() {
        return $this->type;
    }

    public function fly() {
        return $this->trainer->getNaam() . "'s " . $this->naam . " vliegt";
    }
}