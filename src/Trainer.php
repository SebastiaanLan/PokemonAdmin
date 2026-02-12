<?php

namespace classes;

use classes\pokemon\Pokemon;

class Trainer {
    private $naam;
    private $badges;
    private $pokemons;

    public function __construct($naam, $badges) {
        $this->naam = $naam;
        $this->badges = $badges;
    }

    // Getters
    public function getNaam() {
        return $this->naam;
    }
    
    public function getBadges() {
        return $this->badges;
    }

    public function getPokemons() {
        return $this->pokemons;
    }

    // Setters
    public function setBadges($badges) {
        if ($badges >= 0 && $badges <= 8) {
            $this->badges = $badges;
        } else {
            return "<strong>ERROR:</strong> badges moeten tussen de 0 en 8 zijn (gegeven: " . $badges . ")";
        }
    }

    // Methods
    public function addPokemon(Pokemon $pokemon) {
        $this->pokemons[] = $pokemon;
        $pokemon->setTrainer($this);
    }

    public function removePokemon(Pokemon $pokemon) {
        $index = array_search($pokemon, $this->pokemons, true);

        if ($index !== false) {
            array_splice($this->pokemons, $index, 1);
            $pokemon->setTrainer(null);
            return true;
        } else {
            return false;
        }
    }

    public function earnBadge() {
        $this->setBadges($this->getBadges() + 1);

        return $this->naam . " heeft een badge verdient en heeft er nu " . $this->badges;
    }

    public function tradeAll($newTrainer) {
        foreach($this->pokemons as $pokemon) {
            $pokemon->trade($newTrainer);
        }

        return $this->naam . " heeft al zijn pokemons gegeven aan " . $newTrainer->getNaam();
    }
}