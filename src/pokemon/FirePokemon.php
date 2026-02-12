<?php

namespace classes\pokemon;

use classes\pokemon\Pokemon;

class FirePokemon extends Pokemon {
    private $type = "Fire";

    public function getType() {
        return $this->type;
    }
}