<?php

require_once "Pokemon.php";

class FlyingPokemon extends Pokemon {
    private $type = "Flying";

    public function getType() {
        return $this->type;
    }
}