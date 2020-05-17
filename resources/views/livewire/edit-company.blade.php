<div class="max-w-3xl mx-auto bg-white min-h-screen p-8 shadow-lg">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="flex flex-col">


            {{-- @if ($errors->any())
        <div class="">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-theme_red">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <div>
        @if(session()->has('message'))
            {{session('message')}}
        @endif
    </div>
        <div class="flex flex-col ">
            <label for="newCompanyName">New name:</label>
        <div>
            <div class="text-theme_red">@error('newCompanyName') {{$message}} @enderror</div>
        <input class="{{($error) ? 'border-2 border-theme_red focus:outline-none' : 'border-2 border-theme_blue-dark focus:outline-none'}}" type="text" name="newCompanyName" wire:model="newCompanyName">
            <button wire:click="updateCompany">Ok</button>
        </div>
            @livewire('edit-company-founder', compact('company'), key($company->id))
            <div class="flex justify-center mt-4 h-10">
            <button class="border-2 border-white bg-green-500 text-white h-full w-20 rounded-full focus:outline-none" wire:click="back">Back</button>
            </div>
        </div>

    </div>
</div>
