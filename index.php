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

    // Methods
    public function use() {
        $this->pp--;
    }
}


class Pokemon {
    private $naam;
    private $type;
    private $level;
    private $hp;
    private $ability;
    public $moves;

    public function __construct($naam, $type, $level, $hp, $ability) {
        $this->naam = $naam;
        $this->type = $type;
        $this->level = $level;
        $this->hp = $hp;
        $this->ability = $ability;
        $this->moves = [];
    }

    // Getters
    public function getNaam() {
        return $this->naam;
    }

    public function getType() {
        return $this->type;
    }

    public function getLevel() {
        return $this->level;
    }

    public function getHP() {
        return $this->hp;
    }

    public function getAbility() {
        return $this->ability;
    }

    // Setters
    public function setLevel($level) {
        if ($level >= 1 && $level <= 100) {
            $this->level = $level;
        }
    }

    public function setHP($hp) {
        if ($hp >= 0) {
            $this->hp = $hp;
        }
    }

    // Methods
    public function addMove(Move $move) {
        $this->moves[] = $move;
    }

    public function attack(Pokemon $target, Move $move) {
        $target->damage($move->getPower());
        $move->use();
    }

    public function heal($amount) {
        $this->hp += $amount;
    }

    public function damage($amount) {
        $this->hp -= $amount;
    }

    public function levelUp() {
        $this->level++;
    }

    public function showMoves() {
        $stringMoves = "";
        
        foreach($this->moves as $move) { 
            $stringMoves .= $move->getNaam() . ", ";
        }

        return substr($stringMoves, 0, -2);
    }
}

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
        }
    }

    // Methods
    public function addPokemon(Pokemon $pokemon) {
        $this->pokemons[] = $pokemon;
    }

    public function earnBadge() {
        $this->badges++;
    }

    public function showTeam() {
        $stringPokemons = "";
        
        foreach($this->pokemons as $pokemon) { 
            $stringPokemons .= $pokemon->getNaam() . ", ";
        }

        return substr($stringPokemons, 0, -2);
    }
}

$moveTemplates = [
    "tackle" => ["Tackle", "Normal", 35, 40],
    "ember" => ["Ember", "Fire", 40, 25],
    "bubble" => ["Bubble", "Water", 40, 30],
    "vine_whip" => ["Vine Whip", "Grass", 45, 25],
    "thunder_shock" => ["Thunder Shock", "Electric", 40, 30],
];

function createMove($newMove) {
    global $moveTemplates;

    [$naam, $type, $power, $pp] = $moveTemplates[$newMove];
    return new Move($naam, $type, $power, $pp);
}

$pokemonTemplates = [
    "charmander" => ["Charmander", "Fire", 5, 100, "Blaze", ["tackle", "ember"]],
    "squirtle" => ["Squirtle", "Water", 5, 100, "Torrent", ["tackle", "bubble"]],
    "bulbasaur" => ["Bulbasaur", "Grass", 5, 100, "Overgrow", ["tackle", "vine_whip"]],
    "pikachu" => ["Pikachu", "Electric", 5, 100, "Static", ["tackle", "thunder_shock"]],
];

function createPokemon($name) {
    global $pokemonTemplates;

    [$naam, $type, $level, $hp, $ability, $moveKeys] = $pokemonTemplates[$name];

    $pokemon = new Pokemon($naam, $type, $level, $hp, $ability);

    foreach ($moveKeys as $moveKey) {
        $pokemon->addMove(createMove($moveKey));
    }

    return $pokemon;
}

$trainers = [
    "red" => new Trainer("Red", "Vuur-types", 0),
    "gary" => new Trainer("Gary", "Water-types", 0),
];

$trainers['red']->addPokemon(createPokemon("charmander"));
$trainers['red']->addPokemon(createPokemon("pikachu"));

$trainers['gary']->addPokemon(createPokemon("squirtle"));
$trainers['gary']->addPokemon(createPokemon("bulbasaur"));

$trainers['gary']->pokemons[0]->attack($trainers['red']->pokemons[0], $trainers['gary']->pokemons[0]->moves[0]);

include "template.php";
?>