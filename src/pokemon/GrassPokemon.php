<?php

namespace classes\pokemon;

use classes\pokemon\Pokemon;

class GrassPokemon extends Pokemon {
    private $type = "Grass";

    public function getType() {
        return $this->type;
    }
}