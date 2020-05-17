<div class="flex flex-col">
    <label for="newCompanyFounder">New company founder</label>
    <div>
        <div>@error('newCompanyFounder') {{$message}} @enderror</div>
        <input class="{{($error) ? 'border-2 border-theme_red' : 'border-2 border-theme_blue-dark'}}" type="text" name="newCompanyFounder" wire:model="newCompanyFounder">
        <button wire:click="updateCompanyFounder">Ok</button>
    </div>
</div>
