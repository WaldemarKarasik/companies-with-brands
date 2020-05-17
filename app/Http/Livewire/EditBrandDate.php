<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Brand;

class EditBrandDate extends Component
{
    public $listeners = ['buttonClicked'];
    public $brand;
    public $newDate;
    public $error;
    public function mount(Brand $defaultBrand) {
        // return dd($defaultBrand);
        $this->brand = $defaultBrand;
        // return dd($brand);
        // // $this->brand = $defaultBrand;
        // return dd($this->brand);
    }
    public function updated($newDate, $value) {
        if($this->newDate == '') {
            $this->error = true;
        }

        $this->validateOnly($newDate,[
            'newDate' => 'required|date_format:Y-m-d',
        ]);
        $this->error = false;

    }

    public function updateDate($brand) {
        $brand = Brand::findOrFail($brand);
        if(!$this->newDate == '') {
            $this->error = true;
            $this->validate([
                'newDate' => 'date_format:Y-m-d'
            ]);
            $brand->update(['founded' => $this->newDate]);
            $this->newDate = '';
            $this->error = false;
        }

    }

    public function buttonClicked() {
        return dd('Hello');
    }

    public function render()
    {
        return view('livewire.edit-brand-date');
    }
}
