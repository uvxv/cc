<?php

namespace App\Livewire;

use Livewire\Component;

class ApplyForm extends Component
{
    public function render()
    {
        return view('livewire.apply-form')
            ->with([
                'title' => 'Apply',
            ]);
    }
}
