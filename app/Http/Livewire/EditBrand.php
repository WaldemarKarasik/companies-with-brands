<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Brand;


class EditBrand extends Component
{
    public $brandId;
    public $newName, $error;
    public $defaultBrand, $defaultBrandId;
    public function mount(Brand $brand) {
        $this->brandId = $brand->id;
        $this->defaultBrand = $brand;
        // $this->defaultBrandId = $this->defaultBrand['id'];
        // $this->defaultBrand->toArray();
        // return dd($this->defaultBrandId);
    }
    public function updated($newName) {
        if($this->newName == '') {
            $this->error = true;
        }
        $this->validateOnly($newName,[
            'newName' => 'max:255',
        ]);
        $this->error = false;
    }
    public function updateRecord($record) {
        $newBrand = Brand::find($record);
        // $newBrand->name = $this->newName;
        if(!empty($this->newName)) {
            $this->validate([
                'newName' => 'max:255',
            ]);
            $newBrand->update(['name' => $this->newName]);
        }

        // if($this->newName == '') {
        //     $this->error = true;
        // }
        // $this->validate([
        //     'newName' => 'required',
        // ]);
        // $newBrand->update(['name' => $this->newName]);
        // $this->error = false;
        // $this->emit('brandUpdated');
    }

    public function render()
    {
        return view('livewire.edit-brand');
    }
}
