<?php

Interface Tradeable {
    public function trade(Trainer $newTrainer);
}

Interface Evolvable {
    public function evolve();
    public function canEvolve();
}
