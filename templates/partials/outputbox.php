<div class="outputBox">
    <ul>
        <li><?= $trainers['gary']->getPokemons()[0]->attack($trainers['red']->getPokemons()[0], $trainers['gary']->getPokemons()[0]->getMoves()[0]) ?></li>
        <li><?= $trainers['gary']->getPokemons()[0]->levelUp() ?></li>
        <li><?= $trainers['red']->getPokemons()[0]->heal(20) ?></li>
        <li><?= $trainers['gary']->earnBadge() ?></li>
        <li><?= $trainers['gary']->getPokemons()[1]->setHP(-100) ?></li>
        <li><?= $trainers['red']->getPokemons()[1]->setLevel(200) ?></li>
        <li><?= $trainers['red']->setBadges(20) ?></li>
        <li><?= $trainers['red']->getPokemons()[1]->trade($trainers['gary']) ?></li>
        <li><?= $trainers['gary']->getPokemons()[1]->trade($trainers['red']) ?></li>
        <li><?= $trainers['gary']->getPokemons()[2]->fly() ?></li>
        <li><?= $trainers['red']->getPokemons()[1]->swim() ?></li>
    </ul>
</div>