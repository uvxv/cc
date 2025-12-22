<?php

namespace App\Livewire;

use App\Models\Penalty;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class PenaltyPanel extends Component
{
    use WithPagination;
    public function render()
    {
        $penalties = Penalty::where('user_id', Auth::id());
        return view('livewire.penalty-panel', ['penalties' => $penalties->paginate(2)]);
    }
}
