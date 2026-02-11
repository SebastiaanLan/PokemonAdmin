<?php

require_once "Pokemon.php";

class FirePokemon extends Pokemon {
    private $type = "Fire";

    public function getType() {
        return $this->type;
    }
}