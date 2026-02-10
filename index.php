<?php

require_once "classes/Move.php";
require_once "classes/Pokemon.php";
require_once "classes/Trainer.php";

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

include "templates/template.php";
?>