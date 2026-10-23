<?php

use Livewire\Component;

new class extends Component
{
    //counter
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }
};
