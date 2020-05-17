<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Company;
class EditCompanyFounder extends Component
{
    public $company;
    public $newCompanyFounder;
    public $error;
    public function mount(Company $company) {
        $this->company = $company;
        $this->newCompanyFounder = $this->company->founder;
    }

    public function updated($newCompanyFounder, $value) {
        if ($value == '') {
            $this->error = true;
        } else {
            $this->error = false;
        }
        $this->validateOnly($newCompanyFounder, [
            'newCompanyFounder' => 'required',
        ]);
    }

    public function updateCompanyFounder() {
        $company = $this->company;
        if($this->newCompanyFounder == $company->founder) {
            return ;
        } elseif($this->newCompanyFounder == '') {
            $this->error = true;
            return ;
        }
        $this->validate([
            'newCompanyFounder' => 'required',
        ]);
        $company->update(['founder' => $this->newCompanyFounder]);
    }

    public function render()
    {
        return view('livewire.edit-company-founder');
    }
}
