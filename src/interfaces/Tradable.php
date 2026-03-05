<?php

namespace App\interfaces;

use App\Trainer;

Interface Tradable {
    public function trade(Trainer $newTrainer);
}