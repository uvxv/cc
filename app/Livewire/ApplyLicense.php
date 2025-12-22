<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\LicenseApplication;
use App\Notifications\LicenseApplicationSubmit;

class ApplyLicense extends Component
{
    use WithFileUploads;
    public $currentStep = 1;
    public $totalSteps = 2;

    
    public $license_number;
    public $issue_date;
    public $expiry_date;
    public $category;
    public $image;
    public $terms;
    
    
    protected function rules(){
        return [
            1 => [
                'license_number' => "required|string|max:12|unique:license_applications,license_number",
                'issue_date' => "required|date",
                'expiry_date' => "required|date|after:issue_date",
                'category' => "required|string|max:100",
                'image' => "required|image|max:5120",
            ],
            2 => [
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
        $imagePath = $this->image->store('applied_licenses', 'public');
        
        $application = LicenseApplication::create([
            'license_number' => $this->license_number,
            'issue_date' => $this->issue_date,
            'expiry_date' => $this->expiry_date,
            'category' => $this->category,
            'image' => $imagePath,
            'user_id' => auth()->id(),
        ]);
        $application->user->notify(new LicenseApplicationSubmit());
        return redirect()->route('userdashboard.index');
    }
    public function render()
    {
        return view('livewire.apply-license');
    }
}
