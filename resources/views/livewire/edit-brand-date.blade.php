<div class="mt-2 flex flex-col">
    <label for="newDate">New foundation date (optional)</label>
    @error('founded') {{$message}} @enderror
<input type="text" wire:model="newDate" name="newDate" class="{{($error) ? 'bg-red-500' : ''}}">
<button wire:click="updateDate({{$brand->id}})">Ok</button>
</div>
