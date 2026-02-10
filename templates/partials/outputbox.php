<div class="outputBox">
    <ul>
        <li><?= $trainers['gary']->pokemons[0]->attack($trainers['red']->pokemons[0], $trainers['gary']->pokemons[0]->moves[0]) ?></li>
        <li><?= $trainers['gary']->pokemons[0]->levelUp() ?></li>
        <li><?= $trainers['red']->pokemons[0]->heal(20) ?></li>
        <li><?= $trainers['gary']->earnBadge() ?></li>
        <li><?= $trainers['gary']->pokemons[1]->setHP(-100) ?></li>
        <li><?= $trainers['red']->pokemons[1]->setLevel(200) ?></li>
        <li><?= $trainers['red']->setBadges(20) ?></li>
    </ul>
</div>