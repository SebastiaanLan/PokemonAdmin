<?php

namespace App\pokemon;

use App\pokemon\Pokemon;
use App\Move;

class GrassPokemon extends Pokemon {
    private $type = "Grass";

    public function getType() {
        return $this->type;
    }

    // Grass pokemon heals 10 damge per attack done
    public function attack(Pokemon $target, Move $move) {
        $damageTaken = $move->getPower();

        $target->damage($damageTaken);
        $move->use();

        $this->heal(10);

        return $this->trainer->getNaam() . "'s " . $this->naam . " valt " . $target->trainer->getNaam() . "'s " . $target->getNaam() . " aan met " . $move->getNaam() . " voor " . $damageTaken . " schade";
    }
}