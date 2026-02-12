<?php

namespace classes\pokemon;

use classes\interfaces\Tradeable;
use classes\Trainer;
use classes\Move;

abstract class Pokemon implements Tradeable {
    protected $naam;
    protected $level;
    protected $hp;
    protected $maxHP;
    protected $moves;
    protected ?Trainer $trainer;

    public function __construct($naam, $level, $hp) {
        $this->naam = $naam;
        $this->level = $level;
        $this->hp = $hp;
        $this->maxHP = $hp;
        $this->moves = [];
        $this->trainer = null;
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

    public function getTrainer() {
        return $this->trainer;
    }

    public function getMoves() {
        return $this->moves;
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

    public function setTrainer(?Trainer $trainer) {
        $this->trainer = $trainer;
    }

    public function setNaam($naam) {
        $this->naam = $naam;
    }

    // Methods
    public function addMove(Move $move) {
        $this->moves[] = $move;
    }

    public function attack(Pokemon $target, Move $move) {
        $damageTaken = $move->getPower();

        $target->damage($damageTaken);
        $move->use();

        return $this->trainer->getNaam() . "'s " . $this->naam . " valt " . $target->trainer->getNaam() . "'s " . $target->getNaam() . " aan met " . $move->getNaam() . " voor " . $damageTaken . " schade";
    }

    public function heal($amount) {
        $this->setHP($this->getHP() + $amount);

        return $this->trainer->getNaam() . "'s " .  $this->naam . " geneest " . $amount . " schade en heeft nu " . $this->hp . " hp";
    }

    public function damage($amount) {
        $this->setHP($this->getHP() - $amount);
    }

    public function levelUp() {
        $this->setLevel($this->getLevel() + 1);

        return $this->trainer->getNaam() . "'s " . $this->naam . " gaat een level omhoog en is nu level " . $this->level;
    }

    // Interface Methods
    public function trade(Trainer $newTrainer) {
        $oldTrainer = $this->trainer;
        $oldTrainer->removePokemon($this);
        $newTrainer->addPokemon($this);

        return $oldTrainer->getNaam() . " heeft zijn " . $this->naam . " geruild met " . $newTrainer->getNaam();
    }
}