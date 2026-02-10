<?php

class Trainer {
    private $naam;
    private $specialiteit;
    private $badges;
    public $pokemons;

    public function __construct($naam, $specialiteit, $badges) {
        $this->naam = $naam;
        $this->specialiteit = $specialiteit;
        $this->badges = $badges;
    }

    // Getters
    public function getNaam() {
        return $this->naam;
    }

    public function getSpecialiteit() {
        return $this->specialiteit;
    }

    public function getBadges() {
        return $this->badges;
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
    }

    public function earnBadge() {
        $this->setBadges($this->getBadges() + 1);

        return $this->naam . " heeft een badge verdient en heeft er nu " . $this->badges;
    }
}