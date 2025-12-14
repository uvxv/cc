<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class ApplyForm extends Component
{

    public $currentStep = 1;
    public $totalSteps = 3;

    
    public $phone;
    public $province;


    protected function rules(){
        return [
            1 => [
                'phone' => ['required', 'integer', 'max:10'],
                'province' => ['required', 'string'],
            ],
            2 => [
                'name' => ['required', 'string', 'min:3'],
                'role' => ['required', 'in:developer,designer,manager'],
                'bio' => ['nullable', 'string', 'max:500'],
            ],
            3 => [
                'terms' => ['accepted'],
            ],
        ];
    }

    public function increaseStep(){
        $this->validate($this->rules()[$this->currentStep]);
        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
        }
    }

    public function decreaseStep(){
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

        // Final Submission
    public function submit(){
        $this->validate($this->rules()[$this->currentStep]);

        
        session()->flash('message', 'Registration successful!');
        return redirect()->route('dashboard');
    }
    public function render(){
        return view('livewire.apply-form')
            ->with(['title' => 'Apply']);
    }
}
