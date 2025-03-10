<div>
   <form wire:submit.prevent="createPoll">
    <label>Poll title</label>

    <input type="text" wire:model.live="title"/>

    {{-- Current title: {{ $title }} --}}

    @error('title')
        <div class="text-red-500">
            {{$message}}
        </div>
    @enderror

    <div class="mb-4 mt-4">
        <button class="btn" wire:click.prevent="addOption">Add Option</button>
    </div>

   <div class="mt-4">
        @foreach ( $options as $index => $option )
            <div class="mb-4">
                <label for="">Option {{$index + 1}} - {{$option}}</label>
                <div class="flex gap">
                    <input type="text" wire:model.live="options.{{$index}}" />
                    <button class ="btn" wire:click.prevent="removeOption({{$index}})">Remove</button>
                </div>
                @error("options.{$index}")
                    <div class="text-red-500">
                        {{$message}}
                    </div>
                @enderror
            </div>
        @endforeach

        @error("options")
            <div class="text-red-500">
                {{$message}}
            </div>
        @enderror
   </div>

   <button type="submit" class="btn">Create Poll</button>
   </form>
</div>
