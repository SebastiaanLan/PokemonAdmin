<!DOCTYPE html>
<html>
<head>
    <title>Pokemon Admin Systeem</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Pokemon Admin Systeem</h1>

<div class="container">
    <?php foreach ($trainers as $trainer): ?>
    <div class="trainer">
        <div class="trainerInfo">
            <h2><?= $trainer->getNaam() ?></h2>

            <ul>
                <li>Specialiteit: <?= $trainer->getSpecialiteit() ?></li>
                <li>Badges: <?= $trainer->getBadges() ?></li>
            </ul>
        </div>

        <div class="team">
            <?php foreach ($trainer->pokemons as $pokemon): ?>
                <div class="pokemon">
                    <h3><?= $pokemon->getNaam() ?></h3>
                    <ul>
                        <li>Type: <?= $pokemon->getType() ?></li>
                        <li>Level: <?= $pokemon->getLevel() ?></li>
                        <li>HP: <?= $pokemon->getHP() ?></li>
                        <li>Ability: <?= $pokemon->getAbility() ?></li>
                    </ul>

                    <div class="moves">
                        <?php foreach ($pokemon->moves as $move): ?>
                            <div class="move">
                                <ul>
                                    <li><strong><?= $move->getNaam() ?></strong></li>
                                    <li>Type: <?= $move->getType() ?></li>
                                    <li>Power: <?= $move->getPower() ?></li>
                                    <li>PP: <?= $move->getPP() ?></li>
                                </ul>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endforeach; ?>
</div>