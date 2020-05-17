<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Company;
use Exception;
use Illuminate\Support\MessageBag;
class EditCompany extends Component
{
    public $company;
    public $newCompanyName;
    public $error, $errorObject, $errorMessage;
    public $erMessages;
    public $errorBa;
    public function mount(Company $company) {
        $this->company = $company;
        $this->newCompanyName = $company->name;
    }

    public function updated($newCompanyName, $value) {
        if($value == '') {
            $this->error = true;
        } else {
            $this->error = false;
        }

        $this->validateOnly($newCompanyName, [
            'newCompanyName' => 'required'
        ], $messages = ['This field is required']);
        $this->error = false;
    }

    public function updateCompany(MessageBag $messageBag) {
        // return dd($this->newCompanyName == $this->company->name);
        $company = $this->company;
        if($this->newCompanyName == $this->company->name)
        {
            // $errorMessage = 'This is the same';
            // // $this->errorBa = new MessageBag;
            // // return dd(gettype(($this->errorBa)));
            // // $this->errorBa->add('error', 'The fucking same');
            // // $this->erMessages = $this->errorBa->messages();
            // // return dd($this->erMessages);
            // $this->error = true;
            $this->addError('newCompanyName', 'Cannot be the same');
            $this->error = true;
            return ;

        } else {
            if(strlen($this->newCompanyName) >= 255) {
                $this->error = true;
            }
            $this->validate([
                'newCompanyName' => 'required|max:255',
            ], $messages = ['This field is required', 'Max 255']);
            $company->update(['name' => $this->newCompanyName]);
            session()->flash('message', 'Company name successfully changed.');
            $this->newCompanyName = $this->company->name;

        }

    }

    public function back() {
        return redirect('/');
    }

    public function render()
    {
            // if($this->error == true) {
            //     // return dd('What the fuck');
            //     $this->errorBa['foo'] = 'bar';
            //     return view('livewire.edit-company')->withErrors($this->errorBa);
            // }
        return view('livewire.edit-company');
    }
}
