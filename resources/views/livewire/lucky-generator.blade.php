<div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100  mb-4">

    @if(isset($capture))
        <div class="mt-4">
            <div>
                Magic number: {{$capture}}
            </div>

            <div>
                You are @if($win) WIN @else LOSE @endif
            </div>

            <div>
                Your won: {{ $total ?? 0 }}
            </div>
        </div>
    @endif

        <div class="flex items-center mt-4">
            <x-primary-button wire:click="generate">Im feeling lucky</x-primary-button>
        </div>
</div>
