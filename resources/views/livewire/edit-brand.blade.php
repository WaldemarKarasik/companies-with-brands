<div class="max-w-3xl mx-auto shadow-lg min-h-screen flex justify-evenly p-8 bg-white">
    <div class="flex flex-col">
        <div class="flex flex-col justify-center">
            <label for="newName">New name</label>
            <div class="text-sm font-bold text-theme_red">@error('newName') Required @enderror</div>
            <input type="text" wire:model="newName" class=" {{($error == true) ? 'border-2 border-theme_red' : 'border-2 border-theme_blue-dark'}}" name="newName">

            <div class="flex justify-end">
            <button class="" wire:click="updateRecord({{$brandId}})">Ok</button>
            </div>
        </div>

    </div>


</div>
