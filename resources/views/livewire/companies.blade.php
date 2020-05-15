<div x-data="{show:false}">
    <div>
        @foreach($companies as $company)
            <strong class="text-3xl">{{$company->name}}</strong>
            <button @click = "show = true">Add brand</button>
            <div x-show.transition.duration.500ms="show" class="flex flex-col absolute mt-5 ml-4 border-4 border-black h-3/6" @click.away="show = !show">
            <label for="newBrand">Name</label>
            <input type="text" wire:model="newBrand" name="newBrand">
            <label for="founded">Foundation date</label>
            <input type="text" class="text-lg px-3 font-bold"wire:model="founded" placeholder="year-month-day" name="founded">
            <button x-on:click="show = false" wire:click="addBrand({{$company->id}})">Ok</button>
            </div>
            <div class="-mt-1 flex flex-col">
                @foreach($company->brands as $brand)
                    <div>
                        <small class="text-xl font-normal">
                            <a href="{{route('edit-brand', $brand->id)}}">{{$brand->name}}</a>
                            <button wire:click="deleteBrand({{$brand->id}})">Delete</button>
                        </small>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
<script>
    window.livewire.on('subShowed',() => {

    });

</script>
