<?php

Interface Tradeable {
    public function trade(Trainer $newTrainer);
}

Interface Evolvable {
    public function evolve();
    public function canEvolve();
}

Interface Flyable {
    public function fly();
}

Interface Swimable {
    public function swim();
}