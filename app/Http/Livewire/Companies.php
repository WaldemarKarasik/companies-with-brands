<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Company;
use App\Brand;
class Companies extends Component
{
    public $newBrand;
    public $founded;
    protected $listeners = ['brandUpdated'=>'brandUpdated'];
    public function brandUpdated() {
        return dd('Updated');
    }
    public function addBrand($id) {
        $brand = Brand::create(['name' => $this->newBrand, 'company_id'=>$id, 'founded'=>$this->founded]);
        $this->newBrand = '';
        $this->founded = '';
    }
    public function deleteBrand($brandId) {
        Brand::find($brandId)->delete();
    }
    public function render()
    {
        $companies = Company::with('brands');
        $companies = $companies->get();
        // return dd($companies);
        // $companies = Company::all
        return view('livewire.companies')->with(compact('companies'));
    }
}
