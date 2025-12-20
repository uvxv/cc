<?php

namespace App\Livewire;

use App\Models\Application;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ApplicationSubmited;

class ApplyForm extends Component
{
    use WithFileUploads;
    public $currentStep = 1;
    public $totalSteps = 3;

    
    public $phone;
    public $province;
    public $medical_image;
    public $area;
    public $blood_type;
    public $vehicle_group;
    public $terms;


    protected function rules(){
        return [
            1 => [
                'phone' => "required|string|max:10",
                'province' => "required|string|max:100",
            ],
            2 => [
                'medical_image' => "required|image|max:5120",
                'area' => "required|string|max:255",
                'blood_type' => "required|string|max:3",
                'vehicle_group' => "required|string|max:50",
            ],
            3 => [
                'terms' => "required|accepted",
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

    public function submit(){
        $this->validate($this->rules()[$this->currentStep]);    
        $medicalImagePath = $this->medical_image->store('medical_images', 'public');
        $application = Application::create([
            'phone' => $this->phone,
            'province' => $this->province,
            'medical_image' => $medicalImagePath,
            'area' => $this->area,
            'blood_type' => $this->blood_type,
            'vehicle_group' => $this->vehicle_group,
            'user_id' => Auth::id(),
        ]);
        
        Auth::user()->notify(new ApplicationSubmited($application)); // to gokula, this is just a compiler error not a runtime error

        return redirect()->route('userdashboard.index');
    }

    public function render(){
        return view('livewire.apply-form')
            ->with(['title' => 'Apply']);
    }
}
