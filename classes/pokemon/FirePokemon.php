<?php

require_once "Pokemon.php";
require_once "Interfaces.php";

class FirePokemon extends Pokemon implements Evolvable{
    private $type = "Fire";

    public function getType() {
        return $this->type;
    }

    public function evolve() {

    }

    public function canEvolve() {
        
    }
}