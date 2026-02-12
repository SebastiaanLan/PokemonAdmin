<?php

require_once __DIR__ . '/vendor/autoload.php';

use classes\Move;
use classes\Trainer;

use classes\pokemon\FirePokemon;
use classes\pokemon\FlyPokemon;
use classes\pokemon\GrassPokemon;
use classes\pokemon\WaterPokemon;

$moveTemplates = [
    "tackle" => ["Tackle", "Normal", 35, 40],
    "ember" => ["Ember", "Fire", 40, 25],
    "flamethrower" => ["Flamethrower", "Fire", 90, 15],
    "bubble" => ["Bubble", "Water", 40, 30],
    "vine_whip" => ["Vine Whip", "Grass", 45, 25],
    "gust" => ["Gust", "Flying", 40, 35],
    "dragon_breath" => ["Dragon Breath", "Dragon", 60, 20],
];

function createMove($newMove) {
    global $moveTemplates;

    [$naam, $type, $power, $pp] = $moveTemplates[$newMove];
    return new Move($naam, $type, $power, $pp);
}

$pokemonTemplates = [
    "charmander" => ["Charmander", FirePokemon::class, 5, 100, ["tackle", "ember"], "charmeleon"],
    "charmeleon" => ["Charmeleon", FirePokemon::class, 16, 200, ["tackle", "ember", "dragon_breath"],],
    "charizard" => ["Charizard", FirePokemon::class, 36, 300, ["tackle", "ember", "dragon_breath", "flamethrower"]],
    "psyduck" => ["Psyduck", WaterPokemon::class, 15, 100, ["tackle", "bubble"]],
    "pidgey" => ["Pidgey", FlyPokemon::class, 5, 100, ["tackle", "gust"]],
    "squirtle" => ["Squirtle", WaterPokemon::class, 5, 100, ["tackle", "bubble"]],
    "bulbasaur" => ["Bulbasaur", GrassPokemon::class, 5, 100, ["tackle", "vine_whip"]],
    "growlithe" => ["Growlithe", FirePokemon::class, 5, 100, ["tackle", "ember"]],
];

function createPokemon($name) {
    global $pokemonTemplates;

    [$naam, $class, $level, $hp, $moveKeys] = $pokemonTemplates[$name];

    $pokemon = new $class($naam, $level, $hp);

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
$trainers['red']->addPokemon(createPokemon("pidgey"));
$trainers['red']->addPokemon(createPokemon("psyduck"));

$trainers['gary']->addPokemon(createPokemon("squirtle"));
$trainers['gary']->addPokemon(createPokemon("bulbasaur"));
$trainers['gary']->addPokemon(createPokemon("growlithe"));

include "templates/template.php";
?>