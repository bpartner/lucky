<div>
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 mb-4">
        <div class="flex items-center mt-4">
            <x-primary-button wire:click="getHistory">History</x-primary-button>
        </div>
        @if(isset($list))
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                <tr>
                    <td>Date</td>
                    <td>Number</td>
                    <td>Win</td>
                    <td>Value</td>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                @foreach($list as $lucky)
                    <tr>
                        <td>{{$lucky->created_at}}</td>
                        <td>{{$lucky->capture}}</td>
                        <td>{{$lucky->isWin() ? 'WIN' : 'LOSE'}}</td>
                        <td>{{$lucky->value()}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

    </div>

</div>
