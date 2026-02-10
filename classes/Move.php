<?php

class Move {
    private $naam;
    private $type;
    private $power;
    private $pp;

    public function __construct($naam, $type, $power, $pp) {
        $this->naam = $naam;
        $this->type = $type;
        $this->power = $power;
        $this->pp = $pp;
    }

    // Getters
    public function getNaam() {
        return $this->naam;
    }

    public function getType() {
        return $this->type;
    }

    public function getPower() {
        return $this->power;
    }

    public function getPP() {
        return $this->pp;
    }

    // Setters
    public function setPP($pp) {
        $this->pp = $pp;
    }

    // Methods
    public function use() {
        $this->setPP($this->getPP() - 1);
    }
}