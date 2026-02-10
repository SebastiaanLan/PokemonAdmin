<?php

require_once "Pokemon.php";

class GrassPokemon extends Pokemon {
    private $type = "Grass";

    public function getType() {
        return $this->type;
    }
}