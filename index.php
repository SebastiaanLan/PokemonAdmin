<?php

require_once "classes/Move.php";
require_once "classes/Trainer.php"; 

require_once "classes/pokemon/FirePokemon.php";
require_once "classes/pokemon/WaterPokemon.php";
require_once "classes/pokemon/GrassPokemon.php";
require_once "classes/pokemon/FlyingPokemon.php";

$moveTemplates = [
    "tackle" => ["Tackle", "Normal", 35, 40],
    "ember" => ["Ember", "Fire", 40, 25],
    "bubble" => ["Bubble", "Water", 40, 30],
    "vine_whip" => ["Vine Whip", "Grass", 45, 25],
    "gust" => ["Gust", "Flying", 40, 35],
];

function createMove($newMove) {
    global $moveTemplates;

    [$naam, $type, $power, $pp] = $moveTemplates[$newMove];
    return new Move($naam, $type, $power, $pp);
}

$pokemonTemplates = [
    "charmander" => ["Charmander", 5, 100, ["tackle", "ember"]],
    "squirtle" => ["Squirtle", 5, 100, ["tackle", "bubble"]],
    "bulbasaur" => ["Bulbasaur", 5, 100, ["tackle", "vine_whip"]],
    "rookidee" => ["Rookidee", 5, 100, ["tackle", "gust"]],
];

function createPokemon($name) {
    global $pokemonTemplates;

    [$naam, $level, $hp, $moveKeys] = $pokemonTemplates[$name];

    $pokemon = new FirePokemon($naam, $level, $hp);

    foreach ($moveKeys as $moveKey) {
        $pokemon->addMove(createMove($moveKey));
    }

    return $pokemon;
}

$trainers = [
    "red" => new Trainer("Red", 0),
    "gary" => new Trainer("Gary", 0),
];

$trainers['red']->addPokemon(createPokemon("charmander"));
$trainers['red']->addPokemon(createPokemon("rookidee"));

$trainers['gary']->addPokemon(createPokemon("squirtle"));
$trainers['gary']->addPokemon(createPokemon("bulbasaur"));

include "templates/template.php";
?>