<?php

namespace App\pokemon;

use App\pokemon\Pokemon;
use App\Move;

class FirePokemon extends Pokemon {
    private $type = "Fire";

    public function getType() {
        return $this->type;
    }

    // Fire pokemon do 10 more damage
    public function attack(Pokemon $target, Move $move) {
        $damageTaken = $move->getPower() + 10;

        $target->damage($damageTaken);
        $move->use();

        return $this->trainer->getNaam() . "'s " . $this->naam . " valt " . $target->trainer->getNaam() . "'s " . $target->getNaam() . " aan met " . $move->getNaam() . " voor " . $damageTaken . " schade";
    }
}