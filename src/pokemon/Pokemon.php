<?php

namespace App\pokemon;

use App\interfaces\Tradable;
use App\interfaces\Evolvable;
use App\Trainer;
use App\Move;

abstract class Pokemon implements Tradable, Evolvable {
    protected $naam;
    protected $level;
    protected $hp;
    protected $maxHP;
    protected $moves;
    protected ?Trainer $trainer;
    protected ?string $evolutionName; 

    public function __construct($naam, $level, $hp, ?string $evolutionName = null) {
        $this->naam = $naam;
        $this->level = $level;
        $this->hp = $hp;
        $this->maxHP = $hp;
        $this->moves = [];
        $this->trainer = null;
        $this->evolutionName = $evolutionName;
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

    public function evolve() {
        global $pokemonTemplates;

        if ($this->evolutionName === null) {
            return $this->naam . " kan niet evolueren!";
        }

        $template = $pokemonTemplates[$this->evolutionName];
        [$naam, $class, $requiredLevel, $hp, $moveKeys] = $template;

        if ($this->level < $requiredLevel) {
            return $this->naam . " is nog niet sterk genoeg om te evolueren!";
        }

        $this->naam = $naam;
        $this->hp = $hp;
        $this->maxHP = $hp;
        $this->moves = [];

        foreach ($moveKeys as $moveKey) {
            $this->addMove(createMove($moveKey));
        }

        $this->evolutionName = $template[5] ?? null;

        return $this->trainer->getNaam() . "'s Pokemon evolueert naar " . $this->naam . "!";
    }
}