<div class="max-w-3xl mx-auto shadow-lg min-h-screen flex justify-evenly p-8 bg-white">
    <div class="flex flex-col">
        <div class="flex flex-col justify-center">
            <label for="newName">New name (optional)</label>
            <div class="text-sm font-bold text-theme_red">@error('newName') Too long @enderror</div>
            <div class="flex">
            <input type="text" wire:model="newName" class=" {{($error == true) ? 'focus:outline-none border-2 border-theme_red' : 'border-2 border-theme_blue-dark'}}" name="newName">
            <button class="" wire:click="updateRecord({{$brandId}})">Ok</button>
            </div>
            @livewire('edit-brand-date', compact('defaultBrand'), key($brandId))
            <div class="flex justify-end">

            </div>
        </div>

    </div>


</div>
