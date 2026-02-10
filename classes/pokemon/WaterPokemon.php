<?php

require_once "Pokemon.php";

class WaterPokemon extends Pokemon {
    private $type = "Water";

    public function getType() {
        return $this->type;
    }
}