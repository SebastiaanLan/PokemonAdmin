<?php

abstract class Pokemon {
    protected $naam;
    protected $level;
    protected $hp;
    protected $maxHP;
    public $moves;

    public function __construct($naam, $level, $hp) {
        $this->naam = $naam;
        $this->level = $level;
        $this->hp = $hp;
        $this->maxHP = $hp;
        $this->moves = [];
    }

    // Getters
    public function getNaam() {
        return $this->naam;
    }

    public function getLevel() {
        return $this->level;
    }

    public function getHP() {
        return $this->hp;
    }

    public function getMaxHP() {
        return $this->hp;
    }

    // Setters
    public function setLevel($level) {
        if ($level >= 1 && $level <= 100) {
            $this->level = $level;
        } else {
            return "<strong>ERROR:</strong> level moeten tussen de 0 en 100 zijn (gegeven: " . $level . ")";
        }
    }

    public function setHP($hp) {
        if ($hp >= 0 && $hp <= $this->maxHP) {
            $this->hp = $hp;
        }
        return "<strong>ERROR:</strong> HP moet tussen de 0 en " . $this->maxHP . " zijn (gegeven: " . $hp . ")";
    }

    // Methods
    public function addMove(Move $move) {
        $this->moves[] = $move;
    }

    public function attack(Pokemon $target, Move $move) {
        $damageTaken = $move->getPower();

        $target->damage($damageTaken);
        $move->use();

        return $this->naam . " valt " . $target->getNaam() . " aan met " . $move->getNaam() . " voor " . $damageTaken . " schade";
    }

    public function heal($amount) {
        $this->setHP($this->getHP() + $amount);

        return $this->naam . " geneest " . $amount . " schade en heeft nu " . $this->hp . " hp";
    }

    public function damage($amount) {
        $this->setHP($this->getHP() - $amount);
    }

    public function levelUp() {
        $this->setLevel($this->getLevel() + 1);

        return $this->naam . " gaat een level omhoog en is nu level " . $this->level;
    }
}