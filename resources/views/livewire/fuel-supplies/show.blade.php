<div class="py-12">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Abastecimentos') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            @if(session()->has('message'))
                <div class="rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <h4>{{ session('message')}}</h4>
                        </div>
                    </div>
                </div>
            @endif

            <button wire:click="openModal()" class="font-bold py-2 px-4 my-3">INSERIR</button>
            <br />
 
            <a class="font-bold py-2 px-4 my-3" href="{{ URL::to('/fuel-supplies/pdf') }}">GERAR RELATÓRIO</a>

            @if($createMode)
                @include('livewire.fuel-supplies.create')
            @endif
            
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-4 py-2">Cód.</th>
                        <th class="px-4 py-2">Data</th>
                        <th class="px-4 py-2">Motorista</th>
                        <th class="px-4 py-2">Carro</th>
                        <th class="px-4 py-2">Combustível</th>
                        <th class="px-4 py-2">Quantidade</th>
                        <th class="px-4 py-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($supplies as $supply)
                        <tr>
                            <td class="text-center border px-4 py-2">{{$supply->id}}</td>
                            <td class="text-center border px-4 py-2">{{ date('d/m/Y', strtotime($supply->date))}}</td>
                            <td class="border px-4 py-2">{{$supply->driver_name}}</td>
                            <td class="border px-4 py-2">{{$supply->car_name}}</td>
                            <td class="border px-4 py-2">{{$supply->fuel_type}}</td>
                            <td class="text-center border px-4 py-2">{{$supply->quantity_supplied}}</td>
                            <td class="text-center border px-4 py-2">R${{$supply->total_supplied}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>