<div x-data="error: false" class="mt-2 flex flex-col">

    <label for="newDate">New foundation date (optional)</label>
    {{-- @if ($errors->any())
    <div class="">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-theme_red">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
    <div x-show="error" @click="error = true" class="text-theme_red w-30">@error('newDate') {{$message}} @enderror</div>

<div class="flex">
<input type="text" wire:model="newDate" name="newDate" class="{{($error==true) ? 'border-2 border-theme_red focus:outline-none' : 'border-2 border-theme_blue-dark'}}" >
<button wire:click="{updateDate({{$brand->id}}), $emit('buttonClicked')}">Ok</button>
</div>
</div>
</div>
