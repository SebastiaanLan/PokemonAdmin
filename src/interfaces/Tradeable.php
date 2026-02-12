<?php

namespace classes\interfaces;

use classes\Trainer;

Interface Tradeable {
    public function trade(Trainer $newTrainer);
}