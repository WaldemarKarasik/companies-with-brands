<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Brand;


class EditBrand extends Component
{
    public $brandId;
    public $newName, $error;
    public $defaultBrand;
    public function mount(Brand $brand) {
        $this->brandId = $brand->id;
        $this->defaultBrand = $brand;
    }
    public function updated($newName) {
        if($this->newName == '') {
            $this->error = true;
        }
        $this->validateOnly($newName,[
            'newName' => 'required',
        ]);
        $this->error = false;
    }
    public function updateRecord($record) {
        $newBrand = Brand::find($record);
        // $newBrand->name = $this->newName;
        if($this->newName == '') {
            $this->error = true;
        }
        $this->validate([
            'newName' => 'required',
        ]);
        $newBrand->update(['name' => $this->newName]);
        $this->error = false;
        $this->emit('brandUpdated');
        return redirect()->to('/companies');
    }

    public function render()
    {
        return view('livewire.edit-brand');
    }
}
