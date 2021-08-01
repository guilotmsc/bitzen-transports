<div class="py-12">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Carros') }}
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

            <button wire:click="openModal()" class="font-bold py-2 px-4 my-3">NOVO</button>
            
            @if($createMode)
                @include('livewire.cars.create')
            @endif

            @if($updateMode)
                @include('livewire.cars.update')
            @endif

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-4 py-2">Cód.</th>
                        <th class="px-4 py-2">Marca</th>
                        <th class="px-4 py-2">Modelo</th>
                        <th class="px-4 py-2">Ano</th>
                        <th class="px-4 py-2">Placa</th>
                        <th class="px-4 py-2">Tanque</th>
                        <th class="px-4 py-2"></th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach($cars as $car)
                    <tr>
                        <td class="border px-4 py-2">{{$car->id}}</td>
                        <td class="border px-4 py-2">{{$car->manufacturer}}</td>
                        <td class="border px-4 py-2">{{$car->name}}</td>
                        <td class="border px-4 py-2">{{$car->year_of_manufacturer}}</td>
                        <td class="border px-4 py-2">{{$car->plate}}</td>
                        <td class="border px-4 py-2">{{$car->tank_capacity}}</td>
                        <td class="border px-4 py-2 text-center">
                            <button wire:click="edit({{$car->id}})" class="font-bold py-2 px-4">Editar</button>
                            <button wire:click="delete({{$car->id}})" class="font-bold py-2 px-4">Remover</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>